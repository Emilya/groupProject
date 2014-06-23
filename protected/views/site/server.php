<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

?>
<div class="content">

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="btn-toolbar">
                <button class="btn btn-primary newFile"><i class="icon-plus"></i>  <?=CHtml::link('Загрузить', $this->createUrl('/site/upload'));?></button>

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
                'name' => 'name',
                'header' => 'Файл',
                'htmlOptions' => array('color' =>'width: 60px'),
            ),

            array(
                'name' => 'user_name',
                'header' => 'Пользователь',
            ),
            array(
                'name' => 'size',
                'header' => 'Размер файла, байт',
            ),
            array(
                'name' => 'level',
                'header' => 'Этап разработки',
                'value'=>'Formatter::formatLevel($data->level)',
            ),
        ),
    )); ?>

</div>