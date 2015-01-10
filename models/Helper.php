<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "helper".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $mail
 *
 * @property Repair[] $repairs
 */
class Helper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'helper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'mail'], 'string']
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
            'phone' => 'Phone',
            'mail' => 'Mail',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRepairs()
    {
        return $this->hasMany(Repair::className(), ['helper' => 'id']);
    }
}
