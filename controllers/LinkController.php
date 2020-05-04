<?php

namespace app\controllers;

use app\models\BackgroundView;
use app\models\Project;
use Yii;
use app\models\Link;
use app\models\LinkSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LinkController implements the CRUD actions for Link model.
 */
class LinkController extends Controller
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
     * Lists all Link models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LinkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Link model.
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

    /**
     * Creates a new Link model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Link();

        if ($model->load(Yii::$app->request->post())) {

            $projectName = Project::find()
                ->select(['name'])
                ->where(['id' => $model->project_id])
                ->scalar();
            $model->project_name = $projectName;

            $viewNames = BackgroundView::find()
                ->select('name')
                ->where(['in', 'id', $model->view_ids])
                ->asArray()
                ->column();
            $model->view_names = implode(', ', $viewNames);
            $model->view_ids = implode(', ', $model->view_ids);

            if($model->save()) {
                Yii::$app->session->setFlash('success', 'Congratulations! Additional views have successfully been saved.');
            }
        }

        $projectModels = ArrayHelper::map(Project::find()->all(), 'id', 'name');
        $viewModels = ArrayHelper::map(BackgroundView::find()->all(), 'id', 'name');

        return $this->render('create', [
            'model' => $model,
            'viewModels' => $viewModels,
            'projectModels' => $projectModels
        ]);
    }

    /**
     * Updates an existing Link model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $projectName = Project::find()
                ->select(['name'])
                ->where(['id' => $model->project_id])
                ->scalar();
            $model->project_name = $projectName;

            $viewNames = BackgroundView::find()
                ->select('name')
                ->where(['in', 'id', $model->view_ids])
                ->asArray()
                ->column();
            $model->view_names = implode(', ', $viewNames);
            $model->view_ids = implode(', ', $model->view_ids);

            if($model->save()) {
                Yii::$app->session->setFlash('success', 'Congratulations! Additional views have successfully been saved.');
            }
        }

        $projectModels = ArrayHelper::map(Project::find()->all(), 'id', 'name');
        $viewModels = ArrayHelper::map(BackgroundView::find()->all(), 'id', 'name');

        return $this->render('create', [
            'model' => $model,
            'viewModels' => $viewModels,
            'projectModels' => $projectModels
        ]);
    }

    /**
     * Deletes an existing Link model.
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
     * Finds the Link model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Link the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Link::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
