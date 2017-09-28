<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bonus_tax}}".
 *
 * @property int $id
 * @property int $min
 * @property int $max
 * @property string $title
 * @property int $bonus
 */
class BonusTax extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bonus_tax}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['min', 'max', 'bonus'], 'integer'],
            [['bonus'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'min' => Yii::t('app', 'Min'),
            'max' => Yii::t('app', 'Max'),
            'title' => Yii::t('app', 'Title'),
            'bonus' => Yii::t('app', 'Bonus'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\query\BonusTaxQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\BonusTaxQuery(get_called_class());
    }
}
