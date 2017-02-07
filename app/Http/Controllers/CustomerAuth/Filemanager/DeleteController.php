<?php
namespace App\Http\Controllers\CustomerAuth\Filemanager;

use Lang, Config, File, Request, Event, Image;
use App\Events\ImageWasDeleted;

/**
 * Class CropController
 * @package Unisharp\Laravelfilemanager\controllers
 */
class DeleteController extends LfmController
{

    /**
     * Delete image and associated thumbnail
     *
     * @return mixed
     */
    public function getDelete()
    {
        $name_to_delete = Request::get('items');

        $file_path = parent::getPath('directory');

        $file_to_delete = $file_path . $name_to_delete;
        $thumb_to_delete = parent::getPath('thumb') . $name_to_delete;

        if (!File::exists($file_to_delete)) {
            return $file_to_delete . ' not found!';
        }

        if (File::isDirectory($file_to_delete)) {
            if (sizeof(File::files($file_to_delete)) != 0) {
                return Lang::get('lfm.error-delete');
            }

            File::deleteDirectory($file_to_delete);

            return 'OK';
        }

        File::delete($file_to_delete);
        Event::fire(new ImageWasDeleted($file_to_delete));

        if ('Images' === $this->file_type) {
            File::delete($thumb_to_delete);
        }

        return 'OK';
    }

}
