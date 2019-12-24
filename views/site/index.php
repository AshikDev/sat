<?php

/* @var $this yii\web\View */

$this->title = 'Dashboard';
?>

<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="<?= Yii::$app->request->baseUrl; ?>/site/project">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-code"></i></span>

                <div class="info-box-content">
                    <h4>Software View</h4>
                    <p>Are you programmer?</p>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-briefcase"></i></span>
                <div class="info-box-content">
                    <h4>Business View</h4>
                    <p>Interested in business?</p>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-pencil-square-o"></i></span>

                <div class="info-box-content">
                    <h4>Designer View</h4>
                    <p>Are you designer?</p>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-tablet"></i></span>

                <div class="info-box-content">
                    <h4>Media View</h4>
                    <p>Have a media background?</p>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="">
            <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fa fa-plus-circle"></i></span>

                <div class="info-box-content">
                    <h4>Create New View</h4>
                    <p>None of the above?</p>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>