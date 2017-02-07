<?php
namespace App\Http\Controllers\CustomerAuth\Filemanager;

use Lang, Config, File, Request, Event;
use App\Events\ImageWasRenamed;
use App\Events\FolderWasRenamed;

/**
 * Class RenameController
 * @package Unisharp\Laravelfilemanager\controllers
 */
class RenameController extends LfmController
{

    /**
     * @return string
     */
    public function getRename()
    {
        $old_name = Request::get('file');
        $new_name = trim(Request::get('new_name'));

        $file_path = parent::getPath('directory');
        $thumb_path = parent::getPath('thumb');

        $old_file = $file_path . $old_name;

        if (!File::isDirectory($old_file)) {
            $extension = File::extension($old_file);
            $new_name = str_replace('.' . $extension, '', $new_name) . '.' . $extension;
        }

        $new_file = $file_path . $new_name;

        if (Config::get('lfm.alphanumeric_directory') && preg_match('/[^\w-]/i', $new_name)) {
            return 'Tên thư mục không hợp lệ';
        } elseif (File::exists($new_file)) {
            return 'Thư mục đã tồn tại';
        }

        if (File::isDirectory($old_file)) {
            File::move($old_file, $new_file);
            Event::fire(new FolderWasRenamed($old_file, $new_file));
            return 'OK';
        }

        File::move($old_file, $new_file);

        if ('Images' === $this->file_type) {
            File::move($thumb_path . $old_name, $thumb_path . $new_name);
        }

        Event::fire(new ImageWasRenamed($old_file, $new_file));

        return 'OK';
    }
}
