<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BackgroundView */

$this->title = 'View Name: ' . $model->name;
$this->params['subTitle'] = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'View List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="background-view-update">

    <?= $this->render('_form', [
        'model' => $model,
        'colorModel' => $colorModel
    ]) ?>

</div>
