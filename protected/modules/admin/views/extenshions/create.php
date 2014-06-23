<?php
/* @var $this ExtenshionsController */
/* @var $model Extenshions */

$this->breadcrumbs=array(
	'Extenshions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Extenshions', 'url'=>array('index')),
	array('label'=>'Manage Extenshions', 'url'=>array('admin')),
);
?>

<div class="contentUpdate">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="header">Добавление этапа разработки</div>
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
    </div>
</div>