<?php
/* @var $this SiteController */
/* @var $model Files */
/* @var $form CActiveForm */
?>
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
    Соответствие форматов каждому этапу процесса разработки представлено в следующей таблице:
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'dataProvider' => $dataProvider,

        'columns' => array(
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
        ),
    )); ?>
</div>
    <div class="form well">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'file_form',
            'htmlOptions'=>array('enctype'=>'multipart/form-data'),
            'enableAjaxValidation'=>false,
        )); ?>


        <div class='row fileUpload'>
            <?php
            echo $form->fileField($model,'name');
            echo $form->error($model,'name');
            ?>
        </div>

        <div class="row buttons fileUpload">
            <?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>

        </div>

        <?php $this->endWidget(); ?>
