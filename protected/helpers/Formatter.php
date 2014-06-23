<?php

class Formatter
{
	/**
	 * Принимает число и имя форматирования,
	 * возвращает отформатированную number_format() цену,
	 * параметры форматирования указываются в main.php в массиве "params"
	 * пример - 'formatPrice'=>array(0,'',' ')
	 */
    public static function formatLevel($level)
    {
        switch($level){
            case 1:
                $title = "Анализ требований";
                break;
            case 2:
                $title = "Проектирование";
                break;
            case 3:
                $title = "Реализация";
                break;
        }
        return $title;
    }

	/**
	 * Принимает дату в формате timestamp и имя форматирования,
	 * возвращает отформатированное date() время,
	 * параметры форматирования указываются в main.php в массиве "params"
	 * пример - formatDateTime'=>'d.m.Y H:G',
	 */
	public static function formatTime($time, $format='default')
	{
		return date(Yii::app()->params['formatTime'][$format], $time);
	}

	// переводим многмоерный массив в одномерный
	public static function flatArray($array)
	{
		$result = array();

		foreach ($array as $value) {

			if (is_array($value)) {
				$result = array_merge($result, self::flatArray($value));
			} else {
				$result[] = $value;
			}
		}

		return $result;
	}

    static public function convertToNormalDate($date) {
        if($date) {
            return date("d.m.Y",$date);
        }
        return null;
    }
}
