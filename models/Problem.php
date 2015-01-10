<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $waiter
 * @property integer $bike
 * @property string $appearance_date
 * @property string $solution_date
 *
 * @property Bike $bike0
 * @property Waiter $waiter0
 */
class Problem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'problem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
	    [['appearance_date', 'solution_date'], 'string'],
            [['type', 'waiter', 'bike'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'waiter' => 'Waiter',
            'bike' => 'Bike',
            'appearance_date' => 'Appearance Date',
            'solution_date' => 'Solution Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBike0()
    {
        return $this->hasOne(Bike::className(), ['id' => 'bike']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaiter0()
    {
        return $this->hasOne(Waiter::className(), ['id' => 'waiter']);
    }
}
