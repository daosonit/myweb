<?php
namespace App\Libraries\Image;

interface ImageInterface
{
    public function make($option = array());

    public function save($path);

    public function fileName();

    public function error();

    public function delete($image);
}

?>