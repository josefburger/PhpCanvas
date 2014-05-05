PhpCanvas
=========
Canvas - PHP Graphic Library

The library is intended to simplify the work with graphical library (GD). For a better understanding here is an example for generating thumbnails:

```php
  $canvas = Canvas::createFromImage('/gallery/photos/pic-01.jpg');
  $canvas->resize(150, null);
  $canvas->generateJpeg('/gallery/thumbnails/pic-01.jpg');
```


## Creating Canvas
There are two ways for creating new canvas:
  - **creating new image** - create new blank canvas of given dimensions.
    ```php
      $canvas = Canvas::create(500, 300);
    ```

  - **loading existing image (photo)** - load an existing image and add them to the canvas. Dimensions of the canvas is identical to the image dimensions.
    ```php
      $canvas = Canvas::createFromImage('/gallery/photos/pic-01.jpg');
    ```


## Generating images
Canvas library can work with *JPEG* and *PNG* files (other will be added in future). Library can output the image to the browser or save them to file. The last option is to use BASE64 output.
  - **browser output** - easy way to generate temporary images.
    ```php
      header('Content-type: image/png'); // you must send header to inform browser that the source is an image
      $canvas->generatePng();
    ```

  - **save to file** - just write a filename an save the image
    ```php
      $canvas->generatePng('new-image.png');
    ```

  - **get BASE64 output** - usefull method for generating images
    ```php
      $image = $canvas->generatePngBase64();
      echo '<img src="data:image/png;base64,' . $image . '" alt="Image" />';
    ```


## Drawing on canvas
The library contains functions for drawing on the canvas. The functions are:
  - **drow a line** - drow a line form the first point to the second point
    ```php
      $canvas->line($startX, $startY, $endX, $endY);
    ```

  - **drow a rectangle** - drow a rectang from the left upper corner to the right bottom corner
    ```php
      $canvas->rectangle($leftUpperX, $leftUpperY, $rightBottomX, $rightBottomY);
    ```

  - **drow a polygon** - drow a polygon of given points
    ```php
      $canvas->polygon(Array(
        $pointAx, $pointAy,
        $pointBx, $pointBy,
        $pointCx, $pointCy,
        ...
      ));
    ```

  - **drow an ellipse** - drow an ellipse of given width an height on the given center point
    ```php
      $canvas->ellipse($centerX, $centerY, $width, $height);
    ```

  - **drow an arc** - drow an arc, draw a ellipse of given width and height on the given center point but specify the angle of start end end in degrees for drawing arc
    ```php
      $canvas->arc($centerX, $centerY, $width, $height, $start, $end)
    ```

All drawing methods (except the classic line) can be used in variant, where is the shape filled with the color.
```php
$canvas->filledRectangle(...);
$canvas->filledPolygon(...);
$canvas->filledEllipse(...);
$canvas->filledArc(..., $style);
```


## Flip, rotate, resize functions
  - **flip** - flip image vertically, horizontally or both directions
    ```php
      $canvas->flip($mode);
    ```

  - **rotate** - rotate image by the angle in degrees
    ```php
      $canvas->ellipse($angle);
    ```

  - **resize** - resize image to the new dimensions
    ```php
      $canvas->resize($newWidth, $newHeight);
      $canvas->resizeByPercent(50); // resize to 50%
    ```
    If you want to use only one dimension and leave the second to calculate use *null* instead of number:
    ```php
      $canvas->resize(250, null); // width will be 250px and the height will be calculated
    ```



## Advanced functions
  - **duplicate canvas** - return a cloned instance of the canvas
    ```php
      $canvas->duplicateCanvas();
    ```

  - **add canvas** - add an existing canvas to the canvas (can be used for adding watermark)
    ```php
      $canvas->addCanvas($newCanvas, $x, $y, $opacity); // left upper corner of new canvas will be on x, y coordinates on the parent canvas
    ```
