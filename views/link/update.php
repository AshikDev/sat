<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Link */

$this->title = 'Connected Views';
$this->params['subTitle'] = 'Update the connected views';

$this->params['breadcrumbs'][] = ['label' => 'List of connected views', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title
?>
<div class="link-update">

    <?= $this->render('_form', [
        'model' => $model,
        'viewModels' => $viewModels,
        'projectModels' => $projectModels
    ]) ?>

</div>
