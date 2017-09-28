<?php

use yii\db\Migration;

/**
 * Managers data
 */
class m170927_084945_managers_data extends Migration
{

    const TABLE = '{{%manager}}';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert(self::TABLE, [
            'id'       => 1,
            'fullname' => 'Хельга Браун',
            'salary'   => 20000,
        ]);
        $this->insert(self::TABLE, [
            'id'       => 2,
            'fullname' => 'Барак Обама',
            'salary'   => 30000,
        ]);
        $this->insert(self::TABLE, [
            'id'       => 3,
            'fullname' => 'Денис Козлов',
            'salary'   => 40000,
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
