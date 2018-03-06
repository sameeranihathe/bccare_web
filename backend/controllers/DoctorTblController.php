<?php

namespace backend\controllers;

use Yii;
use backend\models\DoctorTbl;
use backend\models\DoctorTblSearch;

use backend\models\DoctorNurseTbl;
use backend\models\DoctorNurseTblSearch;
use backend\models\DoctorPatientTblSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * DoctorTblController implements the CRUD actions for DoctorTbl model.
 */
class DoctorTblController extends Controller
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
     * Lists all DoctorTbl models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DoctorTblSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DoctorTbl model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $searchModel = new DoctorNurseTblSearch();
        $dataProvider = $searchModel->search2($id);

        $searchModel2 = new DoctorPatientTblSearch();
        $dataProvider2 = $searchModel2->search2($id);

        return $this->render('view', [
            'model' => $this->findModel($id),

            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,
        ]);
    }

    /**
     * Creates a new DoctorTbl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DoctorTbl();

        $model->scenario = 'createrule';
		
        if ($model->load(Yii::$app->request->post()) ) {
			
		$adm_type = Yii::$app->user->identity->admin_type;
		
		if ($adm_type==1)
		{
			$log_loc_id = Yii::$app->user->identity->admin_loc_id;
			$model->d_loc_id=$log_loc_id;
		}



             if( UploadedFile::getInstance($model, 'd_img_path')!=null){



            $image = UploadedFile::getInstance($model, 'd_img_path');


            $model->d_img_path= $model->d_nic.'.'.$image->extension;


            if ($model->save()) {

                $image->saveAs( 'uploads/doctors/'.$model->d_img_path);
				
				$tstnic=$model->d_nic;
				$tstdid=$model->d_id;
				
				$sql= "INSERT INTO d_n_private_chat_tbl (pri_ch_room_name,d_id,n_id) VALUES ('$tstnic','$tstdid','0')";
				
				if(yii::$app->db->createCommand($sql)->execute())
				{
					return $this->redirect(['view', 'id' => $model->d_id]);

				}

                

            }

            }else {
                $model->d_img_path="default.jpg";
                if ($model->save()) {
                
                 return $this->redirect(['view', 'id' => $model->d_id]);
             }
                
            }

            
            

            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DoctorTbl model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $myimgpath = $model->d_img_path;

        if ($model->load(Yii::$app->request->post())) {
			
			$adm_type = Yii::$app->user->identity->admin_type;
		
		if ($adm_type==1)
		{
			$log_loc_id = Yii::$app->user->identity->admin_loc_id;
			$model->d_loc_id=$log_loc_id;
		}


            if( UploadedFile::getInstance($model, 'd_img_path')!=null)
            {
                $image = UploadedFile::getInstance($model, 'd_img_path');
                $model->d_img_path= $model->d_nic.'.'.$image->extension;
            }
            else
            {
                $model->d_img_path= $myimgpath;
            }

            //$model->n_img_path= $model->n_nic.'.jpg';

             if ($model->save()) {
                 if( UploadedFile::getInstance($model, 'd_img_path')!=null){
                $image->saveAs( 'uploads/doctors/'.$model->d_img_path);
                }

                return $this->redirect(['view', 'id' => $model->d_id]);


            }



        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DoctorTbl model.
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
     * Finds the DoctorTbl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DoctorTbl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DoctorTbl::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionLists($id)
		
    {
	$adm_type = Yii::$app->user->identity->admin_type;	
    if ($adm_type==1)
	{
		$log_loc_id = Yii::$app->user->identity->admin_loc_id;
		$doctors= DoctorTbl::find()->andWhere(['d_loc_id' => $log_loc_id])->andFilterWhere([
                        'or',
                        ['like', 'd_f_name', $id],
                        ['like', 'd_l_name', $id],
        ])->all();
	}
	else
	{
		$doctors= DoctorTbl::find()->andFilterWhere([
                        'or',
                        ['like', 'd_f_name', $id],
                        ['like', 'd_l_name', $id],
        ])->all();
	}
            foreach ($doctors as $doctor) {
                 
                echo "<option value='".$doctor->d_id."'>".$doctor->d_f_name." ".$doctor->d_l_name."</option>";
                
            }


	}


}
