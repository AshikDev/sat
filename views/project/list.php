<?php

use kartik\select2\Select2;
use yii\widgets\ListView;

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
                        <input type="text" class="form-control" , placeholder="Search">
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

                <?php

                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_list',
                ]);

                ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
