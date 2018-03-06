<?php

namespace backend\controllers;

use Yii;
use backend\models\NurseTbl;
use backend\models\NurseTblSearch;
use backend\models\DoctorNurseTblSearch;
use backend\models\NursePatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * NurseTblController implements the CRUD actions for NurseTbl model.
 */
class NurseTblController extends Controller
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
     * Lists all NurseTbl models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NurseTblSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NurseTbl model.
     * @param integer $id
     * @return mixed
     
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
*/
    public function actionView($id)
    {

      $searchModelDoctor = new DoctorNurseTblSearch();
      $dataProviderDoctor = $searchModelDoctor->searchdoctorfornurse($id); 
      
      $searchModelPatient = new NursePatientSearch();
      $dataProviderPatient = $searchModelPatient->searchpatientfornurse($id);   
       
        return $this->render('view', [
            'model' => $this->findModel($id),

            'searchModel' => $searchModelDoctor,
            'dataProvider' => $dataProviderDoctor,

             'searchModel2' => $searchModelPatient,
            'dataProvider2' => $dataProviderPatient,

           
           

            
        ]);
    }

    /**
     * Creates a new NurseTbl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NurseTbl();
        $model->scenario = 'createrule';

        if ($model->load(Yii::$app->request->post())) {
			
			$adm_type = Yii::$app->user->identity->admin_type;
			if ($adm_type==1)
			{
				$log_loc_id = Yii::$app->user->identity->admin_loc_id;
				$model->n_loc_id=$log_loc_id;
			}

			
            if( UploadedFile::getInstance($model, 'n_img_path')!=null){

            $image = UploadedFile::getInstance($model, 'n_img_path');

            $model->n_img_path= $model->n_nic.'.'.$image->extension;

             if ($model->save()) {
                $image->saveAs( 'uploads/nurses/'.$model->n_img_path);

                return $this->redirect(['view', 'id' => $model->n_id]);


            }
        }else{
             $model->n_img_path="default.jpg";
             if ($model->save()) {
             
            return $this->redirect(['view', 'id' => $model->n_id]);
        }

        }



        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing NurseTbl model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $myimgpath = $model->n_img_path;

        if ($model->load(Yii::$app->request->post())) {
			
			$adm_type = Yii::$app->user->identity->admin_type;
			
			if ($adm_type==1)
			{
				$log_loc_id = Yii::$app->user->identity->admin_loc_id;
				$model->n_loc_id=$log_loc_id;
			}


            if( UploadedFile::getInstance($model, 'n_img_path')!=null)
            {
                $image = UploadedFile::getInstance($model, 'n_img_path');
                $model->n_img_path= $model->n_nic.'.'.$image->extension;
            }
            else
            {
                $model->n_img_path= $myimgpath;
            }

            //$model->n_img_path= $model->n_nic.'.jpg';

             if ($model->save()) {
                 if( UploadedFile::getInstance($model, 'n_img_path')!=null){
                $image->saveAs( 'uploads/nurses/'.$model->n_img_path);
                }

                return $this->redirect(['view', 'id' => $model->n_id]);


            }



        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NurseTbl model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NurseTbl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NurseTbl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NurseTbl::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionFilternurse($id)
    {
	$adm_type = Yii::$app->user->identity->admin_type;	
    if ($adm_type==1)
	{
		$log_loc_id = Yii::$app->user->identity->admin_loc_id;
		$nurses= NurseTbl::find()->andWhere(['n_loc_id' => $log_loc_id])->andFilterWhere([
                        'or',
                        ['like', 'n_f_name', $id],
                        ['like', 'n_l_name', $id],
        ])->all();
	}
	else
	{
		$nurses= NurseTbl::find()->andFilterWhere([
                        'or',
                        ['like', 'n_f_name', $id],
                        ['like', 'n_l_name', $id],
        ])->all();
	}
            foreach ($nurses as $nurse) {
                 
                echo "<option value='".$nurse->n_id."'>".$nurse->n_f_name." ".$nurse->n_l_name."</option>";
                
            }


    }

}
