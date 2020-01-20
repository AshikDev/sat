<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Overview */

$this->title = 'Project';
$this->params['breadcrumbs'][] = ['label' => '01. Add Project', 'url' => ['project/create']];
$this->params['breadcrumbs'][] = ['label' => '02. Add Overview', 'url' => ['overview/create']];
$this->params['breadcrumbs'][] = '03. Add Depth';

$this->params['wizard'][] = ['label' => '01. Add Project', 'url' => ['project/create']];
$this->params['wizard'][] = ['label' => '02. Add Overview', 'url' => ['overview/create']];
$this->params['wizard'][] = ['label' => '03. Add Layer', 'url' => ['create']];
$this->params['wizard'][] = '04. Add Files';

?>

<div class="vertical-create">

    <?= $this->render('_form', [
        'model' => $model,
        'viewModel' => $viewModel
    ]) ?>

</div>
