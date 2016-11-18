<?php
namespace App\Libraries\Image;

use Config, Storage, Image;

class UploadImage implements ImageInterface
{
    protected $request       = null; //Request file
    protected $prefix_size   = array();
    protected $first_name    = ''; //first name file
    protected $file_name     = '';
    protected $message_error = array();
    protected $error         = false;
    protected $path          = '';

    /**
     * @param array $option
     * @return $this
     */
    public function make($option = array())
    {
        $this->path = array_get($option, 'path', '');
        $this->prefix_size = array_get($option, 'prefix_size', []);
        $this->first_name = array_get($option, 'first_name', '');

        return $this;
    }

    /**
     * @param $request
     */
    public function save($request)
    {
        $this->request = $request;

        $image_origin = Image::make($this->request);

        $path = $this->path($this->path);
        $this->checkFileSize($image_origin);
        $this->file_name = $this->fileName();

        if (!$this->error) {
            foreach ($this->prefix_size as $prefix => $size) {
                $full_path = $path . $prefix . '_' . $this->file_name;

                $width_crop = (isset($size['w'])) ? $size['w'] : 0;
                $height_crop = (isset($size['h'])) ? $size['h'] : 0;

                $crop_size = $this->getSizeCrop($image_origin, $width_crop, $height_crop);

                $image_new = $image_origin;

                $image_new->crop($crop_size['width'], $crop_size['height'], 0, 0)->resize($width_crop, $height_crop);

                Storage::put($full_path, $image_new->stream()->__toString(), 'public');
            }
        }
    }

    /**
     * @param $image_origin
     * @param $width_crop
     * @param $height_crop
     * @return array
     */
    public function getSizeCrop($image_origin, $width_crop, $height_crop)
    {
        $width_img = $image_origin->width();
        $height_img = $image_origin->height();

        $set_size = function ($ratio) use ($width_crop, $height_crop) {
            return array('width'  => $width_crop * $ratio,
                         'height' => $height_crop * $ratio);
        };

        if (($width_img / $width_crop) > ($height_img / $height_crop)) {
            $ratio = floor($height_img / $height_crop);
            $data_return = $set_size($ratio);
        } elseif (($width_img / $width_crop) < ($height_img / $height_crop)) {
            $ratio = floor($width_img / $width_crop);
            $data_return = $set_size($ratio);
        } else {
            $data_return = array('width'  => $width_img,
                                 'height' => $height_img);
        }

        return $data_return;
    }

    /**
     * @return string
     */
    public function fileName()
    {
        if ($this->file_name == '') {
            $this->file_name = $this->createName();
        }

        return $this->file_name;
    }

    /**
     * @return array
     */
    public function error()
    {
        return $this->message_error;
    }

    /**
     * @param $image
     */
    public function delete($image)
    {
        $path = $this->path($this->path);

        foreach ($this->prefix_size as $prefix => $size) {
            $full_path = $path . $prefix . '_' . $image;

            if (Storage::exists($full_path)) {
                Storage::delete($full_path);
            }
        }

    }

    /**
     * @param $path
     * @return string
     */
    private function path($path)
    {
        return str_finish($path, '/');
    }

    /**
     * @return string
     */
    private function createName()
    {
        if (empty($this->first_name)) {
            return str_random(4) . time() . '.' . $this->request->getClientOriginalExtension();
        } else {
            return $this->first_name . time() . '.' . $this->request->getClientOriginalExtension();
        }
    }

    /**
     * @param $image_origin
     */
    private function checkFileSize($image_origin)
    {
        $max_size = Config::get('upload_image.maxSize');

        if ($this->request->getClientSize() > $max_size) {
            $this->message_error[] = 'Size ảnh quá lớn.';
            $this->error = true;
        }

        if (!$this->error) {
            $width_img = $image_origin->width();
            $height_img = $image_origin->height();

            foreach ($this->prefix_size as $prefix => $size) {
                if (isset($size['w']) && isset($size['h'])) {
                    if ($width_img < $size['w'] && $height_img < $size['h']) {
                        $this->message_error[] = 'Origin image size is smaller than the crop image.';
                        $this->error = true;
                        break;
                    }
                } else {
                    $this->message_error[] = 'Initialize parameter fail.';
                    $this->error = true;
                    break;
                }
            }
        }
    }

}

?>