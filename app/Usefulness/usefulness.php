<?php

if (! function_exists('asset_customer')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool    $secure
     * @return string
     */
    function asset_customer($path, $secure = null)
    {
        return asset('customer/'.$path, $secure);
    }
}