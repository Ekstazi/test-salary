<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%call_history}}".
 *
 * @property int $id
 * @property int $manager_id
 * @property int $date
 */
class CallHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%call_history}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manager_id', 'date'], 'required'],
            [['manager_id', 'date'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'manager_id' => Yii::t('app', 'Manager ID'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\query\CallHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CallHistoryQuery(get_called_class());
    }
}
