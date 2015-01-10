<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repair".
 *
 * @property integer $id
 * @property integer $helper
 * @property string $description
 *
 * @property Helper $helper0
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
            [['helper'], 'integer'],
            [['description'], 'string']
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
}
