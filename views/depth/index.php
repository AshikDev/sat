<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DepthSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Depths';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">List of Depths</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php Pjax::begin(); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'name',
                        [
                            'attribute' => 'horizontalName',
                            'value' => 'horizontal.name'
                        ],
                        [
                            'attribute' => 'viewName',
                            'value' => 'view.name'
                        ],

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

                <?php Pjax::end(); ?>

            </div>

        </div>
    </div>
</div>

