<?php

namespace App\Events;

class FolderWasRenamed
{
    /**
     * FolderWasRenamed constructor.
     * @param $old_path
     * @param $new_path
     */

    public function __construct($old_path, $new_path)
    {
        $this->old_path = $old_path;
        $this->new_path = $new_path;
    }

    /**
     * @return string
     */
    public function old_path()
    {
        return $this->old_path;
    }

    /**
     * @return string
     */
    public function new_path()
    {
        return $this->new_path;
    }

}
