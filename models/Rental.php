<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rental".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $waiter
 * @property integer $bike
 * @property string $action_date
 *
 * @property Bike $bike0
 * @property Waiter $waiter0
 */
class Rental extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rental';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
	    [['action_date'], 'string'],
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
            'action_date' => 'Action Date',
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
