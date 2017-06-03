<!DOCTYPE html>
<html lang="en">
<head>
    @include('public.meta')
    @include('public.ckeditor')
</head>
<body>
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <i class="fa fa-home"></i> 首页 &raquo; 配置管理 &raquo; 添加配置
</div>

<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{url('sendconfig/story')}}" method="post">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>标题：</th>
                <td>
                    <input type="text" class="lg" name="title" value="{{old('title')}}">
                    @if($errors->has("title"))
                        <div style="color:red;">{{$errors->first("title")}}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <th width="150"><i class="require">*</i>发送邮件昵称：</th>
                <td>
                    <input type="text" class="lg" name="fromname" value="{{old('fromname')}}">
                    @if($errors->has("fromname"))
                        <div style="color:red;">{{$errors->first("fromname")}}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <th width="120"><i class="require">*</i>省份：</th>
                <td>
                    <select name="province_id">
                        <option value="0">请选择省份</option>
                        @foreach($province as $key => $item)
                            <option value="{{$key}}">{{$item}}</option>
                        @endforeach
                    </select>
                    @if($errors->has("province_id"))
                        <div style="color:red;">{{$errors->first("province_id")}}</div>
                    @endif
                </td>
            </tr>
            <tr>
                <th width="120"><i class="require">*</i>配置类型：</th>
                <td>
                    <select id="linkChange">
                        <option value="">选择配置</option>
                        @foreach($configType as $item)
                            <option value="{{$item['id']}}">{{$item["text"]}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <th>邮箱品牌:</th>
                            <td>
                                <select name="brand_id">

                                </select>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>描述：</th>
                <td>
                    <input type="text" class="lg" name="detail" value="{{old('detail')}}">
                    @if($errors->has("detail"))
                        <div style="color:red;">{{$errors->first("detail")}}</div>
                    @endif
                </td>
            </tr>

            <tr>
                <th width="120"> </th>
                <td>
                    <input type="text" id="trueLink" class="lg">
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