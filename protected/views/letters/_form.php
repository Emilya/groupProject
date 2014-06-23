<?php
/* @var $this LettersController */
/* @var $model Letters */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'letters-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sender'); ?>
		<?php echo $form->textField($model,'sender',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reciver'); ?>
		<?php echo $form->textField($model,'reciver',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'reciver'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textArea($model,'subject',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->