<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\markdown\MarkdownEditor;

?>

<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?= \yii\widgets\Breadcrumbs::widget([
                        'itemTemplate' => "<li><i>{link}</i></li>\n",
                        'homeLink' => [
                            'label' => '',
                            'template' => '',
                        ],
                        'links' => isset($this->params['wizard']) ? $this->params['wizard'] : [],
                    ]) ?>
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
                        <?= Html::submitButton('More Section <i class="fa fa-retweet"></i>', ['name' => 'submit', 'value' => 'more', 'class' => 'btn btn-success']) ?>
                    </div>
                    <div class="col-md-2 pull-right">
                        <?= Html::submitButton('Next Step <i class="fa fa-chevron-right"></i>', ['name' => 'submit', 'value' => 'next', 'class' => 'btn btn-primary pull-right']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

