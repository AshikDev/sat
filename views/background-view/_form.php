<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\color\ColorInput;

/* @var $this yii\web\View */
/* @var $model app\models\BackgroundView */
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

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'icon')->widget('\insolita\iconpicker\Iconpicker',
                    [
                        'iconset'=>'fontawesome',
                        'clientOptions'=>['rows'=>12,'cols'=>25,'placement'=>'right']
                    ])->label('Choose icon'); ?>

                <?= $form->field($model, 'color')->dropDownList($colorModel, ['prompt' => 'Select a color']); ?>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
