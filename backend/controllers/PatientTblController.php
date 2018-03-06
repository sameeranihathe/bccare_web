<?php

namespace backend\controllers;

use Yii;
use backend\models\PatientTbl;
use backend\models\PatientTblSearch;
use backend\models\PubProvinceTbl;
use backend\models\PubDsDivisionTbl;
use backend\models\PubDistrictTbl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


use backend\models\DoctorPatientTblSearch;
use backend\models\NursePatientSearch;

/**
 * PatientTblController implements the CRUD actions for PatientTbl model.
 */
class PatientTblController extends Controller
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
     * Lists all PatientTbl models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientTblSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PatientTbl model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
       $searchModel2 = new DoctorPatientTblSearch();
        $dataProvider2 = $searchModel2->search3($id);

        $searchModel3 = new NursePatientSearch();
        $dataProvider3 = $searchModel3->search5($id);


        return $this->render('view', [
            'model' => $this->findModel($id),

             'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,

            'searchModel3' => $searchModel3,
            'dataProvider3' => $dataProvider3,
         
        ]);

        
    }

    /**
     * Creates a new PatientTbl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new PatientTbl();
        $modelnew = new PubProvinceTbl();
        $modelnew2 = new PubDsDivisionTbl();
        $modelnew3 = new PubDistrictTbl();
        
        $model->scenario = 'createrule';

        if ($model->load(Yii::$app->request->post())) {

            
            $model->p_dis_id=1;
            $model->p_msg_ser_stat=1;

            if($model->p_discharged_stat=0){
                $model->p_discharged_date=null;
            }
			
			$adm_type = Yii::$app->user->identity->admin_type;
		
		if ($adm_type==1)
		{
			$log_loc_id = Yii::$app->user->identity->admin_loc_id;
			$model->p_loc_id=$log_loc_id;
		}
            
        if( UploadedFile::getInstance($model, 'p_img_path')!=null)
        {

            $image = UploadedFile::getInstance($model, 'p_img_path');

            $model->p_img_path= $model->p_nic.'.'.$image->extension;

             if ($model->save()) {
                $image->saveAs( 'uploads/patients/'.$model->p_img_path);

                $model->p_dis_id==1;
                $model->p_msg_ser_stat==1;
                return $this->redirect(['view', 'id' => $model->p_id]);


                }
        }else
        {
            $model->p_img_path="default.png";
            if ($model->save()) 
                {
                   
                    return $this->redirect(['view', 'id' => $model->p_id]);
                }

        }

        } else {
            return $this->render('create', [
                'model' => $model,
                'modelnew' => $modelnew,
                'modelnew2' => $modelnew2,
                'modelnew3' => $modelnew3,
            ]);
        }
    }


    /**
     * Updates an existing PatientTbl model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelnew = new PubProvinceTbl();
        $modelnew2 = new PubDsDivisionTbl();
        $modelnew3 = new PubDistrictTbl();

        $myimgpath = $model->p_img_path;

        if ($model->load(Yii::$app->request->post())) {
			
			$adm_type = Yii::$app->user->identity->admin_type;
		
		if ($adm_type==1)
		{
			$log_loc_id = Yii::$app->user->identity->admin_loc_id;
			$model->p_loc_id=$log_loc_id;
		}


            if( UploadedFile::getInstance($model, 'p_img_path')!=null)
            {
                $image = UploadedFile::getInstance($model, 'p_img_path');
                $model->p_img_path= $model->p_nic.'.'.$image->extension;
            }
            else
            {
                $model->p_img_path= $myimgpath;
            }

            //$model->n_img_path= $model->n_nic.'.jpg';

             if ($model->save()) {
                 if( UploadedFile::getInstance($model, 'p_img_path')!=null){
                $image->saveAs( 'uploads/patients/'.$model->p_img_path);
                }

                return $this->redirect(['view', 'id' => $model->p_id]);


            }



        } else {
            return $this->render('create', [
                'model' => $model,
                'modelnew' => $modelnew,
                'modelnew2' => $modelnew2,
                'modelnew3' => $modelnew3,
            ]);
        }
    }
   

    /**
     * Deletes an existing PatientTbl model.
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
     * Finds the PatientTbl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PatientTbl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PatientTbl::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionFilterpatient($id)
    {
	$adm_type = Yii::$app->user->identity->admin_type;	
    if ($adm_type==1)
	{
		$log_loc_id = Yii::$app->user->identity->admin_loc_id;
		$patients= PatientTbl::find()->andWhere(['p_loc_id' => $log_loc_id])->andFilterWhere([
                        'or',
                        ['like', 'p_f_name', $id],
                        ['like', 'p_l_name', $id],
        ])->all();
	}
	else
	{
		$patients= PatientTbl::find()->andFilterWhere([
                        'or',
                        ['like', 'p_f_name', $id],
                        ['like', 'p_l_name', $id],
        ])->all();
	}
            foreach ($patients as $patient) {
                 
                echo "<option value='".$patient->p_id."'>".$patient->p_f_name." ".$patient->p_l_name."</option>";
                
            }


    }

}
