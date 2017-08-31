<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Subscribe is the model behind the sign up for subscribe.
 */
class SearchForm extends Model
{
    public $search;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['search'], 'required'],
        ];
    }
}