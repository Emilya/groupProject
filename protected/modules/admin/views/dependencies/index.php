<?php
/* @var $this DependenciesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dependencies',
);

$this->menu=array(
	array('label'=>'Create Dependencies', 'url'=>array('create')),
	array('label'=>'Manage Dependencies', 'url'=>array('admin')),
);
?>

<div class="content">

    <ul class="breadcrumb">
        <li><a href="index.html">Главная</a> <span class="divider">/</span></li>
        <li class="active">Зависимости</li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="btn-toolbar">
                <button class="btn btn-primary newUser"><i class="icon-plus"></i>  <?=CHtml::link('Добавить позицию', $this->createUrl('/admin/dependencies/create'));?></button>
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
                'name' => 'name',
                'header' => 'Название',
            ),
            array(
                'name' => 'description',
                'header' => 'Описание',
            ),
            array(
                'name' => 'parts',
                'header' => 'Составные части',
            ),
            array(
                'name' => 'users',
                'header' => 'Исполнитель',
                'value'=>'$data->performer->name',
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{update} {delete}',
            ),
        ),
    )); ?>
</div>