<!DOCTYPE html>
<html lang="en">
<head>
    @include('public.meta')
    @include('public.ckeditor')
</head>
<body>
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <i class="fa fa-home"></i> 首页 &raquo; 商品管理 &raquo; 添加模板
</div>

<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{route('template.story')}}" method="post">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>标题：</th>
                <td>
                    <input type="text" name="title" value="{{old('title')}}">
                    @if($errors->has("title"))
                        <div style="color:red;">{{$errors->first("title")}}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <th width="120"><i class="require">*</i>模板分类：</th>
                <td>
                    <select name="type">
                        <option value="0">请选择模板分类</option>
                        @foreach($type as $item)
                            <option value="{{$item['id']}}">{{$item["text"]}}</option>
                        @endforeach
                    </select>
                    @if($errors->has("type"))
                        <div style="color:red;">{{$errors->first("type")}}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>描述：</th>
                <td>
                    <input type="text" class="lg" name="detail" value="{{old('detail')}}">
                    @if($errors->has("redirect_url"))
                        <div style="color:red;">{{$errors->first("detail")}}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <th width="120"><i class="require">*</i>插入链接：</th>
                <td>
                    <select name="type">
                        <option value="0">选择链接</option>
                        @foreach($link as $item)
                            <option value="{{$item['id']}}">{{$item["text"]}}</option>
                        @endforeach
                    </select>
                    @if($errors->has("type"))
                        <div style="color:red;">{{$errors->first("type")}}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <th width="120"> </th>
                <td>
                    <input type="text" id="" class="lg">
                </td>
            </tr>
            <tr>
                <th width="120">内容:</th>
                <td>
                    <textarea id="template_content"  cols="30" rows="10" style="width:100%;height:100%;"></textarea>
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
<script>

    var editor1=CKEDITOR.replace('template_content', {
        fullPage: true,
        extraPlugins: 'docprops',
        allowedContent: true,
        height: 320
    } );


</script>