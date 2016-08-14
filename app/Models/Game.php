<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';
    protected $guarded = ['id'];

    public function getScreenDisplayAttribute($value)
    {
        // 0=竖屏，1=横屏
        $map = ['竖屏','横屏'];
        return $map[$value];
    }

    public function getOpenAttribute($value)
    {
        $map = ['关闭','开启'];
        return $map[$value];
    }

    public function getRecommendAttribute($value)
    {
        $map = ['不推荐','推荐'];
        return $map[$value];
    }
}
