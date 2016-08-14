<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/14
 * Time: 21:44
 */

namespace App\Core;


class Upload
{
    public static function save($file, $path)
    {
        if (is_null($file)) {
            return false;
        }
        try{
            $file->move($path, $file->getClientOriginalName());
            return $path.$file->getClientOriginalName();
        }catch (\Exception $e){
            return null;
        }
    }
}