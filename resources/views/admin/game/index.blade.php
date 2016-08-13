<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>hello world</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://demo.cssmoban.com/cssthemes3/gbts_12_proton/assets/css/style.min.css" rel="stylesheet">
    <link href="http://demo.cssmoban.com/cssthemes3/gbts_12_proton/assets/css/add-ons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/back.css')  }}">
</head>
<body>

<div class="panel panel-default long-pannel">
    <div class="panel-heading">
        <h2><i class="fa fa-indent red"></i><strong>操作</strong></h2>
    </div>
    <div class="panel-body">
        <form class="form-inline" method="get" action="/admin/games">
            <div class="form-group">
                <label for="if-id" class="sr-only">id</label>
                <input type="text" placeholder="ID" class="form-control" name="where[id]" id="if-id">
            </div>
            <div class="form-group">
                <label for="if-title" class="sr-only">title</label>
                <input type="text" placeholder="游戏" class="form-control" name="where[title]" id="if-title">
            </div>
            <div class="form-group">
                <label for="if-from" class="sr-only">from</label>
                <input type="text" placeholder="厂商" class="form-control" name="where[from]" id="if-from">
            </div>
            <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-dot-circle-o"></i> 查询</button>
        </form>
    </div>
    <div class="panel-footer">
        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-dot-circle-o"></i> 新增</button>
        <button class="btn btn-sm btn-danger" type="reset"><i class="fa fa-ban"></i> 批量删除</button>
    </div>
</div>
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
        <table class="table table-condensed long-table">
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
                <th>横屏</th>
                <th>启用</th>
                <th>推荐</th>
                <th>地址</th>
                <th>容量</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->lang }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->from }}</td>
                    <td>{{ $item->hot_base }}</td>
                    <td>{{ $item->hot }}</td>
                    <td><img src="{{ $item->icon_url }}" width="60" height="60" alt=""></td>
                    <td>{{ $item->stars }}</td>
                    <td>{{ $item->screen_display }}</td>
                    <td>{{ $item->open }}</td>
                    <td>{{ $item->recommend }}</td>
                    <td><a href="{{ $item->path }}" title="{{ $item->path }}">点击访问</a></td>
                    <td>{{ $item->size }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{--<ul class="pagination">--}}
            {{--<li><a href="table.html#">Prev</a></li>--}}
            {{--<li class="active">--}}
                {{--<a href="table.html#">1</a>--}}
            {{--</li>--}}
            {{--<li><a href="table.html#">2</a></li>--}}
            {{--<li><a href="table.html#">3</a></li>--}}
            {{--<li><a href="table.html#">4</a></li>--}}
            {{--<li><a href="table.html#">5</a></li>--}}
            {{--<li><a href="table.html#">Next</a></li>--}}
        {{--</ul>--}}
    </div>
    <div class="panel-footer long-pannel-footer">
        {!! $items->render() !!}
    </div>
</div>

<!--<div class="box-search">
    <h2 class="title">
        搜索
    </h2>

    <form action="">
        时间：<input type="text">
        时间：<input type="text">
        时间：
        <select class="select_2" name="posids" style="width:70px;">
            <option value="" selected="">全部</option>
            <option value="1">推荐</option>
            <option value="2">不推荐</option>
        </select>
        <input type="submit" value="搜索">
    </form>
</div>

<div class="box-table">
    <table class="table">
        <thead>
        <tr>
            <th>序号</th>
            <th>语言</th>
            <th>游戏</th>
            <th>厂商</th>
            <th>基础热度</th>
            <th>实际热度</th>
            <th>ICON</th>
            <th>星级</th>
            <th>横屏</th>
            <th>启用</th>
            <th>推荐</th>
            <th>地址</th>
            <th>容量</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->lang }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->from }}</td>
                <td>{{ $item->hot_base }}</td>
                <td>{{ $item->hot }}</td>
                <td><img src="{{ $item->icon_url }}" width="60" height="60" alt=""></td>
                <td>{{ $item->stars }}</td>
                <td>{{ $item->screen_display }}</td>
                <td>{{ $item->open }}</td>
                <td>{{ $item->recommend }}</td>
                <td><a href="{{ $item->path }}">{{ $item->path }}</a></td>
                <td>{{ $item->size }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
-->
<!-- <div class="box-options"> -->
<!--    <label class="mr20"><input type="checkbox" class="J_check_all" data-direction="y"
                               data-checklist="J_check_y">全选</label>
    <button class="btn J_ajax_submit_btn" type="submit"
            data-action="http://localhost/shuipfcms/index.php?m=Content&amp;a=listorder&amp;catid=16">排序
    </button>
    <button class="btn J_ajax_submit_btn" type="submit"
            data-action="http://localhost/shuipfcms/index.php?m=Content&amp;a=public_check&amp;catid=16">审核
    </button>
    <button class="btn J_ajax_submit_btn" type="submit"
            data-action="http://localhost/shuipfcms/index.php?m=Content&amp;a=public_nocheck&amp;catid=16">取消审核
    </button>
    <button class="btn J_ajax_submit_btn" type="submit"
            data-action="http://localhost/shuipfcms/index.php?m=Content&amp;a=delete&amp;catid=16">删除
    </button>
    <button class="btn" type="button" onclick="pushs()">推送</button>
    <button class="btn" type="button" id="J_Content_remove">批量移动</button>
    <button class="btn J_ajax_submit_btn" type="submit"
            data-action="http://localhost/shuipfcms/index.php?m=Createhtml&amp;a=batch_show&amp;catid=16&amp;steps=0">
        批量生成HTML
    </button>


    <button class="btn" type="button" id="ajax_test">ajax_test</button>

</div>
-->
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>

<script>
    $(function () {
        $('#ajax_test').on('click', function () {
            $.ajax({
                type: 'post',
                url: 'http://localhost:8000/admin/games',
                data: {},
                dataType: 'json',
                success: function (r) {
                    console.log(r)
                },
                error: function (r) {
                    console.log(r)
                }
            });
        })
    })
</script>
</body>
</html>