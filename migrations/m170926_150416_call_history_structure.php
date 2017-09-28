<?php

use yii\db\Migration;

/**
 * Call history structure
 */
class m170926_150416_call_history_structure extends Migration
{
    const TABLE = '{{%call_history}}';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE, [
            'id'         => $this->primaryKey(),
            'manager_id' => $this->integer()->notNull()/*->comment('Менеджер')*/,
            'date'       => $this->integer()->notNull()/* ->comment('Дата звонка') */,
        ]);

        /*
        $this->addForeignKey('fk_call2manager',
            self::TABLE, 'manager_id',
            '{{$manager}}', 'id',
            'cascade', 'cascade');
        */
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE);
    }

}
