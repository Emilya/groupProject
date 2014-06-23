<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>
    <div class="form well">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'updateUser_form',
            'htmlOptions'=>array('enctype'=>'multipart/form-data'),
            'enableAjaxValidation'=>false,
        )); ?>


        <?php// echo $form->errorSummary($model); ?>
        <div class='row'>
            <?php
            if (isset($model->photo) && !empty($model->photo))
            {
                echo CHtml::image($model->getImage());
            }
            ?>
        </div>

        <div class='row'>
            <?php
            echo $form->labelEx($model,'photo');
            echo $form->fileField($model,'photo');
            echo $form->error($model,'photo');
            ?>
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
            echo $form->labelEx($model,'email');
            echo $form->textField($model,'email',array('class'=>'input-xxlarge','maxlength'=>255));
            echo $form->error($model,'email');
            ?>
        </div>
        <div class='row'>
            <?php
            echo $form->labelEx($model,'role');
            echo $form->textField($model,'role',array('class'=>'input-xxlarge','maxlength'=>255, 'required' => true));
            echo $form->error($model,'role');
            ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->textField($model,'password',array('class'=>'input-xxlarge','maxlength'=>255, 'required' => true)); ?>
            <?php echo $form->error($model,'password', array('class'=>'alert alert-error in fade')); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'profession'); ?>
            <?php echo $form->textArea($model,'profession',array('class'=>'input-xxlarge','rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'profession', array('class'=>'alert alert-error in fade')); ?>
        </div>

        <div class="row buttons">
            <?php echo TbHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>

        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
<?php
/*// подключаем текстовый редактор
$this->widget('text.extensions.elrte.elRTE', array(
    'selector'=>get_class($model).'_text',
    'toolbar'=>'maxi',
    'lang' => 'ru',
));
*/?>