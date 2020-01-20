<?php

$this->title = $projectModel->name;

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


                                                <?php
                                                if(!empty($overview->extra)) :
                                                ?>
                                                <div class="row" id="<?= str_replace(' ', '', $overview->title); ?>-po">
                                                    <a href="<?= Yii::$app->request->baseUrl; ?>/overview/download?file_name=<?= $overview->extra; ?>">
                                                        <div class="col-md-12" data-toggle="popover"
                                                             title="Metadata"
                                                             data-content="<?= $overview->title ?>">
                                                            <div class="info-box bg-aqua">
                                                                                <span class="info-box-icon">
                                                                                    <i class="fa fa-file"></i>
                                                                                </span>
                                                                <div class="info-box-content">
                                                                                    <span class="info-box-text"
                                                                                          style="font-size: 15px;"><?= $overview->title ?></span>
                                                                    <span class="info-box-text"
                                                                          style="font-weight: bold; font-size: 15px; text-transform: none;"><?= $overview->paragraph ?></span>
                                                                </div>
                                                                <!-- /.info-box-content -->
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php
                                                else:
                                                ?>
                                                <h3 id="<?= str_replace(' ', '', $overview->title); ?>-po"><?= $overview->title; ?></h3>
                                                <div>
                                                    <?= $overview->paragraph; ?>
                                                </div>
                                                <?php
                                                endif;
                                                ?>
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
                                                    <i class="fa <?= ($i++ == 0) ? 'bg-red' : 'bg-blue'; ?> "></i>

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
                                            $verticalArray = [];
                                            foreach ($verticalModel as $vertical):
                                                if ($vertical->horizontal_id == $horizontal->id):
                                                    $verticalArray['id'][$x] = $vertical->id;
                                                    $verticalArray['name'][$x] = $vertical->name;
                                                    $verticalArray['name_solid'][$x] = str_replace(' ', '',$vertical->name);
                                                    $verticalArray['short_description'][$x] = substr($vertical->description, 0, 70);
                                                    $x++;
                                                    ?>
                                                    <!-- Post -->
                                                    <div class="post <?= ($x == 1) ? '' : 'clearfix'; ?>">
                                                        <h3 id="<?= str_replace(' ', '', $vertical->name); ?>-<?= $vertical->id ?>"><?= $vertical->name; ?></h3>
                                                        <p>
                                                            <?= $vertical->description; ?>
                                                        </p>
                                                        <div class="row">
                                                            <?php
                                                            foreach ($fileModel as $file):
                                                                if ($file->horizontal_id == $horizontal->id):
                                                                    if ($file->vertical_id == $vertical->id):
                                                                        ?>
                                                                        <a href="<?= Yii::$app->request->baseUrl; ?>/overview/download?file_name=<?= $file->name; ?>">
                                                                            <div class="col-md-6" data-toggle="popover"
                                                                                 title="Metadata"
                                                                                 data-content="<?= $file->metadata ?>">
                                                                                <div class="info-box bg-aqua">
                                                                                <span class="info-box-icon">
                                                                                    <i class="fa <?= $file->icon; ?>"></i>
                                                                                </span>
                                                                                    <div class="info-box-content">
                                                                                    <span class="info-box-text"
                                                                                          style="font-size: 12px;"><?= $file->title; ?></span>
                                                                                        <span class="info-box-text"
                                                                                              style="font-weight: bold; font-size: 12px; text-transform: capitalize;"><?= $file->subtitle; ?></span>

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
                                                                        </a>
                                                                    <?php
                                                                    endif;
                                                                endif;
                                                            endforeach;
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <!-- /.post -->
                                                <?php
                                                endif;
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
                                                            <i class="fa <?= ($a++ == 0) ? 'bg-red' : 'bg-blue'; ?> "></i>

                                                            <div class="timeline-item">

                                                                <h3 class="timeline-header">
                                                                    <a href="#<?= $verticalArray['name_solid'][$i] ?>-<?= $verticalArray['id'][$i]; ?>">
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
    html {
        scroll-behavior: smooth;
    }
</style>

<?php

$this->registerJs("
    $('[data-toggle=\"popover\"]').popover({
        placement : 'top',
        trigger : 'hover'
    });
    
", \yii\web\View::POS_READY);

?>

<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>