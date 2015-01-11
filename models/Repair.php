<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repair".
 *
 * @property integer $id
 * @property integer $helper
 * @property integer $bike
 * @property string $description
 *
 * @property Helper $helper0
 * @property Bike $bike0
 */
class Repair extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'repair';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['helper', 'bike'], 'integer'],
            [['description'], 'string'],
	    [['description', 'bike', 'helper'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
	    'bike'=>'Fahrrad',
            'helper' => 'Helfer',
            'description' => 'Beschreibung',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHelper0()
    {
        return $this->hasOne(Helper::className(), ['id' => 'helper']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBike0()
    {
        return $this->hasOne(Bike::className(), ['id' => 'bike']);
    }

}
