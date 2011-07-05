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
     * Constructor
     * Simply call the parents' Constructor with Params from Config-File
     *
     */
    public function __construct($preset) {
    
        $config = $this->getConfig();
        parent::__construct($config[$preset]);
    
    }
    

    /**
     * Read configuration File
     *
     */
    private function getConfig() {
    
        try {
            if (file_exists(self::CONFIG)) {
                return parse_ini_file(self::CONFIG, true);
            } else {
                throw new Exception('Invalid Config-File: File "'.self::CONFIG.'" not found.');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    
    }


    /**
     * Static Init-Function
     * Generate new Dummyimage from Preset
     *
     */    
    private static function init($preset) {

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
