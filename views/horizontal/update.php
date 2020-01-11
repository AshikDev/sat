<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Horizontal */

$this->title = 'Phase name: ' . $model->name;
$this->params['subTitle'] = 'Update';

$this->params['breadcrumbs'][] = ['label' => 'Phase List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="horizontal-update">

    <?= $this->render('_form', [
        'model' => $model,
        'viewModel' => $viewModel
    ]) ?>

</div>
