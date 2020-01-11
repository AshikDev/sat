<?php

namespace app\controllers;

use app\models\BackgroundView;
use app\models\Horizontal;
use app\models\Vertical;
use Yii;
use app\models\File;
use app\models\FileSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * FileController implements the CRUD actions for File model.
 */
class FileController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all File models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single File model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function getVertical($horizontal_id, $project_id)
    {
        $data = Vertical::find()
            ->select(['id','name'])
            ->andWhere(['horizontal_id' => $horizontal_id])
            ->andWhere(['project_id' => $project_id])
            ->asArray()
            ->all();
        $value = (count($data) == 0) ? ['' => ''] : $data;
        return $value;
    }

    public function actionVertical($project_id) {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $horizontal_id = $parents[0];
                $out = self::getVertical($horizontal_id, $project_id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function getFileProperties($extension) {
        $properties = [];
        $type = [];
        $icon = [];

        $extension = strtolower($extension);

        $imageExtensions = ["jpg", "png", "jpeg", "gif"];
        $videoExtensions = ["avi", "flv", "wmv", "mp4", "mov"];
        $audioExtensions = ["mp3", "wav"];
        $docExtensions = ["doc", "docx", "odt"];
        $excelExtensions = ["xls", "xlsx", "csv"];
        $pptExtensions = ["ppt", "pptx"];
        $pdfExtensions = ["pdf"];
        $zipExtensions = ["zip", "rar", "7z"];

        if(in_array($extension, $imageExtensions)) {
            $type['name'] = "image";
            $icon['fa'] = "fa-image";
        } else if(in_array($extension, $videoExtensions)) {
            $type['name'] = "video";
            $icon['fa'] = "fa-file-video-o";
        } else if(in_array($extension, $audioExtensions)) {
            $type['name'] = "audio";
            $icon['fa'] = "fa-file-audio-o";
        } else if(in_array($extension, $docExtensions)) {
            $type['name'] = "doc";
            $icon['fa'] = "fa-file";
        } else if(in_array($extension, $excelExtensions)) {
            $type['name'] = "excel";
            $icon['fa'] = "fa-file";
        } else if(in_array($extension, $pptExtensions)) {
            $type['name'] = "ppt";
            $icon['fa'] = "fa-pied-piper-pp";
        } else if(in_array($extension, $pdfExtensions)) {
            $type['name'] = "pdf";
            $icon['fa'] = "fa-file-pdf-o";
        } else if(in_array($extension, $zipExtensions)) {
            $type['name'] = "zip";
            $icon['fa'] = "fa-file-archive-o";
        } else {
            $type['name'] = "unknown";
            $icon['fa'] = "fa-file";
        }

        $properties = $type + $icon;

        return $properties;
    }

    /**
     * Creates a new File model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($project_id)
    {
        $model = new File();

        $viewModel = ArrayHelper::map(BackgroundView::find()->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post())) {

            $upload = UploadedFile::getInstance($model, 'name');
            $model->name = time() . Yii::$app->user->identity->id . '.' . $upload->extension;

            $fileProperties = self::getFileProperties($upload->extension);
            $model->project_id = $project_id;
            $model->file_type = $fileProperties['name'];
            $model->icon = $fileProperties['fa'];

            $submit = \Yii::$app->request->post('submit');
            switch ($submit) {
                case 'more':
                    if($model->save()) {
                        $upload->saveAs(Yii::getAlias('@app/web/img') . '/' . $model->name);
                        $model->view_id = '';
                        Yii::$app->session->setFlash('success', 'The file has successfully been saved.');
                        // return $this->refresh();
                    }
                    break;
                case 'next':
                    if($model->save()) {
                        Yii::$app->session->setFlash('success', 'The file has successfully been saved.');
                        return $this->redirect(['site/index']);
                    }
                    break;
            }
        }

        return $this->render('create', [
            'model' => $model,
            'viewModel' => $viewModel,
            'project_id' => $project_id
        ]);
    }

    /**
     * Updates an existing File model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing File model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the File model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return File the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = File::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
