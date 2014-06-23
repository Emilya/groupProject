<?php
$this->pageTitle=Yii::app()->name . ' - Вход';
$this->breadcrumbs=array(
	'Вход',
);
?>
<div class="dialog">
    <div class="block">
        <p class="block-heading">Вход</p>
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
                    <?=$form->labelEx($model,'Email'); ?>
                    <?=$form->textField($model,'username',array("class"=>"span12")); ?>
                    <?=$form->error($model,'username'); ?>
                </div>

                <div class="row-fluid">
                    <?=$form->labelEx($model,'Пароль'); ?>
                    <?=$form->passwordField($model,'password',array("class"=>"span12")); ?>
                    <?=$form->error($model,'password'); ?>
                </div>
                <div class="login-block">
                    <div class="row-fluid rememberMe">
                        <?=$form->checkBox($model,'rememberMe'); ?>
                        <?=$form->label($model,'запомнить меня'); ?>
                        <?=$form->error($model,'rememberMe'); ?>
                    </div>
                    <div id="loginButton">
                        <?= CHtml::link('Регистрация',Yii::app()->createUrl('/site/registration'),array('class'=>'btn btn-info pull-right')); ?>
                        <?= CHtml::submitButton('Войти',array('class'=>'btn btn-primary pull-right')); ?>
                    </div>

                </div>

            <?php $this->endWidget(); ?>
            </div><!-- form -->
        </div>
    </div>
</div>
