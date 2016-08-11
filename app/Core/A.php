<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/10
 * Time: 23:53
 */

namespace App\Core;


use Illuminate\Http\Request;

class A
{
    private static $content = null;
    private static $responseContent = null;

    public static function getDecodedContent(Request $request){
        if (self::$content == null) {
            return $request->getContent();
        }
        return self::$content;
    }

    public static function getResponseContent(){
        return self::$responseContent;
    }

    public static function setResponseContent($rc) {
        self::$responseContent = $rc;
    }

    public static function setDecodedContent($c){
        self::$content = $c;
    }
}