<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Horizontal */

$this->title = 'Phase';
$this->params['subTitle'] = 'Create New';

$this->params['breadcrumbs'][] = ['label' => 'Phase List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horizontal-create">

    <?= $this->render('_form', [
        'model' => $model,
        'viewModel' => $viewModel
    ]) ?>

</div>
