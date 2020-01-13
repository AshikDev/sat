<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\markdown\MarkdownEditor;
?>

<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
]); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?= $this->params['subTitle']; ?>
                </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'paragraph')->widget(
                    MarkdownEditor::classname(),
                    ['height' => 150]
                ); ?>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <div class="row">
                    <div class="col-md-10">
                        <?= Html::submitButton('Submit <i class="fa fa-save"></i>', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

