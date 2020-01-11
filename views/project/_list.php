<div class="row">
    <div class="col-md-12">
        <!-- Box Comment -->
        <div class="box box-widget">
            <div class="box-header with-border">
                <div class="user-block">
                    <img class="img-circle" src="<?= Yii::$app->request->baseUrl; ?>/img/<?= $model->logo; ?>" alt="User Image">
                    <span class="username"><a href="<?= Yii::$app->request->baseUrl; ?>/overview/data?view_id=<?= $_GET['view_id'] . '&project_id=' . $model->id; ?>"><?= $model->name; ?></a></span>
                    <span class="description">From <?= date('Y', strtotime($model->date_from)); ?> to <?= date('Y', strtotime($model->date_to)); ?></span>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec convallis odio. Sed vitae ligula in ipsum iaculis cursus. Fusce fermentum risus in tincidunt iaculis. In accumsan aliquam mi lacinia tincidunt. Nunc eu lacus tincidunt, cursus urna quis, pharetra sem. Morbi euismod elementum diam, ut auctor sem feugiat id. Integer dictum sollicitudin odio, id bibendum sem vehicula sit amet. Donec ut quam nulla. Duis auctor justo sapien, eu viverra est porta at.
                </p>
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>



