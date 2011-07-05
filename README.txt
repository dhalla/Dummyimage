Dummyimage-Class
=================

This little script allows you to use the LoremPixum-API (http://lorempixum.com/) from the Backend and create Objects for your Dummyimages like this:

$image = new Dummyimage(array(
    'category'      => 'nightlife', 
    'grayscale'     => true,
    'dummytext'     => 'Schnieb schnaaab di schnuub',
    'width'         => 150,
    'height'        => 400
));

You can use this in your template like this:

<?php echo $image->imageTag(); ?>

-----------------

In addition to this quite simple usage you can define different "Presets" or Imagesets.
F.e. if you different formats or types of images you can use in your Content, you can define a preset for each type:

; Image in Content, Width: 1-column
[content_1col]
width       = 100
height      = 300
grayscale   = false
category    = "nightlife"
;dummytext   = "Courtesty of xyz"

; Image in Content, Width: 1-column
[content_2col]
width       = 250
height      = 100
grayscale   = true
category    = "transport"
dummytext   = "Courtesty of xyz"

You can use those presets in your backend like this:

$content_1col   = new Preset('content_1col');  
$content_2col   = new Preset('content_2col');  

And in your templates:

<?php echo $image->content_1col(); ?>
<?php echo $image->content_2col(); ?>

For more information see the index.php, which is full with examples.
