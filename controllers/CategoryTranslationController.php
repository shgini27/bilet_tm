<?php

namespace app\controllers;

use Yii;
use app\filters\AccessRule;
use yii\filters\AccessControl;
use app\models\CategoryTranslation;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryTranslationController implements the CRUD actions for CategoryTranslation model.
 */
class CategoryTranslationController extends Controller
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
     * Lists all CategoryTranslation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CategoryTranslation::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CategoryTranslation model.
     * @param integer $category_id
     * @param string $language_id
     * @return mixed
     */
    public function actionView($category_id, $language_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($category_id, $language_id),
        ]);
    }

    /**
     * Creates a new CategoryTranslation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CategoryTranslation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'category_id' => $model->category_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CategoryTranslation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $category_id
     * @param string $language_id
     * @return mixed
     */
    public function actionUpdate($category_id, $language_id)
    {
        $model = $this->findModel($category_id, $language_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'category_id' => $model->category_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CategoryTranslation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $category_id
     * @param string $language_id
     * @return mixed
     */
    public function actionDelete($category_id, $language_id)
    {
        $this->findModel($category_id, $language_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CategoryTranslation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $category_id
     * @param string $language_id
     * @return CategoryTranslation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($category_id, $language_id)
    {
        if (($model = CategoryTranslation::findOne(['category_id' => $category_id, 'language_id' => $language_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
