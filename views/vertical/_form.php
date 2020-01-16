<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vertical */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
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

                echo $form->field($model, 'horizontal_id')->widget(\kartik\depdrop\DepDrop::classname(), [
                    'pluginOptions'=>[
                        'depends'=>[Html::getInputId($model, 'view_id')],
                        'placeholder'=>'Select a phase',
                        'url'=> \yii\helpers\Url::to(['/vertical/horizontal'])
                    ]
                ]);

                ?>

                <?php

                echo $form->field($model, 'name')->widget(\kartik\depdrop\DepDrop::classname(), [
                    'pluginOptions'=>[
                        'depends'=>[Html::getInputId($model, 'horizontal_id')],
                        'placeholder'=>'Select a depth',
                        'url'=> \yii\helpers\Url::to(['/vertical/depth'])
                    ]
                ]);

                ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'sort_order')->textInput() ?>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <div class="row">
                    <div class="col-md-6">
                        <?= Html::submitButton('More Section <i class="fa fa-retweet"></i>', ['name' => 'submit', 'value' => 'more', 'class' => 'btn btn-success']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= Html::submitButton('Next Step <i class="fa fa-chevron-right"></i>', ['name' => 'submit', 'value' => 'next', 'class' => 'btn btn-primary pull-right']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
