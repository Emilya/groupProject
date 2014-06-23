<?php
/* @var $this SiteController */
/* @var $model User */
/* @var $form CActiveForm */

?>

<div class="form well">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'editUser_form',
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
        'enableAjaxValidation'=>false,
    )); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'photo'); ?>
        <?php echo $form->fileField($model,'photo'); ?>
        <?php echo $form->error($model,'photo', array('class'=>'alert alert-error in fade')); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('class'=>'input-xxlarge','maxlength'=>255, 'required' => true)); ?>
        <?php echo $form->error($model,'name', array('class'=>'alert alert-error in fade')); ?>
    </div>
    <div class='row'>
        <?php
        echo $form->labelEx($model,'surname');
        echo $form->textField($model,'surname',array('class'=>'input-xxlarge','maxlength'=>255));
        echo $form->error($model,'surname');
        ?>
    </div>
    <div class='row'>
        <?php
        echo $form->labelEx($model,'role');
        echo $form->textField($model,'role',array('class'=>'input-xxlarge','maxlength'=>255, 'required' => true));
        echo $form->error($model,'role');
        ?>
    </div>
    <div class='row'>
        <?php
        echo $form->labelEx($model,'email');
        echo $form->textField($model,'email',array('class'=>'input-xxlarge','maxlength'=>255));
        echo $form->error($model,'email');
        ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'phone'); ?>
        <?php echo $form->textField($model,'phone',array('class'=>'input-xxlarge','maxlength'=>255, 'required' => true)); ?>
        <?php echo $form->error($model,'phone', array('class'=>'alert alert-error in fade')); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'address'); ?>
        <?php echo $form->textArea($model,'address',array('class'=>'input-xxlarge','rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'address', array('class'=>'alert alert-error in fade')); ?>
    </div>

    <div class="row buttons">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>

    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
