<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('channel',20)->nullable()->comment('渠道');
            $table->string('v',10)->nullable()->comment('版本');
            $table->string('area',10)->nullable()->comment('地区');
            $table->string('os',10)->nullable()->comment('系统');
            $table->string('lang',10)->nullable()->comment('语言');
            $table->string('device',10)->nullable()->comment('设备');
            $table->string('brand',30)->nullable()->comment('品牌');
            $table->string('net',30)->nullable()->comment('wifi');
            $table->string('imei',30)->nullable()->comment('imei');
            $table->string('imsi',30)->nullable()->comment('imsi');
            $table->string('mo',20)->nullable()->comment('手机号');
            $table->tinyInteger('root')->default(0)->comment('root')->nullable();
            $table->string('tz',10)->nullable()->comment('时区');
            $table->string('oper',10)->nullable()->comment('oper');
            $table->string('mac',30)->nullable()->comment('mac');
            $table->string('ua',100)->nullable()->comment('用户代理');
            $table->string('ov',10)->nullable()->comment('安卓版本');
            $table->integer('sw')->nullable()->comment('宽度');
            $table->integer('sh')->nullable()->comment('高度');
            $table->string('mem',20)->nullable()->comment('内存');
            $table->string('cpu',20)->nullable()->comment('CPU');
            $table->string('sdcard',20)->nullable()->comment('SD');
            $table->string('ip',20)->nullable()->comment('IP');
            $table->nullableTimestamps();
        });

        Schema::create('google_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid',10)->comment('用户ID');
            $table->string('google_token')->comment('GoogleToken');
            $table->nullableTimestamps();
        });

        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('lang')->default(0)->comment('语言');
            $table->string('title',50)->comment('游戏');
            $table->integer('hot_base')->default(0)->comment('热度基数');
            $table->integer('hot')->default(0)->comment('热度');
            $table->string('icon_url')->comment('ICON');
            $table->tinyInteger('stars')->default(3)->comment('星级');
            $table->tinyInteger('screen_display')->default('0')->comment('显示方式');
            $table->tinyInteger('open')->default(1)->comment('启用');
            $table->tinyInteger('recommend')->default(0)->comment('推荐');
            $table->string('desc')->nullable()->comment('描述');
            $table->string('path')->comment('地址');
            $table->nullableTimestamps();
        });

        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id')->comment('游戏ID');
            $table->string('game_url')->comment('游戏地址');
            $table->string('pic_path')->comment('banner地址');
            $table->tinyInteger('pic_postion')->comment('位置');
            $table->nullableTimestamps();
        });

        Schema::create('share_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->comment('用户ID');
            $table->tinyInteger('share_type')->comment('分享类型');
            $table->integer('game_id')->comment('游戏ID');
            $table->string('title',50)->comment('游戏名称');
            $table->string('target',30)->comment('分享目的地');
            $table->timestamp('share_time')->nullable()->comment('分享地址');
            $table->nullableTimestamps();
        });

        Schema::create('event_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('channel',20)->comment('渠道');
            $table->integer('event_id')->comment('事件ID');
            $table->integer('uid')->comment('用户ID');
            $table->tinyInteger('event_type')->comment('事件类型，1=打开应用，2=关闭应用，3=玩游戏，4=结束玩游戏，5=打开关闭应用，6=打开关闭游戏');
            $table->integer('game_id')->comment('分享游戏，event_type=3,4,6时才填写');
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable()
                ->comment('结束时间，event_type=5,6时才填写');
            $table->timestamp('play_time')->nullable();
            $table->string('net')->comment('联网');
            $table->nullableTimestamps();
        });

        Schema::create('versions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ver');
            $table->string('desc');
            $table->string('url');
            $table->nullableTimestamps();
        });

        Schema::create('web_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('value');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('game_users');
        Schema::drop('google_tokens');
        Schema::drop('games');
        Schema::drop('banners');
        Schema::drop('share_logs');
        Schema::drop('event_logs');
        Schema::drop('versions');
        Schema::drop('web_configs');
    }
}
