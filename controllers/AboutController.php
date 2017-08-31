<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\CulturalPlaceTranslation;
use app\models\CulturalPlace;
use app\models\Show;
use app\models\ShowTranslation;
use app\models\Like;
use app\models\User;
use app\models\Comment;
use app\models\UserComment;
use app\models\Ticket;


class AboutController extends \yii\web\Controller
{

	/**
     * Displays homepage.
     *
     * @return string
     */
    public function actionAbout()
    {
		$this->setLanguage();
		
		$id = Yii::$app->session->get('langId');
		
		//here we get id's of current category
		$ids = Yii::$app->request->get('id');
		
		//Yii::$app->request->userIP;
		
		if(!is_null($ids)){
			
			$search = false;
			
			$cultural_place = CulturalPlace::findOne($ids);
			
			//here we get all categories with proper values
			$cultural_place_translation = CulturalPlaceTranslation::find()
																	->where(['language_id' => $id, 'cultural_place_id' => $ids])
																	->one();
			
			//here we get proper shows
			$show = Show::find()
							->where(['cultural_place_id' => $ids])
							->all();
			
			//here we get id's so we can get right translation
			$showSize = sizeof($show);	
			$show_ids = array();
			for($x = 0; $x < $showSize; $x++){
				array_push($show_ids, $show[$x]->id);
			}
			
			$show_translation = ShowTranslation::find()
													->where(['language_id' => $id, 'show_id' => $show_ids])
													->all();
			
		}else{
			
			$search = true;
			
			//here we get id's of current category
			$s_id = Yii::$app->request->get('s_id');
			
			//here we get proper shows
			$show = Show::findOne($s_id);
			
			$cultural_place = CulturalPlace::findOne($show->cultural_place_id);
			
			//here we get all categories with proper values
			$cultural_place_translation = CulturalPlaceTranslation::find()
																	->where(['language_id' => $id, 'cultural_place_id' => $show->cultural_place_id])
																	->one();
			
			$show_translation = ShowTranslation::find()
												->where(['language_id' => $id, 'show_id' => $show->id])
												->one();
		}
																	
		//here we render the view and pass data
        return $this->render('about', [
            'cultural_place' => $cultural_place,
			'cultural_place_translation' => $cultural_place_translation,
			'show' => $show,
			'show_translation' => $show_translation,
			'search' => $search,
        ]);
    }
	
	/**
     * Displays homepage.
     *
     * @return string
     */
    public function actionAboutShow()
    {
		$this->setLanguage();
		
		$id = Yii::$app->session->get('langId');
				
		//here we get id's of current category
		$ids = Yii::$app->request->get('id');//shu gelen show_id
		
		//get like for this show
		$like_count = Like::find()
					->where(['show_id' => $ids, 'like_status' => 1])
					->count();
		
		//here we get proper shows
		$show = Show::findOne($ids);
		
		//here we get cultural_place_di to get proper cultural_place
		$cultural_pl_id = $show->cultural_place_id;
		$cultural_place = CulturalPlace::findOne($cultural_pl_id);
		
		
		$comment = Comment::find()
								->where(['show_id' => $ids])
								->all();
								
		//here we get all categories with proper values
		$cultural_place_translation = CulturalPlaceTranslation::find()
																	->where(['language_id' => $id, 'cultural_place_id' => $show->cultural_place_id])
																	->one();
		
		$show_translation = ShowTranslation::find()
												->where(['language_id' => $id, 'show_id' => $show->id])
												->one();
												
		$all_shows_translation = ShowTranslation::find()
											->where(['language_id' => $id, 'show_name' => $show_translation->show_name])
											->all();
											
		$show_size = sizeof($all_shows_translation);	
		$show_ids = array();
		for($x = 0; $x < $show_size; $x++){
			array_push($show_ids, $all_shows_translation[$x]->show_id);
		}
		
		//here we get proper shows
		$all_shows = Show::find()
							->where(['id' => $show_ids])
							->all();
								
		//here we render the view and pass data
        return $this->render('aboutShow', [
            'cultural_place' => $cultural_place,
			'cultural_place_translation' => $cultural_place_translation,
			'show' => $show,
			'show_translation' => $show_translation,
			'all_shows' => $all_shows,
			'comment' => $comment,
			'like_count' => $like_count,
        ]);
    }
	
	/**
     * Creates a new Comment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUserComment()
    {
        $model = new UserComment();

		$ids = Yii::$app->request->get('id');
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
            return $this->redirect(['about-show', 'id' => $ids]);
			
        } else {
			
			$model->show_id = $ids;
			$model->user_id = Yii::$app->user->identity->id;
			$model->name = Yii::$app->user->identity->username;
			
            return $this->render('userComment', [
                'model' => $model,
            ]);
        }
    }
	
	/**
     * handles user like or unlike action.
     *
     */
    public function actionLike(){
		
		//here we get id's of current show to be liked
		$id = Yii::$app->request->get('id');
		$user_id = Yii::$app->user->identity->id;
		
		$like = Like::find()
					->where(['show_id' => $id, 'user_id' => $user_id])
					->one();
		
		
		if($like !== null){
			
			if($like->like_status === 0){
				$like->like_status = 1;
			}else{
				$like->like_status = 0;
			}
			
			$like->update();
			
		}else{
			$like = new Like();
			$like->like_status = 1;
			$like->user_id = $user_id;
			$like->show_id = $id;
			$like->save();
		}
		
		return $this->redirect(['about/about-show', 'id' => $id]);
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
