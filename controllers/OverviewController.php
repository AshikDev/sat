<?php

namespace app\controllers;

use app\models\File;
use app\models\Horizontal;
use app\models\Project;
use app\models\Vertical;
use Yii;
use app\models\Overview;
use app\models\OverviewSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

    public function actionData($view_id, $project_id)
    {
        $model = Overview::find()->where(['project_id' => $project_id])->all();
        $projectModel = Project::find()->where(['id' => $project_id])->one();
        $horizontalModel = Horizontal::find()->where(['view_id' => $view_id])->orderBy(['sort_order' => SORT_ASC, 'id' => SORT_ASC])->all();
        $verticalModel = Vertical::find()->where(['view_id' => $view_id, 'project_id' => $project_id])->orderBy(['sort_order' => SORT_ASC, 'id' => SORT_ASC])->all();
        $fileModel = File::find()->where(['view_id' => $view_id, 'project_id' => $project_id])->orderBy(['id' => SORT_ASC])->all();

        return $this->render('data', [
            'model' => $model,
            'projectModel' => $projectModel,
            'horizontalModel' => $horizontalModel,
            'verticalModel' => $verticalModel,
            'fileModel' => $fileModel,
            'view_id' => $view_id
        ]);
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
                    if($model->save()) {
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
                        if($model->save()) {
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
                    if($model->save()) {
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
                        if($model->save()) {
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
            if($model->save()) {
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
