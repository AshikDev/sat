<?php

namespace app\controllers;

use app\models\BackgroundView;
use app\models\Depth;
use app\models\Horizontal;
use Yii;
use app\models\Vertical;
use app\models\VerticalSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VerticalController implements the CRUD actions for Vertical model.
 */
class VerticalController extends Controller
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
     * Lists all Vertical models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VerticalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vertical model.
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

    public function getHorizontal($id)
    {
        $data = Horizontal::find()->where(['view_id'=>$id])->select(['id','name'])->asArray()->all();
        $value = (count($data) == 0) ? ['' => ''] : $data;
        return $value;
    }

    public function getDepth($id)
    {
        $data = Depth::find()->where(['horizontal_id'=>$id])->select(['name as id','name as name'])->asArray()->all();
        $value = (count($data) == 0) ? ['' => ''] : $data;
        return $value;
    }

    public function actionHorizontal() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $view_id = $parents[0];
                $out = self::getHorizontal($view_id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionDepth() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $horizontal_id = $parents[0];
                $out = self::getDepth($horizontal_id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    /**
     * Creates a new Vertical model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($project_id)
    {
        $model = new Vertical();

        $viewModel = ArrayHelper::map(BackgroundView::find()->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post())) {
            $submit = \Yii::$app->request->post('submit');
            switch ($submit) {
                case 'more':
                    $model->project_id = $project_id;
                    if($model->save()) {
                        Yii::$app->session->setFlash('success', 'The depth has successfully been saved.');
                        return $this->refresh();
                    }
                    break;
                case 'next':
                    $model->project_id = $project_id;
                    if($model->save()) {
                        Yii::$app->session->setFlash('success', 'The  overview has successfully been saved.');
                        return $this->redirect(['file/create', 'project_id' => $project_id]);
                    }
                    break;
            }
        }

        return $this->render('create', [
            'model' => $model,
            'viewModel' => $viewModel
        ]);
    }

    public function actionEdit($project_id, $project_name)
    {
        $model = new Vertical();

        $viewModel = ArrayHelper::map(BackgroundView::find()->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post())) {
            $submit = \Yii::$app->request->post('submit');
            switch ($submit) {
                case 'more':
                    $model->project_id = $project_id;
                    if($model->save()) {
                        Yii::$app->session->setFlash('success', 'The depth has successfully been saved.');
                        return $this->refresh();
                    }
                    break;
                case 'next':
                    $modelVertical = Vertical::find()->where(['project_id' => $project_id])->one();
                    if((!isset($model->name)) && !empty($modelVertical)) {
                        return $this->redirect(['file/edit', 'project_id' => $project_id, 'project_name' => $project_name]);
                    } else {
                        $model->project_id = $project_id;
                        if($model->save()) {
                            Yii::$app->session->setFlash('success', 'The  overview has successfully been saved.');
                            return $this->redirect(['file/edit', 'project_id' => $project_id, 'project_name' => $project_name]);
                        }
                    }
                    break;
            }
        }

        return $this->render('edit', [
            'model' => $model,
            'viewModel' => $viewModel,
            'project_id' => $project_id,
            'project_name' => $project_name
        ]);
    }

    /**
     * Updates an existing Vertical model.
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
     * Deletes an existing Vertical model.
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
     * Finds the Vertical model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vertical the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vertical::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
