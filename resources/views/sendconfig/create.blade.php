<!DOCTYPE html>
<html lang="en">
<head>
    @include('public.meta')
</head>
<body>
<!--面包屑导航 开始-->
<div class="crumb_warp">
    <i class="fa fa-home"></i> 首页 &raquo; 配置管理 &raquo; 添加配置
</div>

<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{url('sendconfig/story')}}" method="post">
        <input type="hidden" name="brand_id" id="brand_id">
        <input type="hidden" name="brand_name" id="brand_name">

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
                    <select id="linkChange" name="config_type">
                        <option value="">选择配置</option>
                        @foreach($configType as $item)
                            <option value="{{$item['id']}}">{{$item["text"]}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr id="show">
                <th class="email" style="display:none;">邮箱品牌:</th>
                <td class="email" style="display:none;">
                    <table>
                        <tr>
                            <td>
                                <select id="emailBrand">
                                    @foreach($brand as $item)
                                        @if($item['id']=="all")
                                            @php
                                            $check='selected=selected'
                                            @endphp
                                        @else
                                            {{$check=''}}
                                        @endif
                                        <option {{$check}} value="{{$item['id']}}" _text="{{$item["name"]}}">{{$item["name"]}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><span style="color:red;">默认不选就是取省下全部</span></td>
                        </tr>
                    </table>
                </td>
                <th class="contacttool" style="display:none;">咨询工具品牌:</th>
                <td class="contacttool" style="display:none;">
                    <table>
                        <tr>
                            <td>
                                <select id="contacttoolBrand">
                                    @foreach($website as $item)
                                        <option value="{{$item['id']}}" _text="{{$item["text"]}}">{{$item["text"]}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><span style="color:red;">默认不选就是取省下全部</span></td>
                        </tr>
                    </table>
                </td>

                <th class="website" style="display:none;">网站类型:</th>
                <td class="website" style="display:none;">
                    <table>
                        <tr>
                            <td>
                                <select id="website">
                                    @foreach($website as $item)
                                        <option value="{{$item['id']}}" _text="{{$item["text"]}}">{{$item["text"]}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><span style="color:red;">默认不选就是取省下全部</span></td>
                        </tr>
                    </table>
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
    let info=(function(){
       return {
           brand_id:$("#brand_id"),
           brand_name:$("#brand_name"),
           linkChange:$("#linkChange"),
           show:$("#show"),
           emailBrand:$("#emailBrand"),
           contacttoolBrand:$("#contacttoolBrand"),
           website:$("#website")

       };
    })();
//    配置类型
    info.linkChange.change(function(){
        let val=$(this).children('option:selected').val();
        switch(val){
            case "email":
                info.show.children().hide();
                info.show.find('.email').show();

                break;
            case "contacttool":
                info.show.children().hide();
                info.show.find('.contacttool').show();
                break;
            case "website":
                info.show.children().hide();
                info.show.find('.website').show();
                break;
        }
    });
    //邮箱品牌change
    info.emailBrand.change(function(){
        let val=$(this).children('option:selected').val();
        let text=$(this).children('option:selected').attr("_text");
        info.brand_id.val(val);
        info.brand_name.val(text);
    });
    //咨询工具品牌
    info.contacttoolBrand.change(function(){
        let val=$(this).children('option:selected').val();
        let text=$(this).children('option:selected').attr("_text");
        info.brand_id.val(val);
        info.brand_name.val(text);
    });
    //网站类型
    info.website.change(function(){
        let val=$(this).children('option:selected').val();
        let text=$(this).children('option:selected').attr("_text");
        info.brand_id.val(val);
        info.brand_name.val(text);
    });


</script>