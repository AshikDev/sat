<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Link */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $this->params['subTitle']; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">

                <?=  $form->field($model, 'project_id')->dropDownList($projectModels, ['multiple' => false, 'prompt' => 'Please select a project']); ?>

                <?php

                echo $form->field($model, 'view_ids')->widget(Select2::classname(), [
                    'data' => $viewModels,
                    'options' => [
                        'placeholder' => 'Please select additional Views',
                        'multiple' => true
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label(false)->error(false);

                ?>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
