<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "waiter".
 *
 * @property integer $id
 * @property string $name
 * @property integer $distributor
 *
 * @property Problem[] $problems
 * @property Rental[] $rentals
 * @property Distributor $distributor0
 */
class Waiter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'waiter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['distributor'], 'integer'],
	    [['name', 'distributor'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name von Café Mitarbeiter',
            'distributor' => 'Standort',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProblems()
    {
        return $this->hasMany(Problem::className(), ['waiter' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentals()
    {
        return $this->hasMany(Rental::className(), ['waiter' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistributor0()
    {
        return $this->hasOne(Distributor::className(), ['id' => 'distributor']);
    }
}
