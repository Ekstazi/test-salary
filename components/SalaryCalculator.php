<?php

namespace app\components;


use app\models\BonusTax;
use app\models\CallHistory;
use app\models\Manager;
use app\models\ManagerSalarySearch;
use yii\base\Component;

/**
 * Class SalaryCalculator
 * @package app\components
 */
class SalaryCalculator extends Component
{

    /**
     * Bonus that taken if no tax is fount
     */
    const SUPER_BONUS = 300;

    /**
     * @var ManagerSalarySearch[]
     */
    protected $models;

    /**
     * @var int
     */
    protected $date_from;

    /**
     * @var int
     */
    protected $date_to;

    /**
     * @var BonusTax[]
     */
    private $bonusTaxes;

    /**
     * SalaryCalculator constructor.
     * @param array $models
     * @param $date_from
     * @param $date_to
     */
    public function __construct($models, $date_from, $date_to)
    {
        $this->models = $models;

        $this->date_from = $date_from;
        $this->date_to = $date_to;
        parent::__construct([]);
    }

    /**
     * Calculate salary with bonus for all managers
     */
    public function calculate()
    {

        $calls = CallHistory::find()
            ->select('count(id) as count')
            ->where(['between', 'date', $this->date_from, $this->date_to])
            ->groupBy('manager_id')
            ->indexBy('manager_id')
            ->column();

        foreach ($this->models as $model) {
            if (isset($calls[$model->id])) {
                $model->salaryWithBonus = $model->salary + $this->getBonusForCallsCount($calls[$model->id]);
                $model->callsPerMonth = $calls[$model->id];
            } else {
                $model->salaryWithBonus = $model->salary;
                $model->callsPerMonth = 0;
            }
        }
    }

    /**
     * @param $count
     * @return int
     */
    protected function getBonusForCallsCount($count)
    {
        $taxes = $this->getBonusTaxes();
        foreach ($taxes as $tax) {
            if ($tax->min < $count && $tax->max >= $count) {
                return $count * $tax->bonus;
            }
        }
        return $count * self::SUPER_BONUS;
    }

    /**
     * @return \app\models\BonusTax[]|array
     */
    protected function getBonusTaxes()
    {
        if (isset($this->bonusTaxes)) {
            return $this->bonusTaxes;
        }
        return $this->bonusTaxes = BonusTax::find()
            ->orderBy('min, max')
            ->all();
    }
}