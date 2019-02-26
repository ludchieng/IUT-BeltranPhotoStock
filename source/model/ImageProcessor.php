<?php

namespace BeltranPhotoStock\ImageProcessor;

class ImageProcessor
{
  private static $quality = 20;

  public function downSize($img)
  {
    imagejpeg($img, NULL, $quality);
  }
}
