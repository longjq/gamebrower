<?php
/**
 * Created by PhpStorm.
 * User: longjq
 * Date: 2016/7/22
 * Time: 13:08
 */

namespace App\Core;


class FileHelper
{
    public static function getDirectorySize($path)
    {
        $totalsize = 0;
        $totalcount = 0;
        $dircount = 0;
        if ($handle = opendir ($path))
        {
            while (false !== ($file = readdir($handle)))
            {
                $nextpath = $path . '/' . $file;
                if ($file != '.' && $file != '..' && !is_link ($nextpath))
                {
                    if (is_dir ($nextpath))
                    {
                        $dircount++;
                        $result = self::getDirectorySize($nextpath);
                        $totalsize += $result['size'];
                        $totalcount += $result['count'];
                        $dircount += $result['dircount'];
                    }
                    elseif (is_file ($nextpath))
                    {
                        $totalsize += filesize ($nextpath);
                        $totalcount++;
                    }
                }
            }
        }
        closedir ($handle);
        $total['size'] = $totalsize;
        $total['count'] = $totalcount;
        $total['dircount'] = $dircount;
        return $total;
    }

    // 单位自动转换函数
    public static function getRealSize($size)
    {
        $sizeStr='';
        if($size<1024)
        {
            return $size." bytes";
        }
        else if($size<(1024*1024))
        {
            $size=round($size/1024,1);
            return $size." KB";
        }
        else if($size<(1024*1024*1024))
        {
            $size=round($size/(1024*1024),1);
            return $size." MB";
        }
        else
        {
            $size=round($size/(1024*1024*1024),1);
            return $size." GB";
        }
    }
}