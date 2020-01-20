<?php

use kartik\select2\Select2;
use kartik\form\ActiveForm;
use yii\widgets\ListView;

$this->title = 'Projects';
$this->params['breadcrumbs'][] = ['label' => 'Select View', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = $this->title;

$data = ['Engineering', 'Computer Science', 'Psychology', 'Well-being', 'Economy', 'Biology', 'Medicine'];
$data2 = [ 1 => 'Latest', 2 => 'Oldest', 3 => 'Least Reading Time', 4 => 'Most Reading Time'];

?>

<?php $form = ActiveForm::begin([
    'action' => ['list?view_id=' . $view_id],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1
    ],
]); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <div class="col-md-3">
                    <?php

                    echo $form->field($searchModel, 'name', [
                        'addon' => ['append' => ['content'=>'<i class="glyphicon glyphicon-search"></i>']]
                    ])->label(false);

                    ?>
                </div>
                <div class="col-md-3">
                    <div class="input-group">

                        <?php

                        echo $form->field($searchModel, 'extra')->widget(Select2::classname(), [
                            'data' => $contentModels,
                            'options' => [
                                'placeholder' => 'Select a field of research',
                                'multiple' => true
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false)->error(false);

                        ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <?php

                        echo $form->field($searchModel, 'sort')->widget(Select2::classname(), [
                            'data' => $data2,
                            'options' => ['placeholder' => 'Sort by'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false)->error(false);

                        ?>
                    </div>
                </div>

                <div class="btn-group" role="group">
                    <?= \yii\helpers\Html::resetButton('Reset', ['class' => 'btn btn-danger']) ?>
                    <?= \yii\helpers\Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
                </div>



                <div class="box-tools pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" id="list_button"><i class="fa fa-list-ul"></i></button>
                        <button type="button" class="btn btn-default" id="grid_button"><i class="fa fa-th"></i></button>
                    </div>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <?php

                    echo ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemView' => '_list',
                    ]);

                    ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<?php ActiveForm::end(); ?>

<?php
$this->registerJs("

    $('#grid_button').click(function() {
        $('.list_row').removeClass('row');
        $('.list_grid_col').removeClass('col-md-12');
        $('.list_grid_col').addClass('col-md-4');
        
        $('#grid_button').removeClass('btn-default');
        $('#grid_button').addClass('btn-info');
        $('#list_button').addClass('btn-default');
        $('#list_button').removeClass('btn-info');
    });
    
    $('#list_button').click(function() {
        $('.list_row').addClass('row');
        $('.list_grid_col').removeClass('col-md-4');
        $('.list_grid_col').addClass('col-md-12');
        
        $('#list_button').removeClass('btn-default');
        $('#list_button').addClass('btn-info');
        $('#grid_button').addClass('btn-default');
        $('#grid_button').removeClass('btn-info');
    });
    
    ", \yii\web\View::POS_READY);
?>
