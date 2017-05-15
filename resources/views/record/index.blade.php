<!DOCTYPE html>
<html lang="en">
<head>
     @include('public.meta')
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="{{route('record')}}" method="get">
            <table class="search_tab">
                <tr>
                    <th width="70">网站标题:</th>
                    <td><input type="text" name="title" placeholder="网站标题"></td>
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
                    <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
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
                        <th>标题</th>
                        <th>邮箱</th>
                        <th>阅读</th>
                        <th>模板标题</th>
                        <th>类型</th>
                        <th>配置</th>
                        <th>省份</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $item)
                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                        <td class="tc">
                            {{$item["id"]}}
                        </td>
                        <td>{{str_limit($item["wwwtitle"],30)}}</td>
                        <td class="tc">{{$item["email"]}}</td>
                        <td>
                            {{$item["read_num"]}}
                        </td>
                        <td>{{$item["template_title"]}}</td>
                        <td>{{$item["template_type"]}}</td>
                        <td>{{$item["config_title"]}}</td>
                        <td>{{$item["province"]}}</td>
                        <td>{{date("Y-m-d H:i:s",$item["create_time"])}}</td>
                        <td>
                            <a href="#">修改</a>
                            <a href="#">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
{{--        <div style="float:right;">{{ $data->render() }}</div>--}}
    </form>

</body>
</html>