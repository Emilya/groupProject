<?php
/* @var $this ExtenshionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Extenshions',
);

$this->menu=array(
	array('label'=>'Create Extenshions', 'url'=>array('create')),
	array('label'=>'Manage Extenshions', 'url'=>array('admin')),
);
?>

<div class="content">

    <ul class="breadcrumb">
        <li><a href="index.html">Главная</a> <span class="divider">/</span></li>
        <li class="active">Расширения</li>
    </ul>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="btn-toolbar">
                <button class="btn btn-primary newUser"><i class="icon-plus"></i>  <?=CHtml::link('Новый этап', $this->createUrl('/admin/extenshions/create'));?></button>
                <div class="btn-group">
                </div>
            </div>
        </div>
    </div>
    <div class="well">
        Главной особенностью данного программного продукта является то, что он предназначен для ведения коллективного проекта и реализует проверку на наличие всех составляющих проекта.<br>
        В основе программного продукта лежит водопадная модель процесса разработки программ.
        Водопадная модель является классической моделью разработки программ, в рамках которой процесс представляется последовательностью фаз анализа требований, проектирования, реализации, интеграции и тестирования.
        <ul>
            <li>Анализ требований состоит в сборе требований к продукту. Результатом анализа, как правило, является некоторый текст.</li>
            <li>Проектирование описывает внутреннюю структуру продукта. Обычно такое описание дается в форме диаграмм и текстов.</li>
            <li>Реализация — это программирование. Результатом реализации является программный код всех уровней, будь то код, генерируемый высокоуровневой системой программирования, компилятором языка четвертого поколения или какой-либо другой.</li>
            <li>Интеграция — это процесс сборки всего продукта из отдельных частей.</li>
        </ul>
    </div>
</div>
<div class="well">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'dataProvider' => $dataProvider,

        'columns' => array(
            array(
                'name' => 'id',
                'header' => '#',
                'htmlOptions' => array('color' =>'width: 60px'),
            ),


            array(
                'name' => 'name',
                'header' => 'Название этапа',
            ),
            array(
                'name' => 'level',
                'header' => 'Этап',
            ),
            array(
                'name' => 'content',
                'header' => 'Расширения',
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{update} {delete}',
            ),
        ),
    )); ?>
</div>
