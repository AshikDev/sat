<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Overview */

$this->title = 'Project';
$this->params['subTitle'] = 'Update File: ' . $project_name;

$this->params['breadcrumbs'][] = ['label' => '01. Update Project', 'url' => ['project/update?id=' . $project_id]];
$this->params['breadcrumbs'][] = ['label' => '02. Update Overview', 'url' => ['overview/edit?project_id=' . $project_id . '&project_name=' . $project_name]];
$this->params['breadcrumbs'][] = ['label' => '03. Update Depth', 'url' => ['vertical/edit?project_id=' . $project_id . '&project_name=' . $project_name]];
$this->params['breadcrumbs'][] = '04. ' . $this->params['subTitle'];

$this->params['wizard'][] = ['label' => '01. Update Project', 'url' => ['project/create?id=' . $project_id]];
$this->params['wizard'][] = ['label' => '02. Update Overview', 'url' => ['overview/edit?project_id=' . $project_id . '&project_name=' . $project_name]];
$this->params['wizard'][] = ['label' => '03. Update Depth', 'url' => ['depth/edit?project_id=' . $project_id . '&project_name=' . $project_name]];
$this->params['wizard'][] = ['label' => '04. ' . $this->params['subTitle'], 'url' => ['depth/edit?project_id=' . $project_id . '&project_name=' . $project_name]];

?>
<div class="overview-update">

    <?= $this->render('_form', [
        'model' => $model,
        'viewModel' => $viewModel,
        'project_id' => $project_id
    ]) ?>

</div>
