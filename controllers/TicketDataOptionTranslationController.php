<?php

namespace app\controllers;

use Yii;
use app\filters\AccessRule;
use yii\filters\AccessControl;
use app\models\TicketDataOptionTranslation;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TicketDataOptionTranslationController implements the CRUD actions for TicketDataOptionTranslation model.
 */
class TicketDataOptionTranslationController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
			'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all TicketDataOptionTranslation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => TicketDataOptionTranslation::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TicketDataOptionTranslation model.
     * @param string $ticket_option_data_id
     * @param string $language_id
     * @return mixed
     */
    public function actionView($ticket_option_data_id, $language_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ticket_option_data_id, $language_id),
        ]);
    }

    /**
     * Creates a new TicketDataOptionTranslation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TicketDataOptionTranslation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ticket_option_data_id' => $model->ticket_option_data_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TicketDataOptionTranslation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ticket_option_data_id
     * @param string $language_id
     * @return mixed
     */
    public function actionUpdate($ticket_option_data_id, $language_id)
    {
        $model = $this->findModel($ticket_option_data_id, $language_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ticket_option_data_id' => $model->ticket_option_data_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TicketDataOptionTranslation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ticket_option_data_id
     * @param string $language_id
     * @return mixed
     */
    public function actionDelete($ticket_option_data_id, $language_id)
    {
        $this->findModel($ticket_option_data_id, $language_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TicketDataOptionTranslation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ticket_option_data_id
     * @param string $language_id
     * @return TicketDataOptionTranslation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ticket_option_data_id, $language_id)
    {
        if (($model = TicketDataOptionTranslation::findOne(['ticket_option_data_id' => $ticket_option_data_id, 'language_id' => $language_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
