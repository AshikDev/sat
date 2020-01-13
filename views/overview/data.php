<?php

$this->title = '';

$this->params['breadcrumbs'][] = ['label' => 'Select View', 'url' => ['site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['project/list?view_id=' . $view_id]];
$this->params['breadcrumbs'][] = $projectModel->name;

$i = 0;
$verticalArray = [];

$verticalColumn['name'] = [];
$verticalColumn['short_description'] = [];
?>

<div class="row" style="padding-top: 20px; text-align: justify">
    <div class="col-md-12">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-primary">
                <div class="widget-user-image">
                    <img class="img-circle" src="<?= Yii::$app->request->baseUrl; ?>/img/<?= $projectModel->logo; ?>"
                         alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?= $projectModel->name; ?></h3>
                <h5 class="widget-user-desc">From <?= date('Y', strtotime($projectModel->date_from)); ?>
                    to <?= date('Y', strtotime($projectModel->date_to)); ?> </h5>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#overview" data-toggle="tab" aria-expanded="true">Project
                                    Overview</a></li>
                            <?php
                            foreach ($horizontalModel as $horizontal):
                                ?>
                                <li class=""><a href="#<?= str_replace(' ', '', $horizontal->name); ?>"
                                                data-toggle="tab" aria-expanded="false"><?= $horizontal->name; ?></a>
                                </li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="overview">
                                <div class="row">
                                    <div class="col-md-8">
                                        <!-- Post -->
                                        <?php
                                        foreach ($model as $overview):
                                            ?>
                                            <div class="post <?= ($i === 0) ? '' : 'clearfix'; ?>">
                                                <h3 id="<?= str_replace(' ', '', $overview->title); ?>-po"><?= $overview->title; ?></h3>
                                                <div>
                                                    <?= $overview->paragraph; ?>
                                                </div>
                                            </div>
                                            <?php
                                            $i++;
                                        endforeach;
                                        ?>

                                    </div>
                                    <div class="col-md-4">
                                        <ul class="timeline timeline-inverse">
                                            <?php
                                            $i = 0;
                                            $count = count($model);
                                            foreach ($model as $overview):
                                                ?>
                                                <!-- timeline item -->
                                                <li>
                                                    <i class="fa <?= (++$i == $count) ? 'fa-arrow-right' : 'fa-arrow-down '; ?> bg-blue"></i>

                                                    <div class="timeline-item">

                                                        <h3 class="timeline-header"><a
                                                                    href="#<?= str_replace(' ', '', $overview->title); ?>-po"><?= $overview->title; ?></a>
                                                        </h3>

                                                        <div class="timeline-body">
                                                            <?= substr($overview->paragraph, 0, 70); ?>....
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- END timeline item -->
                                            <?php
                                            endforeach;
                                            ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                            foreach ($horizontalModel as $horizontal):
                                ?>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="<?= str_replace(' ', '', $horizontal->name); ?>">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                            $x = 0;
                                            foreach ($verticalModel as $vertical):
                                                ?>
                                                <!-- Post -->
                                                <div class="post clearfix">
                                                    <?php
                                                    if ($vertical->horizontal_id == $horizontal->id):
                                                        $verticalArray['name'][$x] = $vertical->name;
                                                        $verticalArray['short_description'][$x] = substr($vertical->description, 0, 70);
                                                        $x++;
                                                        ?>
                                                        <h3><?= $vertical->name; ?></h3>
                                                        <p>
                                                            <?= $vertical->description; ?>
                                                        </p>
                                                    <?php
                                                    endif;
                                                    ?>
                                                    <div class="row">
                                                        <?php
                                                        foreach ($fileModel as $file):
                                                            if ($file->horizontal_id == $horizontal->id):
                                                                if ($file->vertical_id == $vertical->id):
                                                                    ?>
                                                                    <div class="col-md-4">
                                                                        <div class="info-box bg-aqua">
                                                                        <span class="info-box-icon">
                                                                            <i class="fa <?= $file->icon; ?>"></i>
                                                                        </span>
                                                                            <div class="info-box-content">
                                                                                <span class="info-box-text"><?= $file->title; ?></span>
                                                                                <span class="info-box-number"><?= $file->subtitle; ?></span>

                                                                                <div class="progress">
                                                                                    <div class="progress-bar"
                                                                                         style="width: <?= number_format($file->estimate_time, 0); ?>%"></div>
                                                                                </div>
                                                                                <span class="progress-description">
                                                                                    <?= $file->estimate_time; ?> Min
                                                                                </span>
                                                                            </div>
                                                                            <!-- /.info-box-content -->
                                                                        </div>
                                                                    </div>
                                                                <?php
                                                                endif;
                                                            endif;
                                                        endforeach;
                                                        ?>
                                                    </div>
                                                </div>
                                                <!-- /.post -->
                                            <?php
                                            endforeach;
                                            ?>

                                        </div>
                                        <div class="col-md-4">
                                            <ul class="timeline timeline-inverse">

                                                <?php
                                                if (isset($verticalArray) && !empty($verticalArray)) :
                                                    $limit = count($verticalArray['name']);
                                                    $a = 0;
                                                    for ($i = 0; $i < $limit; $i++) :
                                                        ?>
                                                        <!-- timeline item -->
                                                        <li>
                                                            <i class="fa <?= (++$a == $limit) ? 'fa-arrow-right' : 'fa-arrow-down '; ?>  bg-blue"></i>

                                                            <div class="timeline-item">

                                                                <h3 class="timeline-header">
                                                                    <a href="#">
                                                                        <?= $verticalArray['name'][$i]; ?>
                                                                    </a>
                                                                </h3>

                                                                <div class="timeline-body">
                                                                    <?= $verticalArray['short_description'][$i]; ?>....
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <!-- END timeline item -->
                                                    <?php
                                                    endfor;
                                                endif;
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                            ?>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="settings">
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>

            </div>
        </div>
        <!-- /.widget-user -->
    </div>
</div>

<style>
    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        /* left: 15px; */
        /* right: 38px; */
        height: 90px;
        width: 240px;
        opacity: 0;
        transition: .5s ease;
        background-color: #000000;
        /* padding: 5px 5px; */
    }

    .overlay-item:hover .overlay {
        opacity: 1;
    }

    .text {
        color: white;
        font-size: 14px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
    }

    html {
        scroll-behavior: smooth;
    }
</style>