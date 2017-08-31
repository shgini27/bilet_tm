<?php

namespace app\controllers;

use Yii;
use app\filters\AccessRule;
use yii\filters\AccessControl;
use app\models\TicketOptionTranslation;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TicketOptionTranslationController implements the CRUD actions for TicketOptionTranslation model.
 */
class TicketOptionTranslationController extends Controller
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
     * Lists all TicketOptionTranslation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => TicketOptionTranslation::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TicketOptionTranslation model.
     * @param string $ticket_option_id
     * @param string $language_id
     * @return mixed
     */
    public function actionView($ticket_option_id, $language_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ticket_option_id, $language_id),
        ]);
    }

    /**
     * Creates a new TicketOptionTranslation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TicketOptionTranslation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ticket_option_id' => $model->ticket_option_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TicketOptionTranslation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ticket_option_id
     * @param string $language_id
     * @return mixed
     */
    public function actionUpdate($ticket_option_id, $language_id)
    {
        $model = $this->findModel($ticket_option_id, $language_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ticket_option_id' => $model->ticket_option_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TicketOptionTranslation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ticket_option_id
     * @param string $language_id
     * @return mixed
     */
    public function actionDelete($ticket_option_id, $language_id)
    {
        $this->findModel($ticket_option_id, $language_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TicketOptionTranslation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ticket_option_id
     * @param string $language_id
     * @return TicketOptionTranslation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ticket_option_id, $language_id)
    {
        if (($model = TicketOptionTranslation::findOne(['ticket_option_id' => $ticket_option_id, 'language_id' => $language_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
