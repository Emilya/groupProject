<?php
/* @var $this SiteController */
/* @var $model Files */
/* @var $form CActiveForm */
?>
    <div class="form well">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'file_form',
            'htmlOptions'=>array('enctype'=>'multipart/form-data'),
            'enableAjaxValidation'=>false,
        )); ?>


        <div class='row fileUpload'>
            <?php
            echo $form->labelEx($model,'name');
            echo $form->dropDownList($model,'name',
                CHtml::listData(Dependencies::model()->findAll(), 'id', 'name'),
                array('prompt' => 'Выбрать из списка','class'=>'input-xxlarge','maxlength'=>255, 'required' => true));  ?>

        </div>

        <div class="row buttons fileUpload">
            <?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>

        </div>

        <?php $this->endWidget(); ?>
