<?php

namespace app\controllers;

use Yii;
use app\filters\AccessRule;
use yii\filters\AccessControl;
use app\models\CulturalPlaceTranslation;
use app\models\SearchCulturalPlaceTranslation;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CulturalPlaceTranslationController implements the CRUD actions for CulturalPlaceTranslation model.
 */
class CulturalPlaceTranslationController extends Controller
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
     * Lists all CulturalPlaceTranslation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchCulturalPlaceTranslation();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CulturalPlaceTranslation model.
     * @param string $cultural_place_id
     * @param string $language_id
     * @return mixed
     */
    public function actionView($cultural_place_id, $language_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($cultural_place_id, $language_id),
        ]);
    }

    /**
     * Creates a new CulturalPlaceTranslation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CulturalPlaceTranslation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cultural_place_id' => $model->cultural_place_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CulturalPlaceTranslation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $cultural_place_id
     * @param string $language_id
     * @return mixed
     */
    public function actionUpdate($cultural_place_id, $language_id)
    {
        $model = $this->findModel($cultural_place_id, $language_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cultural_place_id' => $model->cultural_place_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CulturalPlaceTranslation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $cultural_place_id
     * @param string $language_id
     * @return mixed
     */
    public function actionDelete($cultural_place_id, $language_id)
    {
        $this->findModel($cultural_place_id, $language_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CulturalPlaceTranslation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $cultural_place_id
     * @param string $language_id
     * @return CulturalPlaceTranslation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cultural_place_id, $language_id)
    {
        if (($model = CulturalPlaceTranslation::findOne(['cultural_place_id' => $cultural_place_id, 'language_id' => $language_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
