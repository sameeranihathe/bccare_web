<?php

namespace backend\controllers;

use Yii;
use backend\models\ProductsTbl;
use backend\models\ProductsTblSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\ForbiddenHttpException;

/**
 * ProductsTblController implements the CRUD actions for ProductsTbl model.
 */
class ProductsTblController extends Controller
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
     * Lists all ProductsTbl models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsTblSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductsTbl model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProductsTbl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(yii::$app->user->can('super-admin')){
            $model = new ProductsTbl();

            if ($model->load(Yii::$app->request->post())) {

                  $image = UploadedFile::getInstance($model, 'product_img_path');

                $model->product_img_path= $model->product_title.'.'.$image->extension;

                 if ($model->save()) {
                    $image->saveAs( 'uploads/products/'.$model->product_img_path);

                    return $this->redirect(['view', 'id' => $model->product_id]);

                }
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }else{
            throw new ForbiddenHttpException;

        }
    }

    /**
     * Updates an existing ProductsTbl model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(yii::$app->user->can('super-admin')){
            $model = $this->findModel($id);

             if ($model->load(Yii::$app->request->post())) {

                  $image = UploadedFile::getInstance($model, 'product_img_path');

                $model->product_img_path= $model->product_title.'.'.$image->extension;

                 if ($model->save()) {
                    $image->saveAs( 'uploads/products/'.$model->product_img_path);

                    return $this->redirect(['view', 'id' => $model->product_id]);

                }
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing ProductsTbl model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(yii::$app->user->can('super-admin')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Finds the ProductsTbl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductsTbl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductsTbl::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
