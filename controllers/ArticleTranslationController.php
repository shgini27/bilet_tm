<?php

namespace app\controllers;

use Yii;
use app\filters\AccessRule;
use yii\filters\AccessControl;
use app\models\ArticleTranslation;
use app\models\SearchArticleTranslation;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleTranslationController implements the CRUD actions for ArticleTranslation model.
 */
class ArticleTranslationController extends Controller
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
     * Lists all ArticleTranslation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchArticleTranslation();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArticleTranslation model.
     * @param integer $article_id
     * @param string $language_id
     * @return mixed
     */
    public function actionView($article_id, $language_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($article_id, $language_id),
        ]);
    }

    /**
     * Creates a new ArticleTranslation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArticleTranslation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'article_id' => $model->article_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ArticleTranslation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $article_id
     * @param string $language_id
     * @return mixed
     */
    public function actionUpdate($article_id, $language_id)
    {
        $model = $this->findModel($article_id, $language_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'article_id' => $model->article_id, 'language_id' => $model->language_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ArticleTranslation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $article_id
     * @param string $language_id
     * @return mixed
     */
    public function actionDelete($article_id, $language_id)
    {
        $this->findModel($article_id, $language_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArticleTranslation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $article_id
     * @param string $language_id
     * @return ArticleTranslation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($article_id, $language_id)
    {
        if (($model = ArticleTranslation::findOne(['article_id' => $article_id, 'language_id' => $language_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
