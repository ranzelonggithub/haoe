@extends('shop.layout.layout')
@section('content')
 <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">店铺管理</span><span class="crumb-step">&gt;</span><span class="crumb-name">种类管理</span></div>
        </div>
        <div class="result-wrap">
       
                <div class="result-title">
                    <div class="result-list">
                        <a href="javascript:void(0)" onclick="add()"><i class="icon-font"></i>新增种类</a>
                    </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <td align='center'><b>类别</b></td>
                            <td align='center'><b>操作</b></td>
                        </tr>
                    @foreach($cate as $k =>$v)
                        <tr>
                            <td width='50%' align='center'>{{$v}}</td>
                            <td align='center'>
                                <button class='btn btn-primary btn6 mr10' e="{{$k}}" onclick='edit({{$k}})'>修改</button>
                                @if($k == count($cate)-1)
                                    <button class="link-del btn btn6" d="{{$k}}" onclick="del({{$k}})">删除</button>
                                @else
                                    <button class="link-del btn btn6" d="{{$k}}"  onclick="del({{$k}})" disabled="true" style='opacity:0;cursor:default'>删除</button>
                                @endif
                            </td>
                        </tr>
                     @endforeach   
                    </table>
                    <div class='pages'>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

 <script type='text/javascript'>

      layer.use("{{asset('layer/extend/layer.ext.js')}}", function(){  
         layer.ext = function(){  
             layer.prompt({})  
         };  
     });
 
 function del(id){
    
    layer.confirm('&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp删除之后,已在此种类的菜品会受到干扰,是否仍继续删除？', {
      title: '删除',
      btn: ['是','否'] //按钮
    }, function(){
      $.post("{{url('/shop/cate/')}}/"+id,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
        if(data){
            layer.alert('删除成功',{icon:6});
            $('button[d='+id+']').parent().parent().prev().find('button:last').removeAttr('disabled style');
            $('button[d='+id+']').parent().parent().remove();
            
        }else{
            layer.alert('删除失败',{icon:5});
        }
      });
    });
 }

 function edit(id){

    layer.prompt({title: '更改分类', formType: 3}, function(newName, index){
      layer.close(index);
      $.post("{{url('/shop/cate/')}}/"+id,{'_method':'put','_token':'{{csrf_token()}}','newName':newName},function(data){
        if(data){
            layer.msg('更新成功');
            $('button[e='+id+']').parent().prev().html(newName);
        }else{
            layer.msg('更新失败');
        }
      });
        
    });
  
 }

function add(){
    layer.prompt({title: '添加分类', formType: 3}, function(newName, index){
        layer.close(index);
        $.post("{{url('/shop/cate')}}",{'_token':"{{csrf_token()}}",'newName':newName},function(data){
            if(data == 'has'){
                layer.msg('分类已存在,添加失败');
            }else if(data == 'fail'){
                layer.msg('添加失败,请重试');
            }else{
                layer.msg('添加成功');
                $('table').append($('tr:last').clone(true));
                $('tr:last').find('td:first').html(newName);
                $('tr:last').find('td:last').find('button:first').attr({'e':data,'onclick':'edit('+data+')'});
                $('tr:last').find('td:last').find('button:last').attr({'d':data,'onclick':'del('+data+')'});
                $('tr:last').prev().find('td:last').find('button:last').attr({'disabled':"true",'style':'opacity:0;cursor:default'});
            }
        });
        
    });   
} 
</script>
@endsection