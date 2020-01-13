<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Overview */

$this->title = 'Overview';
$this->params['subTitle'] = 'Update Overview: ' . $model->title;

$this->params['breadcrumbs'][] = ['label' => 'List of Overview', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="overview-update">

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
