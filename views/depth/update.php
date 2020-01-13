<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Depth */

$this->title = 'Depth';
$this->params['subTitle'] = 'Update Depth: ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => 'List of Depth Level', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="depth-update">

    <?= $this->render('_form', [
        'model' => $model,
        'viewModel' => $viewModel
    ]) ?>

</div>
