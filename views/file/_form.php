<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Vertical */
/* @var $form yii\widgets\ActiveForm */
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

                <?=  $form->field($model, 'view_id')->dropDownList($viewModel, ['multiple' => false, 'prompt' => 'Select a view']); ?>

                <?php

                echo $form->field($model, 'horizontal_id')->widget(DepDrop::classname(), [
                    'pluginOptions'=>[
                        'depends'=>[Html::getInputId($model, 'view_id')],
                        'placeholder'=>'Select a phase',
                        'url'=> Url::to(['/vertical/horizontal'])
                    ]
                ]);

                ?>

                <?php

                echo $form->field($model, 'vertical_id')->widget(DepDrop::classname(), [
                    'pluginOptions'=>[
                        'depends'=>[
                            Html::getInputId($model, 'horizontal_id'),
                        ],
                        'placeholder'=>'Select a depth level',
                        'url'=> Url::to(['/file/vertical', 'project_id' => $project_id])
                    ]
                ]);

                ?>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

                <?php

                echo $form->field($model, 'name')->widget(FileInput::className(), [
                    'options' => ['accept' => '*', 'multiple' => false],
                    'pluginOptions' => [
                        'showUpload' => false
                    ]
                ]);

                ?>

                <?= $form->field($model, 'estimate_time')->textInput() ?>

                <?= $form->field($model, 'metadata')->textarea(['rows' => '6']); ?>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <div class="row">
                    <div class="col-md-10">
                        <?= Html::submitButton('More Section <i class="fa fa-retweet"></i>', ['name' => 'submit', 'value' => 'more', 'class' => 'btn btn-success']) ?>
                    </div>
                    <div class="col-md-2">
                        <?= Html::submitButton('Save & Finish <i class="fa fa-save"></i>', ['name' => 'submit', 'value' => 'next', 'class' => 'btn btn-primary pull-right']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

