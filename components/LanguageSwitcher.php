<?php
/*
author :: Shagy
website :: http://biletTm.com
change language by get language=TM, language=RU, ...
or select on this widget
*/

namespace app\components; 

use Yii;
use yii\base\Widget; 
use yii\boostrap\ButtonDropdown;
use yii\helpers\Url;
use yii\web\Cookie;

class LanguageSwitcher extends Widget{
	/*array of languages*/
	public $languages = [
		'RU' => 'Russian',
		'TM' => 'Turkmen',
		'En' => 'English'
	];
	
	public function init(){
		if(php_sapi_name() === 'cli'){
			return true;
		}
		
		parent::init();
		
		$cookies = Yii::$app->response->cookies;
		$languageNew = Yii::$app->request->get('language');
		
		if($languageNew){
			if(isset($this->languages[$languageNew])){
				Yii::$app->language = $languageNew;
				$cookies->add(new \yii\web\Cookie([
					'name' => 'language', 
					'value' => $languageNew
				]));
			}
		}else if($cookies->has('language')){
			Yii::$app->language = $cookies->getValue('language');
		}
	}
	
	public function run(){
		$languages = $this->language;
		$current = $languages[Yii::$app->language];
		unset($languages[Yii::$app->language]);
		
		$items = [];
		
		foreach($languages as $code => $language){
			$temp = [];
			$temp['label'] = $language;
			$temp['url'] = Url::current(['language' => $code]);
			array_push($items, $temp);
		}
		
		echo ButtonDropdown::widget(['label' => $current, 
									 'dropdown' => [
										'items' => $items
									],
		]);
	}
	
}