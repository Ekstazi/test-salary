<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%manager}}".
 *
 * @property int $id
 * @property string $fullname
 * @property string $salary
 */
class Manager extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%manager}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'salary'], 'required'],
            [['salary'], 'number'],
            [['fullname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fullname' => Yii::t('app', 'Fullname'),
            'salary' => Yii::t('app', 'Salary'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\query\ManagerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ManagerQuery(get_called_class());
    }
}
