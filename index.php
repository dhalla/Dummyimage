<?php

    require('dummyimage.class.php');
    
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

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
    
    <title>Lorem Pixum-Class</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />    
    
</head>
<body>

    #1: <br /> <?php echo $image->imageTag(); ?>
    <br />
    Src: <?php echo $image->imageSrc(); ?>
    <hr />
    
    #2: <br /> <?php echo $image2->imageTag('dummyimage'); ?>
    <br />
    Src: <?php echo $image2->imageSrc(); ?>    
    <hr />
    
    #3: <br /> <?php echo $image3->imageTag(); ?>
    <br />
    Src: <?php echo $image3->imageSrc(); ?>    
    <hr />    
    
    Images used: <?php echo Dummyimage::getNumImages(); ?>
    
    <hr />
    
    <pre>Default Settings: <br /><?php var_dump($image); ?></pre>
    
</body>
</html>
