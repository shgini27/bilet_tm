<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SeatForm extends Model
{
    public $seats = array();
	public $seats2 = array();
	
	public function getSeats(){
		$this->seats;
	}

}
