<?php

namespace app\controllers;

use Yii;
use app\filters\AccessRule;
use yii\filters\AccessControl;
use app\models\ShowCategoryTranslation;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShowCategoryTranslationController implements the CRUD actions for ShowCategoryTranslation model.
 */
class ShowCategoryTranslationController extends Controller
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
     * Lists all ShowCategoryTranslation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ShowCategoryTranslation::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ShowCategoryTranslation model.
     * @param string $show_category_id
     * @param string $language_id
     * @return mixed
     */
    public function actionView($show_category_id, $language_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($show_category_id, $language_id),
        ]);
    }

    /**
     * Creates a new ShowCategoryTranslation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ShowCategoryTranslation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'show_category_id' => $model->show_category_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ShowCategoryTranslation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $show_category_id
     * @param string $language_id
     * @return mixed
     */
    public function actionUpdate($show_category_id, $language_id)
    {
        $model = $this->findModel($show_category_id, $language_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'show_category_id' => $model->show_category_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ShowCategoryTranslation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $show_category_id
     * @param string $language_id
     * @return mixed
     */
    public function actionDelete($show_category_id, $language_id)
    {
        $this->findModel($show_category_id, $language_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ShowCategoryTranslation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $show_category_id
     * @param string $language_id
     * @return ShowCategoryTranslation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($show_category_id, $language_id)
    {
        if (($model = ShowCategoryTranslation::findOne(['show_category_id' => $show_category_id, 'language_id' => $language_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
