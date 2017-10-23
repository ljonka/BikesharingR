<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "donator".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $mail
 * @property string $address
 * @property string $description
 *
 * @property Bike[] $bikes
 */
class Donator extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donator';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'mail', 'address', 'description'], 'string'],
	    ['mail', 'email'],
	    ['name', 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Telefon',
            'mail' => 'Mail',
            'address' => 'Adresse',
            'description' => 'Beschreibung',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBikes()
    {
        return $this->hasMany(Bike::className(), ['donator' => 'id']);
    }
}
