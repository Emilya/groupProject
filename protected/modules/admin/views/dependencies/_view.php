<?php
/* @var $this DependenciesController */
/* @var $data Dependencies */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parts')); ?>:</b>
	<?php echo CHtml::encode($data->parts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users')); ?>:</b>
	<?php echo CHtml::encode($data->users); ?>
	<br />


</div>