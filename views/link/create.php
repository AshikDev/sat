<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Link */

$this->title = 'Connected Views';
$this->params['subTitle'] = 'Connect the background views';

$this->params['breadcrumbs'][] = ['label' => 'List of connected views', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-create">

    <?= $this->render('_form', [
        'model' => $model,
        'viewModels' => $viewModels,
        'projectModels' => $projectModels
    ]) ?>

</div>
