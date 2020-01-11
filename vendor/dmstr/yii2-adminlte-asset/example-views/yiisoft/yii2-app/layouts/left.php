<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Administration', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Content',
                        'icon' => 'file',
                        'url' => ['#'],
                        'items' => [
                            [
                                'label' => 'Create New',
                                'icon' => 'plus',
                                'url' => ['/content/create'],
                            ],
                            [
                                'label' => 'Content List',
                                'icon' => 'list',
                                'url' => ['/content/index'],
                            ]
                        ]
                    ],
                    [
                        'label' => 'View',
                        'icon' => 'eye',
                        'url' => ['#'],
                        'items' => [
                            [
                                'label' => 'Create New',
                                'icon' => 'plus',
                                'url' => ['/background-view/create'],
                            ],
                            [
                                'label' => 'View List',
                                'icon' => 'list',
                                'url' => ['/background-view/index'],
                            ]
                        ]
                    ],
                    [
                        'label' => 'Phase',
                        'icon' => 'align-justify',
                        'url' => ['#'],
                        'items' => [
                            [
                                'label' => 'Create New',
                                'icon' => 'plus',
                                'url' => ['/horizontal/create'],
                            ],
                            [
                                'label' => 'Phase List',
                                'icon' => 'list',
                                'url' => ['/horizontal/index'],
                            ]
                        ]
                    ],
                    [
                        'label' => 'Depth',
                        'icon' => 'cubes',
                        'url' => ['#'],
                        'items' => [
                            [
                                'label' => 'Create New',
                                'icon' => 'plus',
                                'url' => ['/vertical/create'],
                            ],
                            [
                                'label' => 'Depth List',
                                'icon' => 'list',
                                'url' => ['/vertical/index'],
                            ]
                        ]
                    ],
                    ['label' => 'User Panel', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Project',
                        'icon' => 'product-hunt',
                        'url' => ['#'],
                        'items' => [
                            [
                                'label' => 'Create New',
                                'icon' => 'plus',
                                'url' => ['/project/create'],
                            ],
                            [
                                'label' => 'Project List',
                                'icon' => 'list',
                                'url' => ['/project/index'],
                            ]
                        ]
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>