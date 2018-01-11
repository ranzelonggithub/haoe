@extends('shop.layout.layout')
@section('content')
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">食品</a><span class="crumb-step">&gt;</span><span>食品编辑</span></div>
        </div>
        @if (count($errors) > 0)
        <center>  
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><b>{{ $error }}</b></li>
                    @endforeach
                </ul>
            </div>
        </center>
        @endif
        <div class="result-wrap">
            <div class="result-content">
                <form action="/shop/foods/{{$data['id']}}" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="uid" id="catid" class="required common-text">
                                    <option value='{{$uid}}'>{{$cate}}</option>
                                    @foreach($cateName as $k =>$v)
                                    <option value="{{$v['id']}}">{{$v['cateName']}}</option> 
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>名称：</th>
                                <td>
                                    <input class="common-text required goodsName"  name="goodsName" size="50" value="{{$data['goodsName']}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>状态：</th>
                                <td>
                                    @if($data['state'] == 0)
                                        <input type="radio" vlaue='0' name='state' class='common-text required' checked>下架
                                        <input type="radio" vlaue='1' name='state' class='common-text required'>上架
                                    @else
                                        <input type="radio" vlaue='0' name='state' class='common-text required'>下架
                                        <input type="radio" vlaue='1' name='state' class='common-text required' checked>上架
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>排序：</th>
                                <td>
                                    <input class="number common-text"  name="sort" value="{{$data['sort']}}" type="number" max='1000'>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>价格：</th>
                                <td>
                                    <input class="number common-text"  name="price" value="{{$data['price']}}" type="number" max='100000'>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>图片：</th>
                                <td><input name="picture" id="" type="file"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>描述：</th>
                                <td><textarea name="description" class="common-textarea"  cols="30" style="width: 98%;" rows="10" maxlength='70' placeholder="最多输入70个字">{{$data['description']}}</textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="修改" type="submit">
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
@endsection
    