<?php

/**
 * Imagepreset class.
 * @see https://github.com/dhalla/Dummyimage
 *
 */
class Preset extends Dummyimage 
{
    

    const CONFIG = 'presets.conf.ini';


    /**
     * Read configuration File
     *
     */
    private function getConfig() {
    
        return parse_ini_file(self::CONFIG, true);
    
    }


    /**
     * Init-Function
     * Generate new Dummyimage from Preset
     *
     */    
    private function init($preset) {

        $config = self::getConfig();
        $img    = new Dummyimage($config[$preset]);
        return $img;

    }

    
    /**
     * Generate full Image-Tag
     * 
     */    
    public static function getImageTag($preset) {
    
        $img = self::init($preset);
        return $img->imageTag();    
    
    }


    /**
     * Generates valid src-Attribute for image-Tag
     * 
     */
    public static function getImageSrc($preset) {
    
        $img = self::init($preset);
        return $img->imageSrc();
    
    }


}


?>
