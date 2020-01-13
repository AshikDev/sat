<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Depth */

$this->title = 'Depth';
$this->params['subTitle'] = 'Create New';

$this->params['breadcrumbs'][] = ['label' => 'List of Depth Level', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="depth-create">

    <?= $this->render('_form', [
        'model' => $model,
        'viewModel' => $viewModel
    ]) ?>

</div>
