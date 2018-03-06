<?php

namespace backend\controllers;

use Yii;
use backend\models\NewsTbl;
use backend\models\NewsTblSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

use backend\assets\ESMSWS;

/**
 * NewsTblController implements the CRUD actions for NewsTbl model.
 */
class NewsTblController extends Controller
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
     * Lists all NewsTbl models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsTblSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NewsTbl model.
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
     * Creates a new NewsTbl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		
		$encFile =Yii::getAlias('@common'). '/ESMSWS.php';
		require_once($encFile);
		
		
		
        if(yii::$app->user->can('super-admin')){
            $model = new NewsTbl();

			
			$model->load(Yii::$app->request->post());
			
			
            if ($model->save()) {
				$session=createSession('','esmsusr_breastcancer','br3astc4nc3r','');
				$alias= "mCare_BCC";
				$message_body= "New News Event. \n\n".$model->news_title."\n\nRead the full story at your Breast Cancer Care Mobile Application";
				sendMessages($session,$alias,$message_body,array('94712365043'));
				sendMessages($session,$alias,$message_body,array('94715403488'));
				sendMessages($session,$alias,$message_body,array('94715369728'));
				
                return $this->redirect(['view', 'id' => $model->news_id]);
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
     * Updates an existing NewsTbl model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(yii::$app->user->can('super-admin')){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->news_id]);
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
     * Deletes an existing NewsTbl model.
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
     * Finds the NewsTbl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NewsTbl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NewsTbl::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
