<?php

use app\models\BackgroundView;
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

$viewModelAll = BackgroundView::find()->all();

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h1><?= $this->blocks['content-header'] ?></h1>
        <?php } else { ?>
            <h1>
                <?php
                if ($this->title !== null) {
                    if(Yii::$app->controller->id != 'overview' || Yii::$app->controller->action->id != 'data') {
                        echo \yii\helpers\Html::encode($this->title);
                    }
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                        \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                } ?>
            </h1>
        <?php } ?>

        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; <?= date('Y', time()); ?> <a
                href="<?= \yii\helpers\Url::base(true); ?>"><?= Yii::$app->name; ?></a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Tab panes -->
    <div class="tab-content">
        <div id="control-sidebar-theme-demo-options-tab" class="tab-pane active">
            <div>
                <h3 class="control-sidebar-heading">Select a view</h3>
                <ul class="control-sidebar-menu">
                    <?php
                    foreach ($viewModelAll as $view) :
                    ?>
                        <li class="<?= (Yii::$app->session->has('view_id') && Yii::$app->session->get('view_id') == $view->id) ? 'bg-navy' : ''; ?>">
                            <?php
                            if(Yii::$app->controller->id == 'overview' && Yii::$app->controller->action->id == 'data') {
                                $viewUrl = Yii::$app->request->baseUrl . '/overview/data?view_id=' . $view->id . '&project_id=' . Yii::$app->request->get('project_id') . '&icon=' . $view->icon;
                            } else {
                                $viewUrl = Yii::$app->request->baseUrl . '/project/list?view_id=' . $view->id . '&icon=' . $view->icon;
                            }
                            ?>
                            <a href="<?= $viewUrl; ?>">
                                <i class="menu-icon fa <?= $view->icon; ?> bg-<?= $view->color; ?>"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading"><?= $view->name; ?></h4>
                                    <p><?= $view->description; ?></p>
                                </div>
                            </a>
                        </li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->

    </div>
</aside>
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>