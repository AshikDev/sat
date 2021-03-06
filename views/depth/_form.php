<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Horizontal */
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

                <?=  $form->field($model, 'view_id')->dropDownList($viewModel, ['multiple' => false, 'prompt' => 'Select a view']); ?>

                <?php

                echo $form->field($model, 'horizontal_id')->widget(\kartik\depdrop\DepDrop::classname(), [
                    'pluginOptions'=>[
                        'depends'=>[Html::getInputId($model, 'view_id')],
                        'placeholder'=>'Select a phase',
                        'url'=> \yii\helpers\Url::to(['/vertical/horizontal'])
                    ]
                ]);

                ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'sort_order')->textInput() ?>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

