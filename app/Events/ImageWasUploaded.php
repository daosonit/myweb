<?php

namespace App\Events;

class ImageWasUploaded
{
    private $path;

    /**
     * ImageWasUploaded constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function path()
    {
        return $this->path;
    }

}
