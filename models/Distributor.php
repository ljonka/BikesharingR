<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "distributor".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property double $geoLong
 * @property double $geoLat
 * @property string $phone
 * @property string $mail
 * @property string $contact
 *
 * @property Waiter[] $waiters
 */
class Distributor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'distributor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'phone', 'mail', 'contact'], 'string'],
            [['geoLong', 'geoLat'], 'number'],
	    ['mail', 'email'],
	    [['name', 'address', 'phone', 'geoLong', 'geoLat'], 'required']
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
            'address' => 'Adresse und Öffnungszeiten',
            'geoLong' => 'Geo Longitude',
            'geoLat' => 'Geo Latitude',
            'phone' => 'Telefon',
            'mail' => 'Mail',
            'contact' => 'Ansprechpartner',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWaiters()
    {
        return $this->hasMany(Waiter::className(), ['distributor' => 'id']);
    }
}
