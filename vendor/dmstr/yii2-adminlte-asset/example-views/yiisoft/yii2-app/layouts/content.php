<?php

use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h1><?= $this->blocks['content-header'] ?></h1>
        <?php } else { ?>
            <h1>
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
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
                    <li class="bg-navy">
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-code bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Software View</h4>
                                <p>Are you programmer?</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-briefcase bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Business View</h4>
                                <p>Interested in business?</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-pencil-square-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Desinger View</h4>
                                <p>Are you designer?</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-tablet bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Media View</h4>
                                <p>Have a media background?</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-plus-circle bg-purple"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Create a New View</h4>
                                <p>None of the above?</p>
                            </div>
                        </a>
                    </li>
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