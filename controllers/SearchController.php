<?php

namespace app\controllers;

use Yii;
use app\models\SearchForm;
use app\models\CulturalPlaceTranslation;
use app\models\CulturalPlace;
use app\models\Show;
use app\models\ShowTranslation;
use app\models\ArticleTranslation;
use app\models\Article;

class SearchController extends \yii\web\Controller
{
    public function actionIndex()
    {	
		$this->setLanguage();
		$show_flag = false;
		
		$id = Yii::$app->session->get('langId');
		$search = Yii::$app->request->get('search');
		
		//here we search all needed tables for given search string
		$cultural_place_translation = CulturalPlaceTranslation::find()
																	->andWhere(['like', 'place_name', $search])
																	->all();
	    
		$show_translation = ShowTranslation::find()
												->andWhere(['like', 'show_name', $search])
												->all();
		
		$article_translation = ArticleTranslation::find()
														->where(['language_id' => $id])
														->andWhere(['like', 'title', $search])
														->all();
		$at_size = sizeof($article_translation);
		if($at_size > 0){
			$art_ids = array();
			for($ar = 0; $ar < $at_size; $ar++){
				array_push($art_ids, $article_translation[$ar]->article_id);
			}
			$article = Article::find()
								->where(['id' => $art_ids])
								->all();
		}else{
			$article = 0;
		}
		
		
		$place_size = sizeof($cultural_place_translation);
		
		if($place_size > 0){
			//here we get id's so we can get right translation
			
			$cultural_place_ids = array();
			for($x = 0; $x < $place_size; $x++){
				array_push($cultural_place_ids, $cultural_place_translation[$x]->cultural_place_id);
			}
			
			$cultural_place = CulturalPlace::find()
											->where(['id' => $cultural_place_ids])
											->all();
		}else{
			$show_flag = true;
			//here we get id's so we can get right translation
			$show_size = sizeof($show_translation);	
			$show_ids = array();
			for($s = 0; $s < $show_size; $s++){
				array_push($show_ids, $show_translation[$s]->show_id);
			}
			
			$show = Show::find()
							->where(['id' => $show_ids])
							->all();
			
			//here we get id's so we can get right translation
			$show_size2 = sizeof($show);
			$show_ids2 = array();
			for($s2 = 0; $s2 < $show_size2; $s2++){
				array_push($show_ids2, $show[$s2]->cultural_place_id);
			}
			
			
			$cultural_place = CulturalPlace::find()
											->where(['id' => $show_ids2])
											->all();
		}
		
		if(!$show_flag){
			//here we get id's so we can get right translation
			$show_size = sizeof($show_translation);	
			$show_ids = array();
			for($s = 0; $s < $show_size; $s++){
				array_push($show_ids, $show_translation[$s]->show_id);
			}
			
			$show = Show::find()
							->where(['id' => $show_ids])
							->all();
		}
		
		return $this->render('index', [
            'cultural_place_translation' => $cultural_place_translation,
			'cultural_place' => $cultural_place,
			'show_translation' => $show_translation,
			'show' => $show,
			'article_translation' => $article_translation,
			'article' => $article
        ]);
    }

	/**
     * Sets display Language.
     *
     */
    public function setLanguage(){
	
		if(Yii::$app->session->has('lang')){
			if(Yii::$app->session->get('lang') === 'RU'){
				Yii::$app->language = 'ru-RU';
			}else{
				Yii::$app->language = 'tk-TKM';
			}
		}else{
			Yii::$app->language = 'ru-RU';
			Yii::$app->session->set('langId', '1');
		}
    }
}
