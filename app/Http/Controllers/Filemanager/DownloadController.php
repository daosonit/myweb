<?php
namespace App\Http\Controllers\Filemanager;

use Request, Response;

/**
 * Class DownloadController
 * @package Unisharp\Laravelfilemanager\controllers
 */
class DownloadController extends LfmController
{
    /**
     * Download a file
     *
     * @return mixed
     */
    public function getDownload()
    {
        return Response::download(parent::getPath('directory') . Request::get('file'));
    }

}
