<?php

use kartik\select2\Select2;

$this->title = 'Projects';
$this->params['breadcrumbs'][] = 'Select View';
$this->params['breadcrumbs'][] = $this->title;

$data = ['Engineering', 'Computer Science', 'Psychology', 'Well-being', 'Economy', 'Biology', 'Medicine'];
$data2 = ['Latest', 'Oldest', 'Least Reading Time', 'Most Reading Time'];

?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" class="form-control", placeholder="Search">
                        <div class="input-group-addon">
                            <i class="fa fa-search"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <?php

                        // Multiple select without model
                        echo Select2::widget([
                            'name' => 'research',
                            'data' => $data,
                            'options' => ['multiple' => true, 'placeholder' => 'Field of research'],
                        ]);

                        ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <?php

                        // Multiple select without model
                        echo Select2::widget([
                            'name' => 'sort',
                            'data' => $data2,
                            'options' => ['placeholder' => 'Sort by'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);

                        ?>
                    </div>
                </div>

                <div class="box-tools pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default"><i class="fa fa-list-ul"></i></button>
                        <button type="button" class="btn btn-default"><i class="fa fa-th"></i></button>
                    </div>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Box Comment -->
                        <div class="box box-widget">
                            <div class="box-header with-border">
                                <div class="user-block">
                                    <img class="img-circle" src="<?= Yii::$app->request->baseUrl; ?>/img/cog.png" alt="User Image">
                                    <span class="username"><a href="#">Congnitive Village</a></span>
                                    <span class="description">From 2010 to 2015</span>
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
                <div class="row">
                    <div class="col-md-12">
                        <!-- Box Comment -->
                        <div class="box box-widget">
                            <div class="box-header with-border">
                                <div class="user-block">
                                    <img class="img-circle" src="<?= Yii::$app->request->baseUrl; ?>/img/istop.jpg" alt="User Image">
                                    <span class="username"><a href="<?= Yii::$app->request->baseUrl; ?>/site/data">iStopFall</a></span>
                                    <span class="description">From 2008 to 2012</span>
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
                <div class="row">
                    <div class="col-md-12">
                        <!-- Box Comment -->
                        <div class="box box-widget">
                            <div class="box-header with-border">
                                <div class="user-block">
                                    <img class="img-circle" src="<?= Yii::$app->request->baseUrl; ?>/img/kontikat.png" alt="User Image">
                                    <span class="username"><a href="#">KontiKat</a></span>
                                    <span class="description">From 2008 to 2012</span>
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
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
