<?php
class Rectangle
{
    public $length;
    public $width;
    public function area($length,$width)
    {
        echo "Area is ".$length*$width;
    }
}
    $r=new Rectangle();
    $r->area(10,5);
