<?php

use yii\db\Migration;

/**
 * bonus tax data
 */
class m170927_091115_bonus_tax_data extends Migration
{

    const TABLE = '{{%bonus_tax}}';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert(self::TABLE, [
            'min'   => 0,
            'max'   => 100,
            'title' => 'Начальная',
            'bonus' => 100,
        ]);
        $this->insert(self::TABLE, [
            'min'   => 100,
            'max'   => 200,
            'title' => 'Средняя',
            'bonus' => 200,
        ]);
        $this->insert(self::TABLE, [
            'min'   => 200,
            'max'   => 300,
            'title' => 'Высшая',
            'bonus' => 300,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete(self::TABLE);
    }

}
