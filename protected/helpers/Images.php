<?php
class Images{
    const Big = 'big';
    const Small = 'small';
    const Product  = 'product';
    const Text  = 'text';
    const Avatar  = 'avatar';
    // $type - число-индекс подмассива в imgProductSizes
    public static function getImageParamsByType($objectType){
        return Yii::app()->params['images'][$objectType];
    }

    public static function getImage($photoName,$objectType,$size){
        // получаем размеры изображения
        $resizeParam = Yii::app()->params['images'][$objectType][$size];
        // каталог хранения изображения товаров
        $imgFullPath = YiiBase::getPathOfAlias('webroot') . Yii::app()->params['images'][$objectType]['path'];
        $imgWebPath = Yii::app()->params['images'][$objectType]['path'];
        // путь до файла абсолютный и для выдачи в web
        $_image = $imgFullPath.$size."_".$photoName;
        $image = $imgWebPath.$size."_".$photoName;
        if (is_file($_image)){
            return $image;
        } else {
            return '/images/'.$size.'_no_image.jpg';
        }
    }

    public static function resizeImage($file,$type,$destinationPath){
        ini_set('memory_limit', '128M');
        Yii::import('application.helpers.CArray');
        Yii::import('application.extensions.image.Image');
        $baseName = basename($file);
        $image = new Image($file);
        // параметры сжатия
        if ($image->width <= $image->height) {
            $typeResize = Image::HEIGHT;
        } else {
            $typeResize = Image::WIDTH;
        }
        $resizeParam = Yii::app()->params['images'][$type]['sizes'];	// параметры ресайза
        // ресайзим по параметрам
        foreach ($resizeParam as $paramsKey=>$param){
            // префикс в имени изображения
            $pref = $paramsKey.'_';
            // без обрезания
            if (count($param) < 3){
                $image->resize($param[0], $param[1], $typeResize);
            } else {
                // с обрезанием
                $preCropParam = $resizeParam[$param[2]]; // размеры изображения из которого будем вырезать
                $image->resize($preCropParam[0], $preCropParam[1], $typeResize)->crop($param[0],$param[1]);
            }
            $image->save($destinationPath . $pref . $baseName);
        }
        unset($image);
    }

    public static function saveImageFromBase64($stringInBase64,$fileName,$path) {
        if(isset($stringInBase64) && isset($fileName)) {
            $image = base64_decode($stringInBase64);
            $fpng = fopen($path.'/'.$fileName, "w");
            fwrite($fpng,$image);
            fclose($fpng);
        }
    }

    public static function createSimplePath($path) {
        $folders = preg_split('/(\/)|(\\\)/',$path);
        $newPath = array();
        foreach($folders as $folder) {
            if($folder != '..') {
                $newPath[] = $folder;
            } else {
                array_pop($newPath);
            }
        }
        return implode('/',$newPath);
    }
}