<?php
/* @var $this LettersController */
/* @var $model Letters */

$this->breadcrumbs=array(
	'Letters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Letters', 'url'=>array('index')),
	array('label'=>'Create Letters', 'url'=>array('create')),
	array('label'=>'Update Letters', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Letters', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Letters', 'url'=>array('admin')),
);
?>

<h1>View Letters #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sender',
		'reciver',
		'subject',
		'message',
	),
)); ?>
