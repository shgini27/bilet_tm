<?php 
namespace app\components;

use Yii;
use yii\base\Widget; 
use yii\web\Response;
use yii\web\Controller;
use app\models\SearchForm;

class SearchField extends Widget 
{ 
    public function init() 
    { 
        parent::init();
    } 
 
    public function run(){ 
        $model = new SearchForm();// code to create model

        if ($model->load(Yii::$app->request->post())) {

            Yii::$app->response->redirect(Yii::$app->urlManager->createAbsoluteUrl(['search/index', 'search' => $model->search]));
			return;
        }
		
        return $this->render('search', [
            'model' => $model
        ]); 
    } 
} 
?> 