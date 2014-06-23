<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

?>
<div class="well">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'dataProvider' => $dataProvider,

        'columns' => array(
            array(
                'name' => 'photo',
                'header' => 'Фотография',
                'type'=>'html',
                'value' => 'CHtml::image("/../upload/avatar/".$data->photo)',
                'htmlOptions'=>array('style'=>'width: 170px'),
            ),

            array(
                'name' => 'name',
                'header' => 'Пользователь',
            ),
        ),
    )); ?>

</div>