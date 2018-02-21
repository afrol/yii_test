<?php

namespace app\controllers;

use Yii;
use app\models\Itunes;
use app\models\ItunesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItunesController implements the CRUD actions for Itunes model.
 */
class ItunesController extends Controller
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
        ];
    }

    /**
     * Lists all Itunes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItunesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Itunes model.
     * @param integer $transaction_id
     * @param integer $profile_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($transaction_id, $profile_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($transaction_id, $profile_id),
        ]);
    }

    /**
     * Creates a new Itunes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Itunes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'transaction_id' => $model->transaction_id, 'profile_id' => $model->profile_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Itunes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $transaction_id
     * @param integer $profile_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($transaction_id, $profile_id)
    {
        $model = $this->findModel($transaction_id, $profile_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'transaction_id' => $model->transaction_id, 'profile_id' => $model->profile_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Itunes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $transaction_id
     * @param integer $profile_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($transaction_id, $profile_id)
    {
        $this->findModel($transaction_id, $profile_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Itunes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $transaction_id
     * @param integer $profile_id
     * @return Itunes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($transaction_id, $profile_id)
    {
        if (($model = Itunes::findOne(['transaction_id' => $transaction_id, 'profile_id' => $profile_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
