<?php

namespace app\controllers;

use Yii;
use app\filters\AccessRule;
use yii\filters\AccessControl;
use app\models\TicketHasOrder;
use app\models\SearchTicketHasOrder;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TicketHasOrderController implements the CRUD actions for TicketHasOrder model.
 */
class TicketHasOrderController extends Controller
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
     * Lists all TicketHasOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchTicketHasOrder();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TicketHasOrder model.
     * @param string $ticket_id
     * @param string $order_id
     * @param string $seat_reserved_id
     * @return mixed
     */
    public function actionView($ticket_id, $order_id, $seat_reserved_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ticket_id, $order_id, $seat_reserved_id),
        ]);
    }

    /**
     * Creates a new TicketHasOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TicketHasOrder();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ticket_id' => $model->ticket_id, 'order_id' => $model->order_id, 'seat_reserved_id' => $model->seat_reserved_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TicketHasOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ticket_id
     * @param string $order_id
     * @param string $seat_reserved_id
     * @return mixed
     */
    public function actionUpdate($ticket_id, $order_id, $seat_reserved_id)
    {
        $model = $this->findModel($ticket_id, $order_id, $seat_reserved_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ticket_id' => $model->ticket_id, 'order_id' => $model->order_id, 'seat_reserved_id' => $model->seat_reserved_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TicketHasOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ticket_id
     * @param string $order_id
     * @param string $seat_reserved_id
     * @return mixed
     */
    public function actionDelete($ticket_id, $order_id, $seat_reserved_id)
    {
        $this->findModel($ticket_id, $order_id, $seat_reserved_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TicketHasOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ticket_id
     * @param string $order_id
     * @param string $seat_reserved_id
     * @return TicketHasOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ticket_id, $order_id, $seat_reserved_id)
    {
        if (($model = TicketHasOrder::findOne(['ticket_id' => $ticket_id, 'order_id' => $order_id, 'seat_reserved_id' => $seat_reserved_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
