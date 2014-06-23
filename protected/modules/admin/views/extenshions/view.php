<?php
/* @var $this ExtenshionsController */
/* @var $model Extenshions */

$this->breadcrumbs=array(
	'Extenshions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Extenshions', 'url'=>array('index')),
	array('label'=>'Create Extenshions', 'url'=>array('create')),
	array('label'=>'Update Extenshions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Extenshions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Extenshions', 'url'=>array('admin')),
);
?>

<h1>View Extenshions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'level',
		'content',
	),
)); ?>
