@echo off

rem -------------------------------------------------------------
rem  Yii command line script for Windows.
rem  This is the bootstrap script for running yiic on Windows.
rem -------------------------------------------------------------

@setlocal

set BIN_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" "%BIN_PATH%yiic.php" %*

@endlocal
<?php
$yiic='V:/home/project.loc/www/framework'/yiic.php';
$config=dirname(__FILE__).'/config/main.php';

require_once($yiic);