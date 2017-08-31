<?php

namespace app\controllers;

use Yii;
use app\filters\AccessRule;
use yii\filters\AccessControl;
use app\models\ArticleCategoryTranslation;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleCategoryTranslationController implements the CRUD actions for ArticleCategoryTranslation model.
 */
class ArticleCategoryTranslationController extends Controller
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
     * Lists all ArticleCategoryTranslation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ArticleCategoryTranslation::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArticleCategoryTranslation model.
     * @param integer $article_category_id
     * @param string $language_id
     * @return mixed
     */
    public function actionView($article_category_id, $language_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($article_category_id, $language_id),
        ]);
    }

    /**
     * Creates a new ArticleCategoryTranslation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArticleCategoryTranslation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'article_category_id' => $model->article_category_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ArticleCategoryTranslation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $article_category_id
     * @param string $language_id
     * @return mixed
     */
    public function actionUpdate($article_category_id, $language_id)
    {
        $model = $this->findModel($article_category_id, $language_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'article_category_id' => $model->article_category_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ArticleCategoryTranslation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $article_category_id
     * @param string $language_id
     * @return mixed
     */
    public function actionDelete($article_category_id, $language_id)
    {
        $this->findModel($article_category_id, $language_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArticleCategoryTranslation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $article_category_id
     * @param string $language_id
     * @return ArticleCategoryTranslation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($article_category_id, $language_id)
    {
        if (($model = ArticleCategoryTranslation::findOne(['article_category_id' => $article_category_id, 'language_id' => $language_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
