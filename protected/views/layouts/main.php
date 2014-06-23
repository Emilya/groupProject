<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="language" content="en" />

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php /*echo Yii::app()->request->baseUrl; */?>/css/main.css" />
    <!--<link rel="stylesheet" type="text/css" href="<?php /*echo Yii::app()->request->baseUrl; */?>/css/form.css" />-->
    <?php Yii::app()->bootstrap->register(); ?>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container" id="page">

    <div id="header">
        <div class="navbar">
            <div class="navbar-inner">
                <ul class="nav pull-right">

                    <li><a href='/' class="hidden-phone visible-tablet visible-desktop" role="button"><i class="icon-home"></i> Главная</a></li>
                    <li><a href='/site/edit' class="hidden-phone visible-tablet visible-desktop" role="button"><i class="icon-pencil"></i> Редактирование</a></li>
                    <li><a href='/site/server' class="hidden-phone visible-tablet visible-desktop" role="button"><i class="icon-hdd"></i> Сервер</a></li>
                    <li><a href='/site/archive' class="hidden-phone visible-tablet visible-desktop" role="button"><i class="icon-download-alt"></i> Наработки</a></li>
                    <li><a href='/site/MySuccess' class="hidden-phone visible-tablet visible-desktop" role="button"><i class="icon-folder-close"></i> Мои успехи</a></li>
                    <li><a href='/site/Documentation' class="hidden-phone visible-tablet visible-desktop" role="button"><i class="icon-file"></i> Документация</a></li>
                    <li><a href='/letters/index' class="hidden-phone visible-tablet visible-desktop" role="button"><i class="icon-envelope"></i> Сообщения</a></li>
                    <li><a href='/site/Reiting' class="hidden-phone visible-tablet visible-desktop" role="button"><i class="icon-star"></i> Рейтинг</a></li>
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?=Yii::app()->user->name?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">Аккаунт</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">Настройки</a></li>
                            <li class="divider visible-phone"></li>
                            <li><?=CHtml::link('Выход',Yii::app()->createUrl('/site/logout'))?></li>
                        </ul>
                    </li>

                </ul>
                <a class="brand" href="#"><span class="first"></span></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="span3">
            <div class="avatarUser">
                <?if($this->avatar){echo CHtml::image('/../upload/avatar/'.$this->avatar);};?>
            </div>
            <div id="online_chat" class="well">
                <div class="areaMessage"></div>
                <textarea id="area" name="myMessage"  class="form-control" rows="5" placeholder="Ваше сообщение..."></textarea>
                <button id="sendMessage" class="btn btn-small btn-block btn-info" type="button">Отправить</button>
            </div>
        </div>
        <div class="span9">
            <?php echo $content; ?>
        </div>
    </div>

    <div class="clear"></div>

    <div id="footer">

    </div><!-- footer -->

</div><!-- page -->

<?
Yii::app()->clientScript->registerScript('getAllMessage', <<<JS

    sendMessage();
    $('#sendMessage').on('click', function(){
    $(".areaMessage").text('');
       sendMessage();
    });
    /*$("*").hover(function(){
  sendMessage();
  });*/

function sendMessage(){
    area = $("#area").val();
    $.post('/site/Online', {
            data: area
        }, function(response) {
            var data = $.parseJSON(response);
           $(".areaMessage").append(data);
        });
        }

JS
    , CClientScript::POS_READY);
?>
</body>
</html>
