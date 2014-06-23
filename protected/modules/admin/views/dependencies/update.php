<?php
/* @var $this DependenciesController */
/* @var $model Dependencies */

$this->breadcrumbs=array(
	'Dependencies'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dependencies', 'url'=>array('index')),
	array('label'=>'Create Dependencies', 'url'=>array('create')),
	array('label'=>'View Dependencies', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dependencies', 'url'=>array('admin')),
);
?>
<div class="contentUpdate">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="header">Редактирование составной части "<?= $model->name; ?>"</div>
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
    </div>
</div>