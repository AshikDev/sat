<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BackgroundView */

$this->title = 'View';
$this->params['subTitle'] = 'Create New';

$this->params['breadcrumbs'][] = ['label' => 'Background Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="background-view-create">

    <?= $this->render('_form', [
        'model' => $model,
        'colorModel' => $colorModel
    ]) ?>

</div>
