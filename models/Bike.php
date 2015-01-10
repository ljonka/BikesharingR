<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bike".
 *
 * @property integer $id
 * @property string $name
 * @proüerty integer $number
 * @property integer $donator
 * @property string $offer_date
 * @property string $pickup_date
 * @property string $description
 * @property string $icon
 * @property string $image
 * @property string $type
 *
 * @property Donator $donator0
 * @property Problem[] $problems
 * @property Rental[] $rentals
 */
class Bike extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bike';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'offer_date', 'pickup_date', 'description', 'icon', 'image', 'type'], 'string'],
            [['donator', 'number',], 'integer']
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
	    'number' => 'Nummer',
            'donator' => 'SpenderIn',
            'offer_date' => 'Angebot vom',
            'pickup_date' => 'Fahrrad abgeholt am',
	    'description' => 'Beschreibung',
	    'icon' => 'Icon',
	    'image' => 'Image',
	    'type' => 'Type'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonator0()
    {
        return $this->hasOne(Donator::className(), ['id' => 'donator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProblems()
    {
        return $this->hasMany(Problem::className(), ['bike' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentals()
    {
        return $this->hasMany(Rental::className(), ['bike' => 'id']);
    }
}
