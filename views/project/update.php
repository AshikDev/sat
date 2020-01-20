<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = 'Project';
$this->params['subTitle'] = 'Update  Project: ' . $model->name;

$this->params['breadcrumbs'][] = '01. ' . $this->params['subTitle'];

$this->params['wizard'][] = ['label' => '01. ' . $this->params['subTitle'], 'url' => ['create']];
$this->params['wizard'][] = '02. Update Overview';
$this->params['wizard'][] = '03. Update Layer';
$this->params['wizard'][] = '04. Update Files';

?>
<div class="project-update">

    <?= $this->render('_form', [
        'model' => $model,
        'contentModels' => $contentModels
    ]) ?>

</div>
