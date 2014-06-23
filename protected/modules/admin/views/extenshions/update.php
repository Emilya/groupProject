<?php
/* @var $this ExtenshionsController */
/* @var $model Extenshions */

$this->breadcrumbs=array(
	'Extenshions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Extenshions', 'url'=>array('index')),
	array('label'=>'Create Extenshions', 'url'=>array('create')),
	array('label'=>'View Extenshions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Extenshions', 'url'=>array('admin')),
);
?>

<div class="contentUpdate">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="header">Редактирование этапа "<?= $model->name; ?>"</div>
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
    </div>
</div>