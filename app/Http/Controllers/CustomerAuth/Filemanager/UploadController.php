<?php
namespace App\Http\Controllers\CustomerAuth\Filemanager;


use Illuminate\Support\Str;
use Lang, Image, File, Request, Config, Event;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Events\ImageWasUploaded;

/**
 * Class UploadController
 * @package Unisharp\Laravelfilemanager\controllers
 */
class UploadController extends LfmController
{

    private $default_file_types  = ['application/pdf'];
    private $default_image_types = ['image/jpeg', 'image/png', 'image/gif'];

    /**
     * Upload an image/file and (for images) create thumbnail
     *
     * @param UploadRequest $request
     * @return string
     */
    public function upload()
    {
        try {
            $res = $this->uploadValidator();
            if (true !== $res) {
                return Lang::get('.error-invalid');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        $file = Request::file('upload');

        $new_filename = $this->getNewName($file);

        $dest_path = parent::getPath('directory');

        if (File::exists($dest_path . $new_filename)) {
            return Lang::get('.error-file-exist');
        }

        $file->move($dest_path, $new_filename);

        if ('Images' === $this->file_type) {
            $this->makeThumb($dest_path, $new_filename);
        }

        Event::fire(new ImageWasUploaded(realpath($dest_path . '/' . $new_filename)));

        // upload via ckeditor 'Upload' tab
        if (!Request::has('show_list')) {
            return $this->useFile($new_filename);
        }

        return 'OK';
    }

    private function uploadValidator()
    {
        // when uploading a file with the POST named "upload"

        $expected_file_type = $this->file_type;
        $is_valid = false;

        $file = Request::file('upload');

        if (empty($file)) {
            throw new \Exception(Lang::get('.error-file-empty'));
        } elseif (!$file instanceof UploadedFile) {
            throw new \Exception(Lang::get('.error-instance'));
        } elseif ($file->getError() == UPLOAD_ERR_INI_SIZE) {
            $max_size = ini_get('upload_max_filesize');
            throw new \Exception(Lang::get('.error-file-size', ['max' => $max_size]));
        } elseif ($file->getError() != UPLOAD_ERR_OK) {
            dd('File failed to upload. Error code: ' . $file->getError());
        }

        $mimetype = $file->getMimeType();

        if ($expected_file_type === 'Files') {
            $config_name = 'lfm.valid_file_mimetypes';
            $valid_mimetypes = Config::get($config_name, $this->default_file_types);
        } else {
            $config_name = 'lfm.valid_image_mimetypes';
            $valid_mimetypes = Config::get($config_name, $this->default_image_types);
        }

        if (!is_array($valid_mimetypes)) {
            throw new \Exception('Config : ' . $config_name . ' is not set correctly');
        }

        if (in_array($mimetype, $valid_mimetypes)) {
            $is_valid = true;
        }

        if (false === $is_valid) {
            throw new \Exception(Lang::get('.error-mime') . $mimetype);
        }
        return $is_valid;
    }

    private function getNewName($file)
    {
        $new_filename = trim(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));

        if (Config::get('lfm.rename_file') === true) {
            $new_filename = uniqid();
        } elseif (Config::get('lfm.alphanumeric_filename') === true) {
            $new_filename = preg_replace('/[^A-Za-z0-9\-\']/', '_', $new_filename);
        }

        $new_filename = $new_filename . '.' . $file->getClientOriginalExtension();

        return $new_filename;
    }

    private function makeThumb($dest_path, $new_filename)
    {
        $thumb_folder_name = Config::get('lfm.thumb_folder_name');

        if (!File::exists($dest_path . $thumb_folder_name)) {
            File::makeDirectory($dest_path . $thumb_folder_name);
        }

        $thumb_img = Image::make($dest_path . $new_filename);
        $thumb_img->fit(200, 200)
            ->save($dest_path . $thumb_folder_name . '/' . $new_filename);
        unset($thumb_img);
    }

    private function useFile($new_filename)
    {
        $file = parent::getUrl('directory') . $new_filename;

        return "<script type='text/javascript'>

        function getUrlParam(paramName) {
            var reParam = new RegExp('(?:[\?&]|&)' + paramName + '=([^&]+)', 'i');
            var match = window.location.search.match(reParam);
            return ( match && match.length > 1 ) ? match[1] : null;
        }

        var funcNum = getUrlParam('CKEditorFuncNum');

        var par = window.parent,
            op = window.opener,
            o = (par && par.CKEDITOR) ? par : ((op && op.CKEDITOR) ? op : false);

        if (op) window.close();
        if (o !== false) o.CKEDITOR.tools.callFunction(funcNum, '$file');
        </script>";
    }

}
