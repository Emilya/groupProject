<?php
/* @var $this ExtenshionsController */
/* @var $model Extenshions */
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
            echo $form->labelEx($model,'level');
            echo $form->textField($model,'level',array('class'=>'input-xxlarge','maxlength'=>255));
            echo $form->error($model,'level');
            ?>
        </div>
        <div class='row'>
            <?php
            echo $form->labelEx($model,'content');
            echo $form->textField($model,'content',array('class'=>'input-xxlarge','maxlength'=>255, 'required' => true));
            echo $form->error($model,'content');
            ?>
        </div>

        <div class="row buttons">
            <?php echo TbHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>

        </div>

        <?php $this->endWidget(); ?>

    </div>
<?php
?>