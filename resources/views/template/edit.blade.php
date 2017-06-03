<!DOCTYPE html>
<html lang="en">
<head>
    @include('public.meta')
    @include('public.ckeditor')
</head>
<body>
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <i class="fa fa-home"></i> 首页 &raquo; 模板管理 &raquo; 修改模板
</div>

<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{url('template/update',['id'=>$data->id])}}" method="post">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>标题：</th>
                <td>
                    <input type="text" name="title" value="{{old('title')?old('title'):$data['title']}}">
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
                            @if($item['id']==(old('type')?old('type'):$data["type"]))
                                @php
                                $check='selected="selected"'
                                @endphp
                            @else
                                {{$check=''}}
                            @endif
                            <option value="{{$item['id']}}" {{$check}} >{{$item["text"]}}</option>
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
                    <input type="text" class="lg" name="detail" value="{{old('detail')?old('detail'):$data['detail']}}">
                    @if($errors->has("detail"))
                        <div style="color:red;">{{$errors->first("detail")}}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <th width="120"><i class="require">*</i>插入链接：</th>
                <td>
                    <select id="linkChange">
                        <option value="">选择链接</option>
                        @foreach($link as $item)
                            <option value="{{$item['link_url']}}">{{$item["text"]}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th width="120"> </th>
                <td>
                    <input type="text" id="trueLink" class="lg">
                </td>
            </tr>
            <tr>
                <th width="120">内容:</th>
                <td>
                    <textarea id="template_content" name="content" cols="30" rows="10" style="width:100%;height:100%;">{{old('content')?old('content'):$data['content']}}</textarea>
                    @if($errors->has("content"))
                        <div style="color:red;">{{$errors->first("content")}}</div>
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
<script>
    var info=(function(){
        return {
            trueLink:$("#trueLink")
        };
    })();
//编辑器
    var editor1=CKEDITOR.replace('template_content', {
        fullPage: true,
        extraPlugins: 'docprops',
        allowedContent: true,
        height: 320
    } );
//change事件
    $("#linkChange").change(function(){
        let val=$(this).children('option:selected').val();
        info.trueLink.val(val);
    });
</script>