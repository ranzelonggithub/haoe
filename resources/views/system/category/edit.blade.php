@extends('system.layout.sys')

@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="{{'/sys/category'}}">分类管理</a><span class="crumb-step">&gt;</span><span>修改分类</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/sys/category/{{$data['id']}}" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT')}}
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>修改者：</th>
                                <td>
                                    <input class="common-text required" id="title" name="userName" size="50" value="{{$res['userName']}}" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>原类名：</th>
                                <td><input class="common-text" name="cateName" size="50" value="{{$data['cateName']}}" type="text"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>新类名：</th>
                                <td>
                                    <input class="common-text required" id="title" name="cateName" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
@endsection