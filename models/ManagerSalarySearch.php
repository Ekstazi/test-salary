<?php

namespace app\models;


use app\components\SalaryCalculator;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\data\DataProviderInterface;

/**
 * Class ManagerSalarySearch
 * @package app\models
 */
class ManagerSalarySearch extends Manager
{
    /**
     * @var string
     */
    public $date_from;

    /**
     * @var string
     */
    public $date_to;

    /**
     * @var int
     */
    public $date_from_timestamp;

    /**
     * @var int
     */
    public $date_to_timestamp;

    /**
     * @var float
     */
    public $salaryWithBonus;

    /**
     * @var int
     */
    public $callsPerMonth;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['date_from', 'default', 'value' => '2015-01-01'],
            ['date_to', 'default', 'value' => '2015-02-01'],
            ['date_from', 'date', 'timestampAttribute' => 'date_from_timestamp', 'format' => 'php:Y-m-d'],
            ['date_to', 'date', 'timestampAttribute' => 'date_to_timestamp', 'format' => 'php:Y-m-d']
        ];
    }


    /**
     * @param array $params
     * @return DataProviderInterface
     */
    public function search($params = [])
    {
        $this->load($params);
        if (!$this->validate()) {
            return new ArrayDataProvider();
        }
        $dataProvider = new ActiveDataProvider([
            'query' => static::find(),
        ]);

        $calculator = new SalaryCalculator($dataProvider->getModels(), $this->date_from_timestamp, $this->date_to_timestamp);
        $calculator->calculate();

        return $dataProvider;
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'salaryWithBonus' => \Yii::t('app', 'Зарплата'),
            'callsPerMonth' => \Yii::t('app', 'Звонков за период'),
            'date_from' => \Yii::t('app', 'Период с'),
            'date_to' => \Yii::t('app', 'Период по'),
        ]);
    }


}