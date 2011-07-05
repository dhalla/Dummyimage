<?php

    require_once('dummyimage.class.php');
    require_once('preset.class.php');
    
    /* BASIC USAGE OF DUMMYIMAGE-CLASS */
    
    // Use default settings
    $image = new Dummyimage();

    // Mix up configuration array and properties which are individually set (all optional)
    $image2 = new Dummyimage(array('width' => 400, 'height' => 250));
    $image2->grayscale  = true;
    $image2->category   = 'sports';
    $image2->dummytext  = 'Lorem Ipsum';         
    
    // Use a configuration array while creating the image
    $image3 = new Dummyimage(array(
            'category'      => 'nightlife', 
            'grayscale'     => true,
            'dummytext'     => 'Schnieb schnaaab di schnuub',
            'width'         => 150,
            'height'        => 400
        ));
        
    /* USAGE OF CONFIGURABLE PRESETS */ 
    
    $imageheader    = new Preset('imageheader');
    $content_1col   = new Preset('content_1col');    
    $teaser_sidebar = new Preset('teaser_sidebar');
    
    /* Use static calls for presets instead */    
    $imageheader_tag = Preset::getImageTag("imageheader");
    $imageheader_src = Preset::getImageSrc("imageheader");

    $content_1col_tag = Preset::getImageTag("content_1col");
    $content_1col_src = Preset::getImageSrc("content_1col");

    $teaser_sidebar_tag = Preset::getImageTag("teaser_sidebar");
    $teaser_sidebar_src = Preset::getImageSrc("teaser_sidebar");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
    
    <title>Lorem Pixum-Class</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />    
    
</head>
<body>

    <!-- Simple Usage of Dummyimage-Objects -->
    
    Image #1: <br /> <?php echo $image->imageTag(); ?>
    <br />
    Src: <?php echo $image->imageSrc(); ?>
    <hr />
    
    Image #2: <br /> <?php echo $image2->imageTag('dummyimage'); ?>
    <br />
    Src: <?php echo $image2->imageSrc(); ?>    
    <hr />
    
    Image #3: <br /> <?php echo $image3->imageTag(); ?>
    <br />
    Src: <?php echo $image3->imageSrc(); ?>    
    <hr />    

    <!-- Use preconfigured Imagesets -->
    Preset Imageheader: <br /> <?php echo $imageheader->imageTag(); ?>
    <br />
    Src: <?php echo $imageheader->imageSrc(); ?>    
    <hr />

    Preset Content_1col: <br /> <?php echo $content_1col->imageTag(); ?>
    <br />
    Src: <?php echo $content_1col->imageSrc(); ?>    
    <hr />

    Preset Teaser_Sidebar: <br /> <?php echo $teaser_sidebar->imageTag(); ?>
    <br />
    Src: <?php echo $teaser_sidebar->ImageSrc(); ?>    
    <hr />
    
    <!-- Use preconfigured Imagesets with static calls -->
    Preset Imageheader: <br /> <?php echo $imageheader_tag; ?>
    <br />
    Src: <?php echo $imageheader_src; ?>    
    <hr />

    Preset Content_1col: <br /> <?php echo $content_1col_tag; ?>
    <br />
    Src: <?php echo $content_1col_src; ?>    
    <hr />

    Preset Teaser_Sidebar: <br /> <?php echo $teaser_sidebar_tag; ?>
    <br />
    Src: <?php echo $teaser_sidebar_src; ?>    
    <hr />
    
    Images used: <?php echo Dummyimage::getNumImages(); ?>
    
    <hr />
    
    <pre>Default Settings: <br /><?php var_dump($image); ?></pre>
    
</body>
</html>
