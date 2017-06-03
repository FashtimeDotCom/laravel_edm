<!DOCTYPE html>
<html lang="en">
<head>
     @include('public.meta')
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> 首页 &raquo; 链接管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="{{route('link')}}" method="get">
            <table class="search_tab">
                <tr>
                    <th width="70">链接名称:</th>
                    <td><input type="text" name="link_title" placeholder="链接名称"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{route('link.create')}}"><i class="fa fa-plus"></i>新增链接</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        <th class="tc">ID</th>
                        <th>链接名称</th>
                        <th>链接</th>
                        <th>阅读次数</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $item)
                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                        <td class="tc">
                            {{$item["id"]}}
                        </td>
                        <td class="tc">{{$item["link_title"]}}</td>
                        <td>
                            {{$item["link_url"]}}
                        </td>
                        <td>{{$item["read_num"]}}</td>
                        <td>{{date("Y-m-d H:i:s",$item["create_time"])}}</td>
                        <td>
                            <a href="{{route('link.edit',["id"=>$item["id"]])}}">修改</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
        <div style="float:right;">{{ $data->render() }}</div>
    </form>

</body>
</html>
<script>
    $(document).ready(function() {
        @if(Session::get('success'))
        new PNotify({
            title: '信息提示!!',
            text: "{{Session::get('success')}}",
            type: "success",
            delay:3000
        });
        @elseif(Session::get('error'))
        new PNotify({
            title: '错误提示!!',
            text: "{{Session::get('error')}}",
            type: "error",
            delay:3000
        });
        @endif
    });
</script>