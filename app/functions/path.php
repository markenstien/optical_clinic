<?php

    function _path_public($args)
    {
        return 	PATH_PUBLIC.URL_SEPERATOR.$args;
    }


    function _path_asset($args = null)
    {
        if(is_null($args))
            return PATH_PUBLIC.URL_SEPERATOR.'assets';
        return PATH_PUBLIC.URL_SEPERATOR.'assets'.URL_SEPERATOR.$args;
    }


    function _path_tmp($args)
    {
        if(is_null($args))
            return PATH_PUBLIC.URL_SEPERATOR.'tmp/sbadmin';
        return PATH_PUBLIC.URL_SEPERATOR.'tmp/'.$args;
    }


    function _path_vendor($args)
    {
        if(is_null($args))
            return PATH_PUBLIC.URL_SEPERATOR.'vendor';
        return PATH_PUBLIC.URL_SEPERATOR.'vendor'.URL_SEPERATOR.$args;
    }

    function _path_base($args = null)
    {
        if(is_null($args))
            return PATH_PUBLIC;
        return PATH_PUBLIC.URL_SEPERATOR.$args;
    }


    function _path_third_party($args)
    {
        return PATH_PUBLIC.URL_SEPERATOR.'thirdparty'.URL_SEPERATOR.$args;
    }

    function url_link($args)
    {
      return URL.'/'.$args;
    }



    function _path_upload_get($args = null)
    {
        $path = GET_PATH_UPLOAD;

        $path = str_replace(DS, '/', $path);

        return $path.'/'.$args;
    }

