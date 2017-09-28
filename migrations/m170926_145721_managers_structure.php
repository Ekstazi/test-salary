<?php

use yii\db\Migration;

/**
 * Ьфтфпукы ыекгсегку
 */
class m170926_145721_managers_structure extends Migration
{
    const TABLE = '{{%manager}}';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        // sqlite not support comments on columns and foreign keys
        $this->createTable(self::TABLE, [
            'id'       => $this->primaryKey(),
            'fullname' => $this->string()->notNull()/* ->comment('Полное имя')*/,
            'salary'   => $this->decimal(10, 2)->notNull()/*  ->comment('Оклад')*/,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE);
    }
}
