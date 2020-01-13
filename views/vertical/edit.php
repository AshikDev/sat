<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Overview */

$this->title = 'Project';
$this->params['subTitle'] = 'Update Depth: ' . $project_name;

$this->params['breadcrumbs'][] = ['label' => '01. Update Project', 'url' => ['project/update?id=' . $project_id]];
$this->params['breadcrumbs'][] = ['label' => '02. Update Overview', 'url' => ['overview/edit?project_id=' . $project_id . '&project_name=' . $project_name]];
$this->params['breadcrumbs'][] = '03. ' . $this->params['subTitle'];

$this->params['wizard'][] = ['label' => '01. Update Project', 'url' => ['project/create?id=' . $project_id]];
$this->params['wizard'][] = ['label' => '02. Update Overview', 'url' => ['overview/edit?project_id=' . $project_id . '&project_name=' . $project_name]];
$this->params['wizard'][] = ['label' => '03. ' . $this->params['subTitle'], 'url' => ['vertical/edit?project_id=' . $project_id . '&project_name=' . $project_name]];
$this->params['wizard'][] = '04. Update Files';

?>
<div class="overview-update">

    <?= $this->render('_form', [
        'model' => $model,
        'viewModel' => $viewModel
    ]) ?>

</div>
