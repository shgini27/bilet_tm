<?php 
namespace app\components;

use Yii; 
use yii\base\Widget; 
use app\models\SubscribeForm;
use app\models\Subscriber;

class FooterSign extends Widget 
{ 
    public function init() 
    { 
        parent::init();
    } 
 
    public function run(){ 
        $model = new SubscribeForm();// code to create model

        if ($model->load(Yii::$app->request->post()) && $model->subscriberContact('welcome')) {
			
			$subs = new Subscriber();
			$subs->email = $model->email;
			$subs->save();
			
			/*Yii::$app->db->createCommand()
										->insert(Like::tableName(), ['like_status' => 1, 'user_id' => 1, 'show_id' => $id])
										->execute();*/

            Yii::$app->response->redirect(Yii::$app->urlManager->createAbsoluteUrl('site/index'));
			return;
        }

        return $this->render('subscribe', [
            'model' => $model
        ]); 
    } 
} 
?> 