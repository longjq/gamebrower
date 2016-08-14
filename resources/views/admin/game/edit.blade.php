<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>游戏管理</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://demo.cssmoban.com/cssthemes3/gbts_12_proton/assets/css/style.min.css" rel="stylesheet">
    <link href="http://demo.cssmoban.com/cssthemes3/gbts_12_proton/assets/css/add-ons.min.css" rel="stylesheet">
    <link href="http://demo.cssmoban.com/cssthemes3/gbts_12_proton/assets/plugins/dropzone/css/dropzone.css"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/back.css')  }}">
</head>
<body>

<form action="/admin/games/{{ $item->id }}" method="post" enctype="multipart/form-data" class="form-horizontal">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2><i class="fa fa-indent red"></i><strong>修改游戏</strong></h2>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label class="col-md-3 control-label" for="lang-input">语言</label>

                <div class="col-md-9">
                    <input type="text" id="lang-input" name="lang" class="form-control" value="{{ $item->lang }}">
                    {{--<span class="help-block">输入语言简写</span>--}}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="title-input">游戏</label>

                <div class="col-md-9">
                    <input type="text" id="title-input" name="title" class="form-control" value="{{ $item->title }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="from-input">厂商</label>

                <div class="col-md-9">
                    <input type="text" id="from-input" name="from" class="form-control" value="{{ $item->from }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="hot_base-input">基础热度</label>

                <div class="col-md-9">
                    <input type="text" id="hot_base-input" name="hot_base" class="form-control" value="{{ $item->hot_base }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="hot-input">真实热度</label>

                <div class="col-md-9">
                    <input type="text" id="hot-input" name="hot" class="form-control"
                           value="{{ $item->hot }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="icon_url-input">ICON</label>

                <div class="col-md-9">
                    <img width="60" src="{{ asset($item->icon_url) }}" alt="$item->icon_url">
                    <input type="hidden" value="{{ $item->icon_url }}" name="icon_url">
                    <input type="file" id="icon_url-input" name="icon_url" value="{{ $item->icon_url }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">星级</label>
                <div class="col-md-9">
                    @for($i=0; $i<5;$i++)
                        <label class="radio-inline" for="stars-radio{{ $i+1 }}">
                            <input type="radio" @if($item->stars == ($i+1) ) checked="checked" @endif id="stars-radio{{ $i+1 }}" name="stars" value="{{ $i+1 }}"> {{ $i+1 }}
                        </label>
                    @endfor
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">横/竖屏</label>

                <div class="col-md-9">
                    <label class="radio-inline" for="screen_display-radio1">
                        <input type="radio" id="screen_display-radio1" @if($item->screen_display == '竖屏') checked="checked" @endif name="screen_display" value="0">
                        横屏
                    </label>
                    <label class="radio-inline" for="screen_display-radio2">
                        <input type="radio" id="screen_display-radio2" @if($item->screen_display == '横屏') checked="checked" @endif name="screen_display" value="1"> 竖屏
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">启用</label>

                <div class="col-md-9">
                    <label class="radio-inline" for="open-radio2">
                        <input type="radio" id="open-radio2" @if($item->open == '开启') checked="checked" @endif name="open" value="1"> 开启
                    </label>
                    <label class="radio-inline" for="open-radio1">
                        <input type="radio" id="open-radio1" @if($item->open == '关闭') checked="checked" @endif name="open" value="0"> 关闭
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="recommend-input">推荐</label>

                <div class="col-md-9">
                    <label class="radio-inline" for="recommend-radio1">
                        <input type="radio" id="recommend-radio1" @if($item->recommend == '不推荐') checked="checked" @endif  name="recommend" value="0"> 不推荐
                    </label>
                    <label class="radio-inline" for="recommend-radio2">
                        <input type="radio" id="recommend-radio2" @if($item->recommend == '推荐') checked="checked" @endif name="recommend" value="1"> 推荐
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="path-input">游戏地址</label>

                <div class="col-md-9">
                    <input type="text" id="path-input" name="path" class="form-control"
                           value="{{ $item->path }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="desc-input">备注</label>

                <div class="col-md-9">
                            <textarea id="desc-input" name="desc" rows="9" class="form-control"
                                      placeholder="游戏备注">{{ $item->desc }}</textarea>
                </div>
            </div>


        </div>
        <div class="panel-footer text-center">
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> 保存并返回列表页
            </button>
            <button type="reset" class="btn btn-sm btn-primary"><i class="fa fa-ban"></i> 取消返回列表页</button>
        </div>
    </div>
</form>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    setTimeout(function(){
        $(".alert").fadeOut("slow");
    },3000);

</script>
</body>
</html>