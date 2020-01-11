<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Overview */

$this->title = 'Project';

$this->params['breadcrumbs'][] = ['label' => '01. Add Project', 'url' => ['project/create']];
$this->params['breadcrumbs'][] = ['label' => '02. Add Overview', 'url' => ['overview/create']];
$this->params['breadcrumbs'][] = ['label' => '03. Add Depth', 'url' => ['vertical/create']];
$this->params['breadcrumbs'][] = '04. Add Files';

$this->params['wizard'][] = ['label' => '01. Add Project', 'url' => ['project/create']];
$this->params['wizard'][] = ['label' => '02. Add Overview', 'url' => ['overview/create']];
$this->params['wizard'][] = ['label' => '03. Add Depth', 'url' => ['vertical/create']];
$this->params['wizard'][] = ['label' => '04. Add Files', 'url' => ['file/create']];

?>

<div class="file-create">

    <?= $this->render('_form', [
        'model' => $model,
        'viewModel' => $viewModel,
        'project_id' => $project_id,
    ]) ?>

</div>
