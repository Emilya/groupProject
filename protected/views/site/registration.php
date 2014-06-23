<?php
/**
 * @var RegistrationWidget $this
 */
$this->pageTitle=Yii::app()->name . ' - Регистрация';
$this->breadcrumbs=array(
    'Регистрация',
);
?>
<div class="dialog">
    <div class=" block blockReg">
        <p class="block-heading">Регистрация</p>
        <div class="block-body">

            <div class="forms">
                <? $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'login-form',
                    'enableAjaxValidation'=>false,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                        'validateOnChange'=>false,
                    ),
                    'htmlOptions'=>array(
                        'class'=>'sender_form',
                    ),
                )); ?>
<div class="row-fluid">
    <?php echo $form->labelEx($model,'name'); ?>
    <?php echo $form->textField($model,'name'); ?>
    <?php echo $form->error($model,'name'); ?>
</div>
<div class="row-fluid">
    <?php echo $form->labelEx($model,'surname'); ?>
    <?php echo $form->textField($model,'surname'); ?>
    <?php echo $form->error($model,'surname'); ?>
</div>
<div class="row-fluid">
    <?php echo $form->labelEx($model,'patronymic'); ?>
    <?php echo $form->textField($model,'patronymic'); ?>
    <?php echo $form->error($model,'patronymic'); ?>
</div>

<div class="row-fluid">
    <?php echo $form->labelEx($model,'password'); ?>
    <?php echo $form->passwordField($model,'password'); ?>
    <?php echo $form->error($model,'password'); ?>
</div>

<div class="row-fluid">
    <?php echo $form->labelEx($model,'email'); ?>
    <?php echo $form->textField($model,'email'); ?>
    <?php echo $form->error($model,'email'); ?>
</div>
<div class="row-fluid">
    <?php echo $form->labelEx($model,'role'); ?>
    <?php echo $form->textField($model,'role'); ?>
    <?php echo $form->error($model,'role'); ?>
</div>

<div class="row-fluid">
    <?php echo $form->labelEx($model,'phone'); ?>
    <?php echo $form->textField($model,'phone'); ?>
    <?php echo $form->error($model,'phone'); ?>
</div>
<div class="row-fluid">
    <?php echo $form->labelEx($model,'address'); ?>
    <?php echo $form->textField($model,'address'); ?>
    <?php echo $form->error($model,'address'); ?>
</div>
<div class="row-fluid">
    <?php echo $form->labelEx($model,'about'); ?>
    <?php echo $form->textArea($model,'about'); ?>
    <?php echo $form->error($model,'about'); ?>
</div>
<div class="clear"></div>

<div class="button-block">
    <div class="row buttons" id="loginButton">
        <?= CHtml::link('Вход',Yii::app()->createUrl('/site/login'),array('class'=>'btn btn-info pull-right')); ?>
        <?php echo CHtml::submitButton('Далее', array('class'=>'btn btn-primary pull-right')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
