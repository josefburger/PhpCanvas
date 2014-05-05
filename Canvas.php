<?php
/**
 * Canvas library
 * Graphic Library in PHP
 * 
 * @version 2.0.0.0
 * @author Josef Burger <code@jobu.cz>
 * @copyright (c) 2014, Josef Burger
 * @license http://opensource.org/licenses/MIT The MIT License
 */
class Canvas {
    protected $canvas = null;
    protected $color = null;
    protected $font = 5;
    
    protected $colorComponents = Array(0,0,0,0);
    
    //---- CONSTANTS -----------------------------------------------------------
    const ANTIALIASING_OFF = false;
    const ANTIALIASING_ON = true;
    
    const COLOR_ALICE_BLUE = '#F0F8FF'; const COLOR_ANTIQUE_WHITE = '#FAEBD7'; const COLOR_AQUA = '#00FFFF'; const COLOR_AUAMARINE = '#7FFFD4'; const COLOR_AZURE = '#F0FFFF'; const COLOR_BEIGE = '#F5F5DC'; const COLOR_BISQUE = '#FFE4C4'; const COLOR_BLACK = '#000000'; const COLOR_BLANCHED_ALMOND = '#FFEBCD'; const COLOR_BLUE = '#0000FF'; const COLOR_BLUE_VIOLET = '#8A2BE2'; const COLOR_BROWN = '#A52A2A'; const COLOR_BURLY_WOOD = '#DEB887'; const COLOR_CADET_BLUE = '#5F9EA0'; const COLOR_CHARTREUSE = '#7FFF00'; const COLOR_CHOCOLATE = '#D2691E'; const COLOR_CORAL = '#FF7F50'; const COLOR_CORNFLOWER_BLUE = '#6495ED'; const COLOR_CORNSILK = '#FFF8DC'; const COLOR_CRIMSON = '#DC143C'; const COLOR_CYAN = '#00FFFF'; const COLOR_DARK_BLUE = '#00008B'; const COLOR_DARK_CYAN = '#008B8B'; const COLOR_DARK_GOLDEN_ROD = '#B8860B'; const COLOR_DARK_GRAY = '#A9A9A9'; const COLOR_DARK_GREEN = '#006400'; const COLOR_DARK_KHAKI = '#BDB76B'; const COLOR_DARK_MAGENTA = '#8B008B'; const COLOR_DARK_OLIVE_GREEN = '#556B2F';
    const COLOR_DARK_ORANGE = '#FF8C00'; const COLOR_DARK_ORCHID = '#9932CC'; const COLOR_DARK_RED = '#8B0000'; const COLOR_DARK_SALMON = '#E9967A'; const COLOR_DARK_SEA_GREEN = '#8FBC8F'; const COLOR_DARK_SLATE_BLUE = '#483D8B'; const COLOR_DARK_SLATE_GRAY = '#2F4F4F'; const COLOR_DARK_TURQUOISE = '#00CED1'; const COLOR_DARK_VIOLET = '#9400D3'; const COLOR_DEEP_PINK = '#FF1493'; const COLOR_DEEP_SKY_BLUE = '#00BFFF'; const COLOR_DIM_GRAY = '#696969'; const COLOR_DODGER_BLUE = '#1E90FF'; const COLOR_FIRE_BRICK = '#B22222'; const COLOR_FLORAL_WHITE = '#FFFAF0'; const COLOR_FOREST_GREEN = '#228B22'; const COLOR_FUCHSIA = '#FF00FF'; const COLOR_GAINSBORO = '#DCDCDC'; const COLOR_GHOST_WHITE = '#F8F8FF'; const COLOR_GOLD = '#FFD700'; const COLOR_GOLDEN_ROD = '#DAA520'; const COLOR_GRAY = '#808080'; const COLOR_GREEN = '#008000'; const COLOR_GREEN_YELLOW = '#ADFF2F'; const COLOR_HONEY_DEW = '#F0FFF0'; const COLOR_HOT_PINK = '#FF69B4'; const COLOR_INDIAN_RED  = '#CD5C5C'; const COLOR_INDIGO  = '#4B0082';
    const COLOR_IVORY = '#FFFFF0'; const COLOR_KHAKI = '#F0E68C'; const COLOR_LAVENDER = '#E6E6FA'; const COLOR_LAVENDER_BLUSH = '#FFF0F5'; const COLOR_LAWN_GREEN = '#7CFC00'; const COLOR_LEMON_CHIFFON = '#FFFACD'; const COLOR_LIGHT_BLUE = '#ADD8E6'; const COLOR_LIGHT_CORAL = '#F08080'; const COLOR_LIGHT_CYAN = '#E0FFFF'; const COLOR_LIGHT_GOLEDN_ROD_YELLOW = '#FAFAD2'; const COLOR_LIGHT_GRAY = '#D3D3D3'; const COLOR_LIGHT_GREEN = '#90EE90'; const COLOR_LIGHT_PINK = '#FFB6C1'; const COLOR_LIGHT_SALMON = '#FFA07A'; const COLOR_LIGHT_SEA_GREEN = '#20B2AA'; const COLOR_LIGHT_SKY_BLUE = '#87CEFA'; const COLOR_LIGHT_SLATE_GRAY = '#778899'; const COLOR_LIGHT_STEEL_BLUE = '#B0C4DE'; const COLOR_LIGHT_YELLOW = '#FFFFE0'; const COLOR_LIME = '#00FF00'; const COLOR_LIME_GREEN = '#32CD32'; const COLOR_LINEN = '#FAF0E6'; const COLOR_MAGENTA = '#FF00FF'; const COLOR_MAROON = '#800000'; const COLOR_MEDIUM_AQUA_MARINE = '#66CDAA'; const COLOR_MEDIUM_BLUE = '#0000CD'; const COLOR_MEDIUM_ORCHID = '#BA55D3';
    const COLOR_MEDIUM_PURPLE = '#9370DB'; const COLOR_MEDIUM_SEA_GREEN = '#3CB371'; const COLOR_MEDIUM_SLATE_BLUE = '#7B68EE'; const COLOR_MEDIUM_SPRING_GREEN = '#00FA9A'; const COLOR_MEDIUM_TURQUOISE = '#48D1CC'; const COLOR_MEDIUM_VIOLET_RED = '#C71585'; const COLOR_MIDNIGHT_BLUE = '#191970'; const COLOR_CREAM = '#F5FFFA'; const COLOR_MISTY_ROSE = '#FFE4E1'; const COLOR_MOCCASIN = '#FFE4B5'; const COLOR_NAVAJO_WHITE = '#FFDEAD'; const COLOR_NAVY = '#000080'; const COLOR_OLD_LACE = '#FDF5E6'; const COLOR_OLIVE = '#808000'; const COLOR_OLIVE_DRAB = '#6B8E23'; const COLOR_ORANGE = '#FFA500'; const COLOR_ORANGE_RED = '#FF4500'; const COLOR_ORCHID = '#DA70D6'; const COLOR_PALE_GLODEN_ROD = '#EEE8AA'; const COLOR_PALE_GREEN = '#98FB98'; const COLOR_PALE_TURQUOISE = '#AFEEEE'; const COLOR_PALE_VIOLET_RED = '#DB7093'; const COLOR_PAPAYA_WHIP = '#FFEFD5'; const COLOR_PEACH_PUFF = '#FFDAB9'; const COLOR_PERU = '#CD853F'; const COLOR_PINK = '#FFC0CB'; const COLOR_PLUM = '#DDA0DD'; const COLOR_POWDER_BLUE = '#B0E0E6';
    const COLOR_PURPLE = '#800080'; const COLOR_RED = '#FF0000'; const COLOR_ROSY_BROWN = '#BC8F8F'; const COLOR_ROYAL_BLUE = '#4169E1'; const COLOR_SADDLE_BROWN = '#8B4513'; const COLOR_SALMON = '#FA8072'; const COLOR_SANDY_BROWN = '#F4A460'; const COLOR_SEA_GREEN = '#2E8B57'; const COLOR_SEA_SHELL = '#FFF5EE'; const COLOR_SIENNA = '#A0522D'; const COLOR_SILVER = '#C0C0C0'; const COLOR_SKY_BLUE = '#87CEEB'; const COLOR_SLATE_BLUE = '#6A5ACD'; const COLOR_SLATE_GRAY = '#708090'; const COLOR_SNOW = '#FFFAFA'; const COLOR_SPRING_GREEN = '#00FF7F'; const COLOR_STEEL_BLUE = '#4682B4'; const COLOR_TAN = '#D2B48C'; const COLOR_TEAL = '#008080'; const COLOR_THISTLE = '#D8BFD8'; const COLOR_TOMATO = '#FF6347'; const COLOR_TURQUOISE = '#40E0D0'; const COLOR_VIOLET = '#EE82EE'; const COLOR_WHEAT = '#F5DEB3'; const COLOR_WHITE = '#FFFFFF'; const COLOR_WHITE_SMOKE = '#F5F5F5'; const COLOR_YELLOW = '#FFFF00'; const COLOR_YELLOW_GREEN = '#9ACD32';
    
    const ARC_PIE = IMG_ARC_PIE;
    const ARC_CHORD = IMG_ARC_CHORD;
    const ARC_NOFILL = IMG_ARC_NOFILL;
    const ARC_EDGED = IMG_ARC_EDGED;
    
    const FLIP_HORIZONTAL = IMG_FLIP_HORIZONTAL;
    const FLIP_VERTICAL = IMG_FLIP_VERTICAL;
    const FLIP_BOTH = IMG_FLIP_BOTH;
    
    
    
    
    /**
     * Create instance is possible just by static methods
     */
    private final function __construct() {
        if(!function_exists('gd_info')) {
            $this->throwErrorMessage('gd library is not installed!!');
            exit;
        }
    }
    
    /**
     * Throw en Canvas library error (can be overriden)
     * @param String $message
     */
    protected function throwErrorMessage($message) {
        die('<br /><b>Fatal error</b>: '.$message);
    }
    
    
    
    
    //---- CREATE METHODS ------------------------------------------------------
    /**
     * Create new canvas of given proportions
     * @param int $width
     * @param int $height
     * @return \self
     */
    public static function create($width, $height) {
        $newCanvas = new self();
        $newCanvas->canvas = imagecreatetruecolor($width, $height);
        return $newCanvas;
    }
    
    /**
     * Create canvas from existing image
     * @param String $fileName
     * @return \self
     */
    public static function createFromImage($fileName) {
        $newCanvas = new self();
        if(!file_exists($fileName))
            $this->throwErrorMessage('image does not exists');
        
        switch(self::getImageMimeType($fileName)) {
            case image_type_to_mime_type(IMAGETYPE_PNG): 
                $newCanvas->canvas = imagecreatefrompng($fileName);
                return $newCanvas;
            case image_type_to_mime_type(IMAGETYPE_JPEG):
                $newCanvas->canvas = imagecreatefromjpeg($fileName);
                return $newCanvas;
            default:
                $this->throwErrorMessage('unsupported image format');
        }
    }
    
    

    //---- IMAGE GENERATE METHODS ----------------------------------------------
    /**
     * Output a PNG image to either the browser or a file
     * @param String $filename The path to save the file to. If not set or NULL, the raw image stream will be outputted directly
     * @param int $quality Compression level: from 0 (no compression) to 9
     */
    public function generatePng($filename = null, $quality = null) {
        if($quality != null && ($quality <0 || $quality > 9))
            $this->throwErrorMessage('incorrect png quality number');
        imagepng($this->canvas, $filename, $quality);
    }
    
    /**
     * Output image to browser or file
     * @param String $filename The path to save the file to. If not set or NULL, the raw image stream will be outputted directly
     * @param int $quality quality is optional, and ranges from 0 (worst quality, smaller file) to 100 (best quality, biggest file). The default is the default IJG quality value (about 75)
     */
    public function generateJpeg($filename = null, $quality = null) {
        if($quality != null && ($quality <0 || $quality > 100))
            $this->throwErrorMessage('incorrect  jpeg quality number');
        imagejpeg($this->canvas, $filename, $quality);
    }
    
    
    public function generatePngBase64() {
        ob_start();
        $this->generatePng();
        $source = ob_get_clean();
        return base64_encode($source);
    }
    
    
    
    //---- STATIC SPECIAL METHODS ----------------------------------------------
    /**
     * Return the MIME type of given image
     * @param String $fileName
     * @return String
     */
    public static function getImageMimeType($fileName) {
        $imageInfo = getimagesize($fileName);
        return (!empty($imageInfo['mime'])) ? $imageInfo['mime'] : null;
    }
    
    
    
    
    //---- SPECIAL METHODS -----------------------------------------------------
    /**
     * Set color
     * @param int $red Value of red component
     * @param int $green Value of green component
     * @param int $blue Value of blue component
     * @param int $alpha A value between 0 and 127; 0 indicates completely opaque while 127 indicates completely transparent
     */
    public function setColor() {
        $color = func_get_args();
        if((count($color) == 1 || count($color) == 2) && $color[0][0] == '#') {
            $hex = str_replace('#', '', $color[0]);
            if(strlen($hex) == 3) {
                $r = hexdec(substr($hex,0,1).substr($hex,0,1));
                $g = hexdec(substr($hex,1,1).substr($hex,1,1));
                $b = hexdec(substr($hex,2,1).substr($hex,2,1));
            } else {
                $r = hexdec(substr($hex,0,2));
                $g = hexdec(substr($hex,2,2));
                $b = hexdec(substr($hex,4,2));
            }
            $this->setColor($r,$g,$b, (empty($color[2])?0:$color[2]));
            return;
        } else if(count($color) == 3 || count($color) == 4) {
            if(empty($color[3])) $color[3] = 0;
            $this->color = imagecolorallocatealpha($this->canvas, $color[0], $color[1], $color[2], $color[3]);
            $this->colorComponents = $color;
        } else {
            die('<br /><b>Canvas error</b>: undefined color');
        }
    }
    
    /**
     * Set the thickness for line drawing
     * @param int $thickness Thickness, in pixels.
     */
    public function setThickness($thickness) {
        imagesetthickness($this->canvas, $thickness);
    }
    
    /**
     * Return width of the canvas
     * @return int
     */
    public function getWidth() {
        return imagesx($this->canvas);
    }
    
    /**
     * Return height of the canvas
     * @return int
     */
    public function getHeight() {
        return imagesy($this->canvas);
    }
    
    /**
     * Turn on or off antialiasing
     * @param boolean $antialiasing
     */
    public function setAntialiasing($antialiasing) {
        imageantialias($this->canvas, $antialiasing);
    }
    
    /**
     * Set font
     * @param String $file font path
     */
    public function setFont($file) {
        if((is_string($file) && file_exists($file)))
            $this->font = imageloadfont($file);
        else
            $this->throwErrorMessage('can not load font from '.$file);
    }
    
    /**
     * Fill the image with selected color
     */
    public function fill() {
        imagefill($this->canvas, 0, 0, $this->color);
    }
    
    
    
    //---- DRAW METHODS --------------------------------------------------------
    /**
     * Draw a line
     * @param int $x1
     * @param int $y1
     * @param int $x2
     * @param int $y2
     */
    public function line($x1, $y1, $x2, $y2) {
        imageline($this->canvas, $x1, $y1, $x2, $y2, $this->color);
    }
    
    /**
     * Draw a rectangle
     * @param int $x1 Upper left x coordinate
     * @param int $y1 Upper left y coordinate 0, 0 is the top left corner of the image
     * @param int $x2 Bottom right x coordinate
     * @param int $y2 Bottom right y coordinate
     */
    public function rectangle($x1, $y1, $x2, $y2) {
        imagerectangle($this->canvas, $x1, $y1, $x2, $y2, $this->color);
    }
    
    /**
     * Draw a polygon
     * @param []int $points An array containing the x and y coordinates of the polygons vertices consecutively
     */
    public function polygon($points) {
        if(count($points) % 2 != 0)
            $this->throwErrorMessage('undefined last y-coordinate of the polygon');
        if(count($points)<6)
            $this->throwErrorMessage('polygon must have at least 3 peaks');
        imagepolygon($this->canvas, $points, count($points)/2, $this->color);
    }
    
    /**
     * Draw an ellipse
     * @param int $cx x-coordinate of the center
     * @param int $cy y-coordinate of the center
     * @param int $width The ellipse width
     * @param int $height The ellipse height
     */
    public function ellipse($cx, $cy, $width, $height) {
        imageellipse($this->canvas, $cx, $cy, $width, $height, $this->color);
    }
    
    /**
     * Draws an arc
     * @param int $cx x-coordinate of the center
     * @param int $cy y-coordinate of the center
     * @param int $width The arc width
     * @param int $height The arc height
     * @param int $start The arc start angle, in degrees
     * @param int $end The arc end angle, in degrees. 0° is located at the three-o'clock position, and the arc is drawn clockwise
     */
    public function arc($cx, $cy, $width, $height, $start, $end) {
        imagearc($this->canvas, $cx, $cy, $width, $height, $start, $end, $this->color);
    }
    
    /**
     * Draw a filled rectangle
     * @param int $x1 Upper left x coordinate
     * @param int $y1 Upper left y coordinate 0, 0 is the top left corner of the image
     * @param int $x2 Bottom right x coordinate
     * @param int $y2 Bottom right y coordinate
     */
    public function filledRectangle($x1, $y1, $x2, $y2) {
        imagefilledrectangle($this->canvas, $x1, $y1, $x2, $y2, $this->color);
    }
    
    /**
     * Draw a filled polygon
     * @param []int $points An array containing the x and y coordinates of the polygons vertices consecutively
     */
    public function filledPolygon($points) {
        if(count($points) % 2 != 0)
            $this->throwErrorMessage('undefined last y-coordinate of the polygon');
        if(count($points)<6)
            $this->throwErrorMessage('polygon must have at least 3 peaks');
        imagefilledpolygon($this->canvas, $points, count($points)/2, $this->color);
    }
    
    /**
     * Draw an filled ellipse
     * @param int $cx x-coordinate of the center
     * @param int $cy y-coordinate of the center
     * @param int $width The ellipse width
     * @param int $height The ellipse height
     */
    public function filledEllipse($cx, $cy, $width, $height) {
        imagefilledellipse($this->canvas, $cx, $cy, $width, $height, $this->color);
    }
    
    /**
     * Draws an filled arc
     * @param int $cx x-coordinate of the center
     * @param int $cy y-coordinate of the center
     * @param int $width The arc width
     * @param int $height The arc height
     * @param int $start The arc start angle, in degrees
     * @param int $end The arc end angle, in degrees. 0° is located at the three-o'clock position, and the arc is drawn clockwise
     * @param int $style A bitwise OR of the following possibilities ARC_PIE, ARC_CHORD, ARC_NOFILL, ARC_EDGED
     */
    public function filledArc($cx, $cy, $width, $height, $start, $end, $style = self::ARC_PIE) {
        imagefilledarc($this->canvas, $cx, $cy, $width, $height, $start, $end, $this->color, $style);
    }
    
    
    
    
    //---- DRAW TEXT METHODS ---------------------------------------------------
    /**
     * Draw a character horizontally
     * @param char $c The character to draw
     * @param int $x x-coordinate of the start
     * @param int $y y-coordinate of the start
     */
    public function writeChar($c, $x, $y) {
        imagechar($this->canvas, $this->font, $x, $y, $c, $this->color);
    }
    
    /**
     * Draw a character vertically
     * @param char $c The character to draw
     * @param int $x x-coordinate of the start
     * @param int $y y-coordinate of the start
     */
    public function writeCharUp($c, $x, $y) {
        imagecharup($this->canvas, $this->font, $x, $y, $c, $this->color);
    }
    
    /**
     * Draw a string horizontally
     * @param String $string The string to be written
     * @param int $x x-coordinate of the upper left corner
     * @param int $y y-coordinate of the upper left corner
     */
    public function writeString($string, $x, $y) {
        imagestring($this->canvas, $this->font, $x, $y, $string, $this->color);
    }
    
    /**
     * Draw a string vertically
     * @param String $string The string to be written
     * @param int $x x-coordinate of the bottom left corner
     * @param int $y y-coordinate of the bottom left corner
     */
    public function writeStringUp($string, $x, $y) {
        imagestringup($this->canvas, $this->font, $x, $y, $string, $this->color);
    }
    
    
    
    
    //---- FLIP, ROTATE, RESIZE METHODS ----------------------------------------
    /**
     * Flips the image image using the given mode.
     * @param int $mode
     */
    public function flip($mode = self::FLIP_VERTICAL) {
        if($mode < 1 || $mode >3)
            $this->throwErrorMessage('flip mode can be just horizontal (1), vertical (2), or both (3)');
        imageflip($this->canvas, $mode);
    }
    
    /**
     * Rotate an image with a given angle
     * @param float $angle Rotation angle, in degrees. The rotation angle is interpreted as the number of degrees to rotate the image anticlockwise.
     */
    public function rotate($angle) {
        $this->canvas = imagerotate($this->canvas, (float)$angle, $this->color);
    }
    
    /**
     * Resize image to new proportions
     * @param int $newWidth
     * @param int $newHeight
     */
    public function resize($newWidth, $newHeight) {
        if($newWidth == null || $newHeight == null) {
            $this->resizeBySide($newWidth, $newHeight);
            return;
        }
        $newCanvas = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newCanvas , $this->canvas, 0, 0, 0, 0, $newWidth, $newHeight, $this->getWidth(), $this->getHeight());
        $this->canvas = $newCanvas;
    }
    
    /**
     * Resize image by percent
     * @param float $percent
     */
    public function resizeByPercent($percent) {
        $this->resize($this->getWidth()*$percent/100.0 , $this->getHeight()*$percent/100.0);
    }
    
    private function resizeBySide($newWidth, $newHeight) {
        if($newWidth == null && $newHeight == null)
            $this->throwErrorMessage('one of given dimensions must be set');
        $ratio = 1;
        if($newWidth != null)
            $ratio = ((float)$newWidth)/((float)$this->getWidth());
        else
            $ratio = ((float)$newHeight)/((float)$this->getHeight());
        $this->resizeByPercent($ratio*100.0);
    }
    
    
    
    
    //---- BRIGHTNESS, CONTRAST ------------------------------------------------    
    /**
     * Set brightness of the canvas
     * @param int $level brightness level (range: -255;+255)
     */
    public function setBrightness($level) {
        if(($level < -255) || ($level > 255))
            $this->throwErrorMessage('brightness level is out of range <small>&lt;-255;+255&gt;</small>');
        imagefilter($this->canvas, IMG_FILTER_BRIGHTNESS, $level);
    }
    
    /**
     * Set contrast of the canvas
     * @param int $level contrast level (range: -100;+100)
     */
    public function setContrast($level) {
        if(($level < -100) || ($level > 100))
            $this->throwErrorMessage('contrast level is out of range <small>&lt;-100;+100&gt;</small>');
        imagefilter($this->canvas, IMG_FILTER_CONTRAST, $level);
    }
    
    
    

    //---- FILTERs -------------------------------------------------------------
    /**
     * Add gray scale filter to the canvas
     */
    public function addGrayScaleFilter() {
        imagefilter($this->canvas, IMG_FILTER_GRAYSCALE); 
    }
    
    /**
     * Add negation filter to the canvas
     */
    public function addNegateFilter() {
        imagefilter($this->canvas, IMG_FILTER_NEGATE);
    }
    
    /**
     * Add color filter to the canvas
     */
    public function addColorFilter() {
        imagefilter($this->canvas, IMG_FILTER_COLORIZE, $this->colorComponents[0], $this->colorComponents[1], $this->colorComponents[2], $this->colorComponents[3]);
    }
    
    /**
     * Highlight edges in the canvas
     */
    public function addEdgeHighlitionFilter() {
        imagefilter($this->canvas, IMG_FILTER_EDGEDETECT);
    }
    
    /**
     * Embosses the canvas
     */
    public function addEmbossFilter() {
        imagefilter($this->canvas, IMG_FILTER_EMBOSS);
    }
    
    /**
     * Blurs the image
     */
    public function addSelectiveBlur() {
        imagefilter($this->canvas, IMG_FILTER_SELECTIVE_BLUR);
    }
    
    /**
     * Blurs the image using the Gaussian method
     */
    public function addGaussianBlur() {
        imagefilter($this->canvas, IMG_FILTER_GAUSSIAN_BLUR);
    }
    
    /**
     * Uses mean removal to achieve a "sketchy" effect
     */
    public function addSketchyEffect() {
        imagefilter($this->canvas, IMG_FILTER_MEAN_REMOVAL);
    }
    
    /**
     * Makes the image smoother
     * @param float $level
     */
    public function addSmoothEffect($level) {
        imagefilter($this->canvas, IMG_FILTER_SMOOTH, $level);
    }
    
    /**
     * Applies pixelation effect to the image
     * @param int $blockSize
     * @param mixed $advancedEffects
     */
    public function addPixelateEffect($blockSize, $advancedEffects = false) {
        if($blockSize < 1)
            $this->throwErrorMessage('block size must be greater as 0');
        imagefilter($this->canvas, IMG_FILTER_PIXELATE, $blockSize, $advancedEffects);
    }
    
    
    
    
    //---- ADVANCED FUNCTIONS --------------------------------------------------
    /**
     * Duplicate canvas
     * @return \self duplicated canvas
     */
    public function duplicateCanvas() {
        $newCanvas = imagecreatetruecolor($this->getWidth(), $this->getHeight());
        imagecopy($newCanvas, $this->canvas, 0, 0, 0, 0, $this->getWidth(), $this->getHeight());
        
        $newInstance = new self();
        $newInstance->canvas = $newCanvas;
        return $newInstance;
    }
    
    /**
     * Add canvas to canvas
     * @param \self $newCanvas
     * @param int $x x-coordinate of destination point
     * @param int $y y-coordinate of destination point
     * @param int $opacity opacity in percent (100% - added canvas will cover the canvas, 0% - added canvas is totally transparent)
     */
    public function addCanvas($newCanvas, $x, $y, $opacity = 100) {
        if(!($newCanvas instanceof self))
            $this->throwErrorMessage('added canvas must be instance of Canvas');
        if($opacity < 0 || $opacity > 100)
            $this->throwErrorMessage('opacity level is out of range <small>&lt;0;100&gt;</small>');
        imagecopymerge($this->canvas, $newCanvas->canvas, $x, $y, 0, 0, $newCanvas->getWidth(), $newCanvas->getHeight(), $opacity);
    }
}
