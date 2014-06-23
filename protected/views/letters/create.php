<?php
/* @var $this LettersController */
/* @var $model Letters */

$this->breadcrumbs=array(
	'Letters'=>array('index'),
	'Create',
);

?>

<div class="form well">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'editUser_form',
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
        'enableAjaxValidation'=>false,
    )); ?>
    <div class="row">
        <?php echo $form->labelEx($model,'reciver');
        echo $form->dropDownList($model,'reciver',
        CHtml::listData(User::model()->findAll(), 'id', 'name'),
        array('prompt' => 'Выбрать из списка','class'=>'input-xxlarge','maxlength'=>255, 'required' => true)); ?>
    </div>
    <div class='row'>
        <?php
        echo $form->labelEx($model,'subject');
        echo $form->textField($model,'subject',array('class'=>'input-xxlarge','maxlength'=>255));
        echo $form->error($model,'subject');
        ?>
    </div>
    <div class='row'>
        <?php
        echo $form->labelEx($model,'message');
        echo $form->textArea($model,'message',array('class'=>'input-xxlarge','rows'=>6, 'cols'=>50));
        echo $form->error($model,'message');
        ?>
    </div>

    <div class="row buttons">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>

    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->