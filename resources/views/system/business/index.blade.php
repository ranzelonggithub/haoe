@extends('system.layout.sys')
@section('content')
       
        <script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>
        <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="{{'/sys/index'}}">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">分类管理</span></div>
        </div>
           <div class="result-wrap">
                <div class="result-title">
                    <div class="result-list">
                        <a href="javascript:void(0)" onclick="add('a')"><i class="icon-font"></i>新增市</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="" width="60%" align='center'>
                        <tr>
                            <td width='15%'>市</td>
                            <td width='15%'>区</td>
                            <td width='30%'>商圈</td>
                            <td width='40%'>操作</td>
                        </tr>
                    @foreach($data as $k => $v)
                        @if($v['pid'] == 0)   
                        <tr  b="{{$v['id']}}" m='add_dist'>
                            <td con="{{$v['id']}}">{{$v['area']}}<img src="{{asset('systems/images/left.jpg')}}"  a="{{$v['id']}}" width='12px' alt=""></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button class='btn btn-primary btn2' onclick="up({{$v['id']}})">修改</button>
                                <button class='btn btn-primary btn2' onclick="add({{$v['id']}})">增加</button>
                                <button class='btn btn-primary btn2' onclick="del({{$v['id']}})">删除</button>
                            </td>
                        </tr>
                            @foreach($data as $k1 => $v1)
                                @if($v1['pid'] == $v['id'])
                                    <tr  b="{{$v1['id']}}" pid="{{$v['id']}}" m='add_busi' style='display:none'>
                                        <td></td>
                                        <td con="{{$v1['id']}}">{{$v1['area']}}<img src="{{asset('systems/images/left.jpg')}}"  a="{{$v1['id']}}" width='12px' alt=""></td>
                                        <td></td>
                                        <td>
                                            <button class='btn btn-primary btn2' onclick="up({{$v1['id']}})">修改</button>
                                            <button class='btn btn-primary btn2' onclick="add({{$v1['id']}})">增加</button>
                                            <button class='btn btn-primary btn2' onclick="del({{$v1['id']}})">删除</button>
                                        </td>
                                    </tr>
                                    @foreach($data as $k2 => $v2)
                                        @if($v2['pid'] == $v1['id'])
                                            <tr  b="{{$v2['id']}}" pid="{{$v1['id']}}" m='add_none' style='display:none'>
                                                <td></td>
                                                <td></td>
                                                <td con="{{$v2['id']}}">{{$v2['area']}}</td>
                                                <td>
                                                    <button class='btn btn-primary btn2' onclick="up({{$v2['id']}})">修改</button>
                                                    <button class='btn btn-primary btn2' onclick="del({{$v2['id']}})">删除</button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach 
                                @endif
                            @endforeach 
                        @endif
                    @endforeach   
                    </table>
                </div>
        </div>
    </div>
    <script type='text/javascript'>

          layer.use("{{asset('layer/extend/layer.ext.js')}}", function(){  
             layer.ext = function(){  
                 layer.prompt({})  
             };  
         });
     
     // function del(id){
        
     //    layer.confirm('确认要删除码？', {
     //      title: '删除',
     //      btn: ['是','否'] //按钮
     //    }, function(){
     //      $.post("{{url('/sys/business/')}}/"+id,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
     //        if(data == '1'){
     //            layer.alert('删除成功',{icon:6});
     //            $('[b='+id+']').remove();
                
     //        }else if(data == '2'){
     //            layer.alert('删除失败',{icon:5});
     //        }else{
     //            layer.alert('存在子选项，不允许删除',{icon:1});
     //        }
     //      });
     //    });
     // } 
     function del(id){
        
        layer.confirm('确认要删除码？', {
          title: '删除',
          btn: ['是','否'] //按钮
        }, function(){
          $.post("{{url('/sys/business/')}}/"+id,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
            if(data == '1'){
                layer.alert('删除成功',{icon:6});
                $('[b='+id+']').remove();
                
            }else if(data == '2'){
                layer.alert('删除失败',{icon:5});
            }else{
                layer.alert('存在子选项，不允许删除',{icon:1});
            }
          });
        });
     }

     function up(id){

        layer.prompt({title: '更改', formType: 3}, function(newName, index){
          layer.close(index);
          $.post("{{url('/sys/business/')}}/"+id,{'_method':'put','_token':'{{csrf_token()}}','newName':newName},function(data){
            if(data){
                layer.msg('更新成功',{icon:6});
                location.href="/sys/business";
            }else{
                layer.msg('更新失败',{icon:5});
            }
          });
            
        });
      
     }

    function add(id){
        layer.prompt({title: '添加', formType: 3}, function(newName, index){
            layer.close(index);
            var m = $('[b='+id+']').attr('m');
            $.post("{{url('/sys/business')}}",{'_token':"{{csrf_token()}}",'newName':newName,'id':id,'m':m},function(data){
                if(data['state'] == 'has'){
                    layer.msg(newName+'已存在,添加失败',{icon:1});
                }else if(data['state'] == 'fail'){
                    layer.msg('添加失败,请重试',{icon:5});
                }else{
                    layer.msg('添加成功',{icon:6});
                    location.href="/sys/business";
                }
            });
            
        });   
    }


        

        
        

        $('img').click(function(){
            var id = $(this).attr('a');
            if($('[pid='+id+']').attr('style') != ''){
                $('[pid='+id+']').attr('style','');
                $(this).attr('src',"{{asset('systems/images/bottom.jpg')}}");
            }else{
                $(this).attr('src',"{{asset('systems/images/left.jpg')}}");
                $('[pid='+id+']').attr('style','display:none');
                var sid = $('[pid='+id+']');
                // console.log(sid.attr('b'));
                var num = $('[pid='+id+']').length;
                sid.find('img').attr('src',"{{asset('systems/images/left.jpg')}}");
                
                for(var i = 0; i < num ; i++){
                    var z = sid.eq(i).attr('b');
                    $('[pid='+z+']').attr('style','display:none');

                }
            }
        });
    </script>
@endsection