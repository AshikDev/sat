<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\markdown\MarkdownEditor;
use kartik\file\FileInput;

?>

<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

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

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'description')->widget(
                    MarkdownEditor::classname(),
                    ['height' => 150]
                ); ?>

                <?php

                echo $form->field($model, 'date_from', ['inputOptions' => [
                    'autocomplete' => 'off']])->widget(\kartik\date\DatePicker::className(), [
                    'attribute' => 'date_from',
                    'attribute2' => 'date_to',
                    'options' => ['placeholder' => 'Start date'],
                    'options2' => ['placeholder' => 'End date'],
                    'type' => \kartik\date\DatePicker::TYPE_RANGE,
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd'
                    ]
                ])->label('Project Duration');

                ?>

                <?= $form->field($model, 'logo')->widget(FileInput::className(), [
                    'options' => ['accept' => 'image/*', 'multiple' => false],
                    'pluginOptions' => [
                        'initialPreview'=>[
                            ($model->logo != null) ? Html::img( Yii::$app->request->baseUrl . "/img/" . $model->logo) : null,
                        ],
                        'overwriteInitial'=>true,
                        'showUpload' => false
                    ]
                ]);?>

                <?=  $form->field($model, 'extra')->dropDownList($contentModels, ['multiple' => false, 'prompt' => 'Select a field of research']); ?>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <?= Html::submitButton('Next <i class="fa fa-chevron-right"></i>', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

