<?php

namespace app\controllers;

use app\models\File;
use app\models\Horizontal;
use app\models\Link;
use app\models\Project;
use app\models\Vertical;
use Yii;
use app\models\Overview;
use app\models\OverviewSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * OverviewController implements the CRUD actions for Overview model.
 */
class OverviewController extends Controller
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
     * Lists all Overview models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OverviewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Overview model.
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

    public function actionDownload($file_name) {
        $path = Yii::getAlias('@app/web/img/') . $file_name;

        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path, $file_name);
        }

        Yii::app()->end();
    }

    public function setSessionView($view_id, $icon) {
        Yii::$app->session->set('icon', $icon);
        Yii::$app->session->set('view_id', $view_id);
    }

    public function actionData($view_id, $project_id, $icon = null)
    {
        $model = Overview::find()->where(['project_id' => $project_id])->all();
        $projectModel = Project::find()->where(['id' => $project_id])->one();
        $horizontalModel = Horizontal::find()->where(['view_id' => $view_id])->orderBy(['sort_order' => SORT_ASC, 'id' => SORT_ASC])->all();
        $verticalModel = Vertical::find()->where(['view_id' => $view_id, 'project_id' => $project_id])->orderBy(['sort_order' => SORT_ASC, 'id' => SORT_ASC])->all();
        $fileModel = File::find()->where(['view_id' => $view_id, 'project_id' => $project_id])->orderBy(['id' => SORT_ASC])->all();
        // $fileMaxModel = File::find()->select(['MAX(estimate_time) as estimate_time'])->where(['view_id' => $view_id, 'project_id' => $project_id])->one();
        $alternativeView = File::find()
            ->select(['background_view.name as name', 'background_view.icon as icon', 'background_view.id as view_id'])
            ->where(['project_id' => $project_id])
            ->andWhere(['<>', 'view_id', $view_id])
            ->joinWith('view')
            ->distinct()
            ->all();

        if ((empty($horizontalModel) || empty($verticalModel)) && !empty($alternativeView)) {

            $linkViewIds = Link::find()
                ->select(['view_ids'])
                ->where(['project_id' => $project_id])
                ->scalar();

            if(($linkViewIds) && !empty($linkViewIds)) {
                $linkViewIdArray = explode(',', $linkViewIds);
                if(in_array($view_id, $linkViewIdArray)) {
                    $alternativeViewOne = File::find()
                        ->select(['background_view.id as view_id'])
                        ->where(['project_id' => $project_id])
                        ->andWhere(['<>', 'view_id', $view_id])
                        ->andWhere(['in', 'background_view.id', $linkViewIdArray])
                        ->joinWith('view')
                        ->distinct()
                        ->one();

                    if(isset($alternativeViewOne->view_id) && !empty($alternativeViewOne->view_id)) {
                        $horizontalModel = Horizontal::find()->where(['view_id' => $alternativeViewOne->view_id])->orderBy(['sort_order' => SORT_ASC, 'id' => SORT_ASC])->all();
                        $verticalModel = Vertical::find()->where(['view_id' => $alternativeViewOne->view_id, 'project_id' => $project_id])->orderBy(['sort_order' => SORT_ASC, 'id' => SORT_ASC])->all();
                        $fileModel = File::find()->where(['view_id' => $alternativeViewOne->view_id, 'project_id' => $project_id])->orderBy(['id' => SORT_ASC])->all();
                    }
                }
            }
        }

        if($icon != null) {
            self::setSessionView($view_id, $icon);
        }

        return $this->render('data', [
            'model' => $model,
            'projectModel' => $projectModel,
            'horizontalModel' => $horizontalModel,
            'verticalModel' => $verticalModel,
            'fileModel' => $fileModel,
            'view_id' => $view_id,
            'alternativeView' => $alternativeView,
            'maxTime' => 120
        ]);
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
     * Creates a new Overview model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($project_id)
    {
        $model = new Overview();

        if ($model->load(Yii::$app->request->post())) {
            switch (\Yii::$app->request->post('submit')) {
                case 'more':
                    $model->project_id = $project_id;
                    $upload = UploadedFile::getInstance($model, 'extra');
                    $model->extra = time() . Yii::$app->user->identity->id . '.' . $upload->extension;

                    if($model->save()) {
                        $upload->saveAs(Yii::getAlias('@app/web/img') . '/' . $model->extra);
                        Yii::$app->session->setFlash('success', 'Project overview has successfully been saved.');
                        return $this->refresh();
                    }
                    break;
                case 'next':
                    $modelOverview = Overview::find()->where(['project_id' => $project_id])->one();
                    if((!isset($model->name)) && !empty($modelOverview)) {
                        return $this->redirect(['vertical/create', 'project_id' => $project_id]);
                    } else {
                        $model->project_id = $project_id;
                        $upload = UploadedFile::getInstance($model, 'extra');
                        $model->extra = time() . Yii::$app->user->identity->id . '.' . $upload->extension;

                        if($model->save()) {
                            $upload->saveAs(Yii::getAlias('@app/web/img') . '/' . $model->extra);
                            Yii::$app->session->setFlash('success', 'Project overview has successfully been saved.');
                            return $this->redirect(['vertical/create', 'project_id' => $project_id]);
                        }
                    }
                    break;
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionEdit($project_id, $project_name)
    {
        $model = new Overview();

        if ($model->load(Yii::$app->request->post())) {
            switch (\Yii::$app->request->post('submit')) {
                case 'more':
                    $model->project_id = $project_id;
                    $upload = UploadedFile::getInstance($model, 'extra');
                    $model->extra = time() . Yii::$app->user->identity->id . '.' . $upload->extension;

                    if($model->save()) {
                        $upload->saveAs(Yii::getAlias('@app/web/img') . '/' . $model->extra);
                        Yii::$app->session->setFlash('success', 'Project overview has successfully been saved.');
                        return $this->refresh();
                    }
                    break;
                case 'next':
                    $modelOverview = Overview::find()->where(['project_id' => $project_id])->one();
                    if((!isset($model->name)) && !empty($modelOverview)) {
                        return $this->redirect(['vertical/edit', 'project_id' => $project_id, 'project_name' => $project_name]);
                    } else {
                        $model->project_id = $project_id;
                        $upload = UploadedFile::getInstance($model, 'extra');
                        $model->extra = time() . Yii::$app->user->identity->id . '.' . $upload->extension;

                        if($model->save()) {
                            $upload->saveAs(Yii::getAlias('@app/web/img') . '/' . $model->extra);
                            Yii::$app->session->setFlash('success', 'Project overview has successfully been saved.');
                            return $this->redirect(['vertical/edit', 'project_id' => $project_id, 'project_name' => $project_name]);
                        }
                    }
                    break;
            }
        }

        return $this->render('edit', [
            'model' => $model,
            'project_id' => $project_id,
            'project_name' => $project_name
        ]);
    }

    /**
     * Updates an existing Overview model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $project_id = $model->project_id;

        if ($model->load(Yii::$app->request->post())) {
            $model->project_id = $project_id;

            $upload = UploadedFile::getInstance($model, 'extra');
            $model->extra = time() . Yii::$app->user->identity->id . '.' . $upload->extension;

            if($model->save()) {
                $upload->saveAs(Yii::getAlias('@app/web/img') . '/' . $model->extra);
                Yii::$app->session->setFlash('success', 'Project overview has successfully been saved.');
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Overview model.
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
     * Finds the Overview model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Overview the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Overview::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
