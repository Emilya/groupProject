<?php
/* @var $this SiteController */


?>

<div class="well contentPage" style="width: 870px; padding: 8px 0;">
    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data'=>array('id'=>1,
            'firstName'=>"{$user->name}",
            'lastName'=>"{$user->surname}",
            'role'=>"{$user->role}",
            'email'=>"{$user->email}",
            'phone'=>"{$user->phone}",
            'address'=>"{$user->address}",
            'profession'=>"{$user->profession}",
        ),
        'attributes'=>array(
            array('name'=>'firstName', 'label'=>'Имя'),
            array('name'=>'lastName', 'label'=>'Фамилия'),
            array('name'=>'role', 'label'=>'Роль'),
            array('name'=>'email', 'label'=>'Эл. адрес'),
            array('name'=>'phone', 'label'=>'Телефон'),
            array('name'=>'address', 'label'=>'Адрес'),
            array('name'=>'profession', 'label'=>'Задание'),
        ),
    ));
    ?>
</div>


