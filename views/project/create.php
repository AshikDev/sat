<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = 'Project';
$this->params['subTitle'] = 'Add Project';

$this->params['breadcrumbs'][] = '01. ' . $this->params['subTitle'];

$this->params['wizard'][] = ['label' => '01. ' . $this->params['subTitle'], 'url' => ['create']];
$this->params['wizard'][] = '02. Add Overview';
$this->params['wizard'][] = '03. Add Depth';
$this->params['wizard'][] = '04. Add Files';

?>
<div class="project-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
