<!DOCTYPE html>
<html lang="en">
<head>
    @include('public.meta')
</head>
<body>
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加链接
</div>

<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{route('link.story')}}" method="post">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>名称：</th>
                <td>
                    <input type="text" name="link_title" value="{{old('link_title')}}">
                    @if($errors->has("link_title"))
                        <div style="color:red;">{{$errors->first("link_title")}}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>链接：</th>
                <td>
                    <input type="text" class="lg" name="redirect_url" value="{{old('redirect_url')}}">
                    @if($errors->has("redirect_url"))
                        <div style="color:red;">{{$errors->first("redirect_url")}}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>

</body>
</html>