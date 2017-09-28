<?php

use yii\db\Migration;

/**
 * Bonus tax structure
 */
class m170926_201916_bonus_tax_structure extends Migration
{
    const TABLE = '{{%bonus_tax}}';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE, [
            'id'    => $this->primaryKey(),
            'min'   => $this->integer()->unsigned()->notNull()->defaultValue(0)/*->comment('Кол-во звонков от')*/,
            'max'   => $this->integer()->unsigned()->notNull()->defaultValue(PHP_INT_MAX)/*->comment('Кол-во звонков до включительно')*/,
            'title' => $this->string()/*->comment('Название категорий')*/,
            'bonus' => $this->integer()->unsigned()->notNull()/*->comment('Бонус')*/,
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
