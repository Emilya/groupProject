<?php
/* @var $this DependenciesController */
/* @var $model Dependencies */
/* @var $form CActiveForm */
?>

<div class="form well">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'updateUser_form',
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
        'enableAjaxValidation'=>false,
    )); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('class'=>'input-xxlarge','maxlength'=>255, 'required' => true)); ?>
        <?php echo $form->error($model,'name', array('class'=>'alert alert-error in fade')); ?>
    </div>
    <div class='row'>
        <?php
        echo $form->labelEx($model,'description');
        echo $form->textField($model,'description',array('class'=>'input-xxlarge','maxlength'=>255));
        echo $form->error($model,'description');
        ?>
    </div>
    <div class='row'>
        <?php
        echo $form->labelEx($model,'parts');
        echo $form->checkBoxList($model, 'parts', CHtml::listData(Dependencies::model()->findAll(), 'id', 'name'),
            array('class'=>'input-xxlarge displayParts','maxlength'=>255));  ?>

    </div>
    <div class='row'>
        <?php
        echo $form->labelEx($model,'user');
        echo $form->dropDownList($model,'user',
            CHtml::listData(User::model()->findAll(), 'id', 'name'),
            array('prompt' => 'Выбрать из списка','class'=>'input-xxlarge','maxlength'=>255, 'required' => true));  ?>

    </div>

    <div class="row buttons">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>

    </div>

    <?php $this->endWidget(); ?>

</div>

