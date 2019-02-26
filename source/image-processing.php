<?php

use BeltranPhotoStock\ImageProcessor;
include "./model/ImageProcessor.php";

//header ("Content-type: image/jpg");
$image = imagecreatefromjpeg("./images/asparagus-steak-veal-steak-veal-361184.jpg");
$imgProcessor = new ImageProcessor();
$imgProcessor->downSize($image);
