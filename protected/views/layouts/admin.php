<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php /*echo Yii::app()->request->baseUrl; */?>/css/admin.css" />

    <?php Yii::app()->bootstrap->register(); ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
        <div class="navbar">
        <div class="navbar-inner">
            <ul class="nav pull-right">

                <li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">Настройки</a></li>
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
            <a class="brand" href="#"><span class="first"><?php echo CHtml::encode(Yii::app()->name); ?>
                </span> <span class="second">сайта</span></a>
        </div>
    </div>
        <div class="well" style="max-width: 250px; padding: 8px 0;">
            <?php echo TbHtml::navList(array(
                array('label' => 'Меню'),
                array('label' => 'Пользователи', 'url' => $this->createUrl('/admin/user/index')),
                array('label' => 'Расширения', 'url' => $this->createUrl('/admin/extenshions/index')),
                array('label' => 'Зависимости', 'url' => $this->createUrl('/admin/dependencies/index')),
            )); ?>
        </div>

	</div><!-- header -->

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">

	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
