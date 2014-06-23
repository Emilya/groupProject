<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>
<div class="content">

    <ul class="breadcrumb">
        <li><a href="index.html">Home</a> <span class="divider">/</span></li>
        <li class="active">Users</li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="btn-toolbar">
                <button class="btn btn-primary newUser"><i class="icon-plus"></i>  <?=CHtml::link('Новый участник', $this->createUrl('/admin/user/create'));?></button>
                <div class="btn-group">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="well">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'dataProvider' => $dataProvider,

        'columns' => array(
            array(
                'name' => 'id',
                'header' => '#',
                'htmlOptions' => array('color' =>'width: 60px'),
            ),

            array(
                'name' => 'surname',
                'header' => 'Фамилия',
            ),
            array(
                'name' => 'name',
                'header' => 'Имя',
            ),
            array(
                'name' => 'role',
                'header' => 'Роль',
            ),
            array(
                'name' => 'email',
                'header' => 'Еmail',
            ),
            array(
                'name' => 'password',
                'header' => 'Пароль',
            ),
            array(
                'name' => 'profession',
                'header' => 'Задание',
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{update} {delete}',
            ),
        ),
    )); ?>
<!--    --><?php /*$this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    )); */?>
</div>