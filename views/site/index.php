<?php

/* @var $this yii\web\View */

$this->title = 'Dashboard';
?>

<div class="row">
    <?php
    foreach ($viewModels as $viewModel):
        ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="<?= Yii::$app->request->baseUrl; ?>/index.php/project/list?view_id=<?= $viewModel->id; ?>&icon=<?= $viewModel->icon; ?>">
                <div class="info-box">
                    <span class="info-box-icon bg-<?= $viewModel->color; ?>"><i class="fa <?= $viewModel->icon; ?>"></i></span>

                    <div class="info-box-content">
                        <h4><?= $viewModel->name; ?></h4>
                        <p><?= $viewModel->description; ?></p>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
    <?php
    endforeach;
    ?>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="<?= Yii::$app->request->baseUrl; ?>/index.php/background-view/create">
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