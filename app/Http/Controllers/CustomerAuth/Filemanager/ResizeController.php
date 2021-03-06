<?php
namespace App\Http\Controllers\CustomerAuth\Filemanager;

use Image, File, Request;

/**
 * Class ResizeController
 * @package Unisharp\Laravelfilemanager\controllers
 */
class ResizeController extends LfmController
{

    /**
     * Dipsplay image for resizing
     *
     * @return mixed
     */
    public function getResize()
    {
        $ratio = 1.0;
        $image = Request::get('img');

        $path_to_image = parent::getPath('directory') . $image;
        $original_width = Image::make($path_to_image)->width();
        $original_height = Image::make($path_to_image)->height();

        $scaled = false;

        if ($original_width > 600) {
            $ratio = 600 / $original_width;
            $width = $original_width * $ratio;
            $height = $original_height * $ratio;
            $scaled = true;
        } else {
            $width = $original_width;
            $height = $original_height;
        }

        if ($height > 400) {
            $ratio = 400 / $original_height;
            $width = $original_width * $ratio;
            $height = $original_height * $ratio;
            $scaled = true;
        }

        return view('customer.filemanager.resize')
            ->with('img', parent::getUrl('directory') . $image)
            ->with('height', number_format($height, 0))
            ->with('width', $width)
            ->with('original_height', $original_height)
            ->with('original_width', $original_width)
            ->with('scaled', $scaled)->with('ratio', $ratio);
    }


    public function performResize()
    {
        $img = Request::get('img');
        $dataX = Request::get('dataX');
        $dataY = Request::get('dataY');
        $height = Request::get('dataHeight');
        $width = Request::get('dataWidth');

        try {
            Image::make(public_path() . $img)->resize($width, $height)->save();
            return "OK";
        } catch (Exception $e) {
            return "width : " . $width . " height: " . $height;
            return $e;
        }

    }

}
