<?php

/**
 * Dummyimage class.
 *
 * @see http://lorempixum.com/
 * @author Daniel Haller daniel_haller at gmx dot de
 *
 */
class Dummyimage 
{


    const BASE_URL      = 'http://lorempixum.com';

    private $width      = 100;
    private $height     = 100;
    private $grayscale  = false;
    private $dummytext  = false;
    private $category   = 'city';
    private $categories = array('abstract', 'food', 'people', 'technics', 'animals', 'nightlife', 'nature', 'transport', 'sports', 'city', 'fashion');

    private static $numImages = 0;

    
    /**
     * Constructor, overrides Defaults
     *
     */
    public function __construct($properties = false) {
        
        if ($properties) {
            foreach ($properties as $key => $value) {
                $this->$key = $value;
            }        
        }
        
        self::$numImages++;
        
    }
    
    
    /**
     * Magic Getter
     *
     */
    public function __get($property) {     
    
        return $this->$property;    
        
    }
    

    /**
     * Set additional Properties like Grayscale, Dummytext and Category
     *
     */
    public function __set($property, $value) {
    
        try {
            switch($property) {
                case "width"    : $this->width = $value; break;
                case "height"   : $this->height = $value; break;
                case "grayscale": $this->grayscale = $value; break;
                case "dummytext": $this->dummytext = $value; break;
                case "category": 
                    if (in_array($value, $this->categories)) { 
                        $this->category = $value;
                    } else {
                        throw new Exception('Invalid Category: "'.$value.'". Valid Categories: '.implode(', ', $this->categories));
                    }
                break;  
                default: throw new Exception('Invalid Property: "'.$property.'". Valid Properties: width, height, (bool) grayscale, dummytext, category.'); break;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    
    }
    
    
    /**
     * Generate full Image-Tag
     * 
     */    
    public function imageTag($class = false) {
    
        $imageTag = '<img src="'.$this->imageSrc().'" alt="Dummyimage" class="'.$class.'" width="'.$this->width.'" height="'.$this->height.'" />';
        return $imageTag;
        
    }
    
    
    /**
     * Generates valid src-Attribute for image-Tag
     * 
     */
    public function imageSrc() {
        
        $grayscale = ($this->grayscale) ? '/g' : ''; 
        $dummytext = ($this->dummytext) ? '/'.$this->dummytext : '';

        $imgSrc =  self::BASE_URL . $grayscale . '/' . $this->width . '/' . $this->height.'/' . $this->category . $dummytext;
        
        return $imgSrc; 

    }
    
    
    /**
     * Maybe usefull for Debugging
     *
     */
    public function __toString() {
    
        $debug = "<hr />";
        foreach (get_object_vars($this) as $key => $value) {
            $debug .= $key . ": " . $value . "<br />";        
        };
        $debug .= "class: " . get_class() . "<hr />";
        return $debug;
        
    }
    
    
    /**
     * How many Dummy-Images are used on this site?
     *
     */    
    public static function getNumImages() {
    
        return self::$numImages;
    
    }

    
    /**
     * Destructor, not used so far
     *
     */
    public function __destruct() {
        // Do nothing
    }
    

}


?>
