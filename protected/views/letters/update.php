<?php
/* @var $this LettersController */
/* @var $model Letters */

$this->breadcrumbs=array(
	'Letters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Letters', 'url'=>array('index')),
	array('label'=>'Create Letters', 'url'=>array('create')),
	array('label'=>'View Letters', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Letters', 'url'=>array('admin')),
);
?>

<h1>Update Letters <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>