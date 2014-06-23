<?php
/* @var $this DependenciesController */
/* @var $model Dependencies */

$this->breadcrumbs=array(
	'Dependencies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dependencies', 'url'=>array('index')),
	array('label'=>'Manage Dependencies', 'url'=>array('admin')),
);
?>

<div class="contentUpdate">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="header">Добавление новой позиции задания</div>
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
    </div>
</div>