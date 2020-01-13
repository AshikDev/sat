<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Overview */

$this->title = 'Project';
$this->params['subTitle'] = 'Update  Overview: ' . $project_name;

$this->params['breadcrumbs'][] = ['label' => '01. Update Project', 'url' => ['project/create?id=' . $project_id]];
$this->params['breadcrumbs'][] = '02. ' . $this->params['subTitle'];

$this->params['wizard'][] = ['label' => '01. Update Project', 'url' => ['project/create?id=' . $project_id]];
$this->params['wizard'][] = ['label' => '02. ' . $this->params['subTitle'], 'url' => ['overview/edit?project_id=' . $project_id . '&project_name=' . $project_name]];
$this->params['wizard'][] = '03. Update Depth';
$this->params['wizard'][] = '04. Update Files';

?>
<div class="overview-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
