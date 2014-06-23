<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<div class="contentUpdate">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="header">Добавление пользователя</div>
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
    </div>
</div>