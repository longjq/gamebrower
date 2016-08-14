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
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">列表</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">新增</a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">
        <div class="panel panel-default long-pannel">
            <div class="panel-heading">
                <h2><i class="fa fa-indent red"></i><strong>操作</strong></h2>
            </div>
            <div class="panel-body">
                <form class="form-inline" method="get" action="/admin/games">
                    <div class="form-group">
                        <label for="if-id" class="sr-only">id</label>
                        <input type="text" placeholder="ID" class="form-control" name="id" id="if-id">
                    </div>
                    <div class="form-group">
                        <label for="if-title" class="sr-only">title</label>
                        <input type="text" placeholder="游戏" class="form-control" name="title" id="if-title">
                    </div>
                    <div class="form-group">
                        <label for="if-from" class="sr-only">from</label>
                        <input type="text" placeholder="厂商" class="form-control" name="from" id="if-from">
                    </div>
                    <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-dot-circle-o"></i> 查询</button>
                </form>
            </div>
            <!-- <div class="panel-footer">
                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-dot-circle-o"></i> 新增</button>
                <button class="btn btn-sm btn-danger" type="reset"><i class="fa fa-ban"></i> 批量删除</button>
            </div>-->
        </div>
        @if(!is_null(session('upload_result_class')))
            <div class="alert alert-{{ session('upload_result_class') }}" role="alert">{{ session('upload_result') }}</div>
        @endif
        <div class="panel panel-default long-pannel">
            <div class="panel-heading">
                <h2><i class="fa fa-table red"></i><span class="break"></span><strong>游戏列表</strong></h2>

                <div class="panel-actions">
                    {{--<a class="btn-setting" href="table.html#"><i class="fa fa-rotate-right"></i></a>--}}
                    {{--<a class="btn-minimize" href="table.html#"><i class="fa fa-chevron-up"></i></a>--}}
                    {{--<a class="btn-close" href="table.html#"><i class="fa fa-times"></i></a>--}}
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-condensed table-hover long-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>语言</th>
                        <th>游戏</th>
                        <th>厂商</th>
                        <th>基础热度</th>
                        <th>实际热度</th>
                        <th>ICON</th>
                        <th>星级</th>
                        <th>横/竖屏</th>
                        <th>启用</th>
                        <th>推荐</th>
                        <th>地址</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td data-type="text" data-value="{{ $item->lang }}" class="long-td-edit" data-id="{{ $item->id }}">{{ $item->lang }}</td>
                            <td data-type="text" data-value="{{ $item->title }}" class="long-td-edit" data-id="{{ $item->id }}">{{ $item->title }}</td>
                            <td data-type="text" data-value="{{ $item->from }}" class="long-td-edit" data-id="{{ $item->id }}">{{ $item->from }}</td>
                            <td data-type="text" data-value="{{ $item->hot_base }}" class="long-td-edit" data-id="{{ $item->id }}">{{ $item->hot_base }}</td>
                            <td data-type="text" data-value="{{ $item->hot }}" class="long-td-edit" data-id="{{ $item->id }}">{{ $item->hot }}</td>
                            <td data-type="file" data-value="{{ $item->icon_url }}" class="long-td-edit" data-id="{{ $item->id }}"><img src="{{ $item->icon_url }}" width="60" height="60" alt=""></td>
                            <td data-type="select" data-value="{{ $item->stars }}" class="long-td-edit" data-id="{{ $item->id }}">{{ $item->stars }}</td>
                            <td data-type="select" data-value="{{ $item->screen_display }}" class="long-td-edit" data-id="{{ $item->id }}"><span class="label label-success">{{ $item->screen_display }}</span></td>
                            <td data-type="select" data-value="{{ $item->open }}" class="long-td-edit" data-id="{{ $item->id }}"><span class="label label-danger">{{ $item->open }}</span></td>
                            <td data-type="select" data-value="{{ $item->recommend }}" class="long-td-edit" data-id="{{ $item->id }}"><span class="label label-info">{{ $item->recommend }}</span></td>
                            <td data-type="text" data-value="{{ $item->path }}" class="long-td-edit" data-id="{{ $item->id }}"><a href="{{ $item->path }}" title="{{ $item->path }}">点击访问</a></td>
                            <td><a href="/admin/games/{{ $item->id }}/edit" class="btn btn-primary">修改</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="panel-footer long-pannel-footer">
                {!! $items->render() !!}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="profile">
        <form action="/admin/games" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><i class="fa fa-indent red"></i><strong>新增游戏</strong></h2>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="lang-input">语言</label>

                        <div class="col-md-9">
                            <input type="text" id="lang-input" name="lang" class="form-control" placeholder="输入语言简写">
                            {{--<span class="help-block">输入语言简写</span>--}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="title-input">游戏</label>

                        <div class="col-md-9">
                            <input type="text" id="title-input" name="title" class="form-control" placeholder="输入游戏名称">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="from-input">厂商</label>

                        <div class="col-md-9">
                            <input type="text" id="from-input" name="from" class="form-control" placeholder="制作商名称">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="hot_base-input">基础热度</label>

                        <div class="col-md-9">
                            <input type="text" id="hot_base-input" name="hot_base" class="form-control" placeholder="基础热度数值">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="hot-input">真实热度</label>

                        <div class="col-md-9">
                            <input type="text" id="hot-input" name="hot" class="form-control"
                                   placeholder="真实热度数值">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="icon_url-input">ICON</label>

                        <div class="col-md-9">
                            <input type="file" id="icon_url-input" name="icon_url">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">星级</label>

                        <div class="col-md-9">
                            <label class="radio-inline" for="stars-radio1">
                                <input type="radio" id="stars-radio1" name="stars" value="1"> 1
                            </label>
                            <label class="radio-inline" for="stars-radio2">
                                <input type="radio" id="stars-radio2" name="stars" value="2"> 2
                            </label>
                            <label class="radio-inline" for="stars-radio3">
                                <input type="radio" id="stars-radio3" checked="checked" name="stars" value="3"> 3
                            </label>
                            <label class="radio-inline" for="stars-radio4">
                                <input type="radio" id="stars-radio4" name="stars" value="4"> 4
                            </label>
                            <label class="radio-inline" for="stars-radio5">
                                <input type="radio" id="stars-radio5" name="stars" value="5"> 5
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">横/竖屏</label>

                        <div class="col-md-9">
                            <label class="radio-inline" for="screen_display-radio1">
                                <input type="radio" id="screen_display-radio1" checked name="screen_display" value="0">
                                横屏
                            </label>
                            <label class="radio-inline" for="screen_display-radio2">
                                <input type="radio" id="screen_display-radio2" name="screen_display" value="1"> 竖屏屏
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">启用</label>

                        <div class="col-md-9">
                            <label class="radio-inline" for="open-radio2">
                                <input type="radio" id="open-radio2" checked name="open" value="1"> 启用
                            </label>
                            <label class="radio-inline" for="open-radio1">
                                <input type="radio" id="open-radio1" name="open" value="0"> 关闭
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="recommend-input">推荐</label>

                        <div class="col-md-9">
                            <label class="radio-inline" for="recommend-radio1">
                                <input type="radio" id="recommend-radio1" checked name="recommend" value="0"> 不推荐
                            </label>
                            <label class="radio-inline" for="recommend-radio2">
                                <input type="radio" id="recommend-radio2" name="recommend" value="1"> 推荐
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="path-input">游戏地址</label>

                        <div class="col-md-9">
                            <input type="text" id="path-input" name="path" class="form-control"
                                   placeholder="游戏地址">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="desc-input">备注</label>

                        <div class="col-md-9">
                            <textarea id="desc-input" name="desc" rows="9" class="form-control"
                                      placeholder="游戏备注"></textarea>
                        </div>
                    </div>


                </div>
                <div class="panel-footer text-center">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> 保存并返回列表页
                    </button>
                    <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> 清空</button>
                </div>
            </div>
        </form>
    </div>

</div>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    setTimeout(function(){
        $(".alert").fadeOut("slow");
    },3000);

</script>
</body>
</html>