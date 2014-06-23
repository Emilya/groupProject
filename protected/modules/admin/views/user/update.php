<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>
<div class="contentUpdate">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="header">Редактирование пользователя "<?= $model->surname.' '.$model->name; ?>"</div>
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
    </div>
</div>

