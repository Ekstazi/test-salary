<?php

use yii\db\Migration;

/**
 * Call history data
 */
class m170927_085333_call_history_data extends Migration
{
    const TABLE = '{{%call_history}}';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insertManager1Calls();
        $this->insertManager2Calls();
        $this->insertManager3Calls();

    }

    /**
     * Insert count of calls
     * @param $date
     * @param $manager
     * @param $callCount
     */
    protected function insertSeries($date, $manager, $callCount)
    {
        $date = strtotime($date);
        for ($i = 0; $i < $callCount; $i++) {
            $this->insert(self::TABLE, [
                'manager_id' => $manager,
                'date'       => $date,
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete(self::TABLE);
    }

    private function insertManager1Calls()
    {
        $this->insertSeries('1.01.2015', 1, 10);
        $this->insertSeries('2.01.2015', 1, 40);
        $this->insertSeries('3.01.2015', 1, 40);
        $this->insertSeries('4.01.2015', 1, 30);
        $this->insertSeries('5.01.2015', 1, 10);

        $this->insertSeries('8.01.2015', 1, 10);
        $this->insertSeries('9.01.2015', 1, 20);
        $this->insertSeries('10.01.2015', 1, 30);
        $this->insertSeries('11.01.2015', 1, 10);
        $this->insertSeries('12.01.2015', 1, 20);
    }

    private function insertManager2Calls()
    {
        $this->insertSeries('1.01.2015', 2, 10);
        $this->insertSeries('2.01.2015', 2, 20);
        $this->insertSeries('3.01.2015', 2, 10);
        $this->insertSeries('4.01.2015', 2, 30);
        $this->insertSeries('5.01.2015', 2, 10);

        $this->insertSeries('8.01.2015', 2, 10);
    }

    private function insertManager3Calls()
    {
        $this->insertSeries('1.01.2015', 3, 10);
        $this->insertSeries('2.01.2015', 3, 10);
        $this->insertSeries('3.01.2015', 3, 10);
        $this->insertSeries('4.01.2015', 3, 30);
        $this->insertSeries('5.01.2015', 3, 10);

        $this->insertSeries('8.01.2015', 3, 10);
        $this->insertSeries('9.01.2015', 3, 10);
        $this->insertSeries('10.01.2015', 3, 30);
        $this->insertSeries('11.01.2015', 3, 10);
        $this->insertSeries('12.01.2015', 3, 20);
    }
}
