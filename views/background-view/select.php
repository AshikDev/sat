<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Overview */

$this->title = 'Project';
$this->params['breadcrumbs'][] = ['label' => 'Add Project', 'url' => ['project/create']];
$this->params['breadcrumbs'][] = 'Add Overview';

$this->params['wizard'][] = ['label' => '01. Add Project', 'url' => ['project/create']];
$this->params['wizard'][] = ['label' => '02. Add Overview', 'url' => ['overview/create'], 'id' => $project_id];
$this->params['wizard'][] = ['label' => '03. Add View', 'url' => ['create']];
$this->params['wizard'][] = '04. Add Phase';
$this->params['wizard'][] = '05. Add Depth';
$this->params['wizard'][] = '06. Add Files';

?>
<div class="background-view-create">

    <?= $this->render('_select', [
        'model' => $model,
    ]) ?>

</div>
