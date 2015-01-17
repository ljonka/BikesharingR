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
            [['type', 'waiter', 'bike'], 'integer'],
	    [['type', 'waiter', 'bike', 'appearance_date'], 'required'],
        ];
    }

    public function problemTypes(){
	return ['1'=>'Schlüssel verloren', '2'=>'Fahrrad geklaut', '3'=>'Fahrrad defekt'];
    }

    public function getProblemType(){
	$arrProblemTypes = $this->problemTypes();
	return $arrProblemTypes[$this->type];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Problem Typ',
            'waiter' => 'MitarbeiterIn',
            'bike' => 'Fahrrad',
            'appearance_date' => 'Festgestellt am',
            'solution_date' => 'Gelöst am',
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
