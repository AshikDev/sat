<?php

use kartik\select2\Select2;
use kartik\form\ActiveForm;
use yii\widgets\ListView;

$this->title = 'Projects';
$this->params['breadcrumbs'][] = ['label' => 'Select View', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = $this->title;

$data = ['Engineering', 'Computer Science', 'Psychology', 'Well-being', 'Economy', 'Biology', 'Medicine'];
$data2 = ['Latest', 'Oldest', 'Least Reading Time', 'Most Reading Time'];

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

                        // Multiple select without model
                        echo Select2::widget([
                            'name' => 'research',
                            'data' => $data,
                            'options' => ['multiple' => true, 'placeholder' => 'Field of research'],
                        ]);

                        ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <?php

                        // Multiple select without model
                        echo Select2::widget([
                            'name' => 'sort',
                            'data' => $data2,
                            'options' => ['placeholder' => 'Sort by'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);

                        ?>
                    </div>
                </div>

                <div class="box-tools pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default"><i class="fa fa-list-ul"></i></button>
                        <button type="button" class="btn btn-default"><i class="fa fa-th"></i></button>
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

<?= \yii\helpers\Html::submitButton('Search', ['class' => 'btn btn-primary hidden']) ?>

<?php ActiveForm::end(); ?>
