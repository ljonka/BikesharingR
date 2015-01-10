<?php

namespace app\models;

use yii\base\Model;

class Bike extends Model{

	public $bikeId;
	public $bikeName;
	public $bikeImage;
	public $bikeIcon;
	public $bikeType;
	public $bikeStatus;
	public $bikeDescription;

	public $donatorName;
	public $donatorAddress;
	public $donatorMail;
	public $donatorPhone;
	public $donatorDescription;
	
	public $arrRepair;

	public $arrRental;

	public $arrFeedback;

}	
