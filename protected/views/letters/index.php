<?php
/* @var $this LettersController */
/* @var $dataProvider CActiveDataProvider */

 ?>

<div class="content">

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="btn-toolbar">
                <button class="btn btn-primary newFile"><i class="icon-plus"></i>  <?=CHtml::link('Новое', $this->createUrl('/letters/create'));?></button>
                <div class="btn-group">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="well">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'dataProvider' => $dataProvider,

        'columns' => array(
            array(
                'name' => 'sender',
                'header' => 'Отправитель',
                'htmlOptions' => array('color' =>'width: 20px'),
            ),

            array(
                'name' => 'subject',
                'header' => 'Тема',
            ),
            array(
                'name' => 'message',
                'header' => 'Сообщение',
            ),
        ),
    )); ?>

</div>
