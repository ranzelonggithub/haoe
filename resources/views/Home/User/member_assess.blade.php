<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="icon" href="{{asset('Home/images/yahoo_panda_72px_534234_easyicon.net.ico')}}">
    <link rel="icon" type="image/png" href="{{asset('Home/images/favicon.ico')}}"/>
    <script src="{{ asset('Home/js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ asset('layer/layer.js') }}"></script>
    
    <link rel="stylesheet" href="{{ asset('Home/css/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
    <script type="text/javascript">
        
        (function(document, screen) {if (screen.width < 760) {document.location.href="/mobile/";}}(document, screen));
    </script>
    
    <link rel="stylesheet" href="{{asset('Home/css/common.css')}}"/>
    
    <link rel="stylesheet" href="{{asset('Home/css/user_center.css')}}"/>
    <title>个人中心 - 账号管理</title>
</head>
<body class="day " ng-controller="bodyCtrl"  day-or-night>
    <section class="common-back" id="wrapBackground">
        
            <header id="header">
                <div class="common-width clearfix">
                    <h1 class="fl">
                        <a class="logo base-logo" href="{{asset('/home/list')}}">外卖超人</a>
                    </h1>
                    
                        <ul class="member logging" ng-init="loginInfo=true">
                            <li><a href="{{asset('/home/list')}}" class="index">首页</a></li>
                            <li class="userName">
                                <a href="/home/user/member_index?id={{ $id }}" rel="nofollow" draw-user>18005151538<em></em></a>
                                <div>
                                    <p><a href="/home/user/member_index?id={{ $id }}"  rel="nofollow">账号管理</a></p>
                                    <p><a href="/home/user/member_addr?id={{ $id }}"  rel="nofollow">地址管理</a></p>
                                    <p class="no-bo"><a id="logout" href="{{asset('/home/login/login')}}" referer-url rel="nofollow">退出</a></p>
                                </div>
                            </li>
                            <li class=""><a href="/home/user/member_order?id={{ $id }}" class="order-center"  rel="nofollow">我的订单</a></li>
                            <li class=""><a href="/home/user/member_collect?id={{ $id }}"  rel="nofollow">我的收藏</a></li>
                            
                            <li class="phone-client "><a href="#"  rel="nofollow" target="_blank"><span>手机客户端</span></a></li>
                        </ul>
                    
                </div>
            </header>
        
        <div id="main-box">
             <!--二维码-->
            <div class="qrCode-frame" ng-hide="qrCodeStatus">
                <img src="{{asset('Home/images/wx.png')}}" alt="扫描二维码" />
                <em ng-click="qrCodeStatus=true">X</em>
            </div>
        
            <div ng-controller="colorAction">
                <div class="dayColor_two"></div>
                <div class="dayColor_one"></div>
                <div class="dayColor_three" ng-class="{dayColor_threeActive:threeActive}"></div>
            </div>
        
            
    <section>
        <div class="user-center-main-box common-width clearfix">
            <aside class="fl">
                <ul>
                    <li class="active">
                        <a href="/home/user/member_index?id={{ $id }}" rel="nofollow">账号管理</a>
                    </li> 
                    <li >
                        <a href="/home/user/member_order?id={{ $id }}" rel="nofollow">我的订单</a>
                    </li>
                    <li >
                        <a href="/home/user/member_collect?id={{ $id }}" rel="nofollow">我的收藏</a>
                    </li>
                    <li >
                        <a href="/home/user/member_addr?id={{ $id }}"  rel="nofollow">地址管理</a>
                    </li>
                    
                </ul>
            </aside>
            <article class="fl user-center-main">
                <header>账号管理</header>
    @if(count($data) > 0)
        @foreach($data as $k=>$v)          
            @if($v)
             
     <section class="user-account-body">
        <ul class="fs12">
            <li>
                <img src="http://p2dtot555.bkt.clouddn.com//shop/shop/logo.jpg" alt="">
            </li>
            <li>
                <label>手机号码:</label>
                <span>{{ $v['phone'] }}</span>
            </li>
            <li>
                <label>当前用户:</label>
                <span id="userName">{{ $v['userName'] }}</span>
                <!-- <i class="icon edit-icon" onclick="userName_edit({{ $v['userName'] }})"></i> -->
                <i class="glyphicon glyphicon-edit" onclick="userName_edit({{ $id }})"></i>
                <!-- <button onclick="userName_edit({{ $v['userName'] }})">修改</button> -->
            </li>
            <li>
                <label>用户性别:</label>
                <span id="sex">{{ $v['sex'] == 'm' ? '男':'女' }}</span>
                <i class="glyphicon glyphicon-edit" onclick="sex_edit({{ $id }})"></i>
            </li>
            <li>
                <label>登录密码:</label>
                <span id="pass">**********</span>
                @if(empty($v['passWord']))
                <i class="glyphicon glyphicon-plus" onclick="pass_add({{ $id }})"></i>
                @else
                <i class="glyphicon glyphicon-edit" onclick="pass_edit({{ $id }})"></i>
                @endif
            </li>
            <li>
                <label>订单信息：</label>
                <span>总计{{ $total_order}}单</span>
                <span>成功{{ $success_order}}单</span>
            </li>
            
        </ul>
     </section>
            @endif
        @endforeach
     @endif

            </article>
    <script>
        //根据id修改用户名
        function userName_edit(id) {
            //alert(id) ;
      
            /*layer.confirm('修改用户名?', {
                  btn: ['修改','不修改'] //按钮
                }, function(name){
                  layer.open({
                      type: 2, 
                      content: "{{ url('Home/user/userName_edit') }}" + '?name=' + name 
                    }); 
                }, function(){
                  layer.msg('也可以这样',{icon:6}) ;
                });

            }*/
            layer.open({
                type: 2,
                title: '用户名修改',
                shadeClose: true,
                shade: false,
                maxmin: false, //开启最大化最小化按钮
                // zIndex: layer.zIndex,
                skin: 'layui-layer-rim', //加上边框
                area: ['420px', '240px'], //宽高
                content: "user_edit?id=" + id ,
                success:function(name) {
                    $('userName').html(name) ;
                }
            });   
        }


        //修改用户性别
        function sex_edit(id) {
            
            layer.open({
                type: 2,
                title: '性别修改',
                shadeClose: true,
                shade: false,
                maxmin: false, //开启最大化最小化按钮
                // zIndex: layer.zIndex,
                skin: 'layui-layer-rim', //加上边框
                area: ['420px', '360px'], //宽高
                content:  "sex_edit?id=" + id ,
                success:function(msg) {
                    //layer.msg(msg,{icon:6}) ;
                    var sex = $('sex').val() == '男'?'女':'男' ;
                    $('sex').html(sex) ;
                    //layer.msg(msg,{icon:6}) ;
                }
            });  

       }

       //若没有密码 添加
       function pass_add(id){
            layer.open({
                type: 2,
                title: '密码添加',
                shadeClose: true,
                shade: false,
                maxmin: false, //开启最大化最小化按钮
                // zIndex: layer.zIndex,
                skin: 'layui-layer-rim', //加上边框
                area: ['480px', '240px'], //宽高
                content:  "pass_add?id=" + id ,
               /* success:function(msg) {
                    //layer.msg(msg,{icon:6}) ;
                    
                    
                    //layer.msg(msg,{icon:6}) ;
                }*/
            }); 
       }
       //若有密码了 修改密码
       function pass_edit(id) {
            layer.open({
                type: 2,
                title: '密码修改',
                shadeClose: true,
                shade: false,
                maxmin: false, //开启最大化最小化按钮
                // zIndex: layer.zIndex,
                skin: 'layui-layer-rim', //加上边框
                area: ['480px', '360px'], //宽高
                content:  "pass_edit?id=" + id ,
               /* success:function(msg) {
                    //layer.msg(msg,{icon:6}) ;
                   
                   
                }*/
            }); 
       }

    </script>
        </div>
    </section>

        </div>
    </section>
    
        <footer id="footer">
        <div class="footer-first gray">
            <div class="company-info clearfix fs14 gray">
                <a href="about.html" target="_blank"  rel="nofollow">关于我们</a>
                <a href="help.html" target="_blank"  rel="nofollow">帮助中心</a>
                <a href="javascript:;" target="_blank"  rel="nofollow">法律声明</a>
                <a href="jobs.html" target="_blank"  rel="nofollow">人才招聘</a>
                <a href="contact.html" target="_blank"  rel="nofollow">联系我们</a>
                <a href="javascript:;" user-feedback ng-click="userFeedback=true" class="last" rel="nofollow">意见反馈</a>
                <a href="javascript:;" class="last" target="_blank" style="display:none">上海餐厅导航</a>
            </div>
        </div>
        <div class="footer-last">
            <a target="_blank" class="foot-logo-1 base-logo" href="index.html"></a>
            <div class="tc fs14 light-gray mb10">
              ©2014 waimaichaoren.com All Rights Reserved - 沪ICP备11019908号
            </div>
        </div>
    </footer>
    
    
    <dh-dialog class="disnone" height="500" feeedbackclass="userFeedback" type="user-feedback" header="意见反馈" show="userFeedback">
        <div ng-controller="feedbackCtrl">
            <form novalidate="true" name="feedbackForm" class="inline">
                <div class="form-group row mb10">
                    <label class="col-3">联系方式：</label>
                    <div class="col-8">
                        <input type="text" maxlength="20" name="userContact" required ng-focus="userContactFocus()" ng-class="{error:feedback.phoneMessage}" placeholder="请输入您的手机号码" ng-model="feedback.userContact"/>
                    </div>
                </div>
                <div class="row mb10">
                    <div class="clo-8 col-offset-3" ng-if="feedback.phoneMessage">
                        <span class="vaildate-error">联系方式不能为空</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 vt">反馈信息：</label>
                    <div class="col-8">
                        <textarea name="feedbackMessage"  placeholder="可以说说您对外卖超人的意见" ng-focus="feedbacFocus()" required ng-class="{error:feedback.feedbackMessageTip}" ng-model="feedback.feedbackMessage" maxlength="300" cols="25" rows="7"></textarea>
                    </div>
                </div>
                <div class="row mb10">
                    <div class="clo-8 col-offset-3" ng-if="feedback.feedbackMessageTip">
                        <span class="vaildate-error">反馈信息不能为空</span>
                    </div>
                </div>
                <div class="tc">
                    <button class="btn normal-btn btn-success" ng-click="feedbackSubmit()">确认</button>
                    <button class="btn normal-btn btn-cancel" ng-click="feedbackCancel()">取消</button>
                </div>
            </form>
        </div>
        <div class="common-dialog-footer">
            咨询加QQ群：337212031
        </div>
    </dh-dialog>
    
    
    

     <ul class="site-fixed">
        <li class="scroll-top"><img src="{{asset('Home/images/scroll_top1.png')}}" alt=""/> </li>
        <li class="scorll-feekback" ng-click="userFeedback=true">
            <img src="{{asset('Home/images/scorll_feekback.png')}}" alt=""/>
            <div>意见反馈</div>
        </li>
        <li class="scroll-wx">
            <img src="{{asset('Home/images/scroll_wx.png')}}" alt=""/>
             <div><img src="{{asset('Home/images/wx.png')}}" alt=""/></div>
        </li>
    </ul>
    
    <!-- <script type="text/javascript" src="{{asset('Home/js/angular.min.js')}}"></script>
    <script src="{{asset('Home/js/common.js')}}"></script>
    
     
    <script src="{{asset('Home/js/service.js')}}"></script> -->
    
    <script>var feedbackUrl = '/ajax/feedback/';var app = angular.module("app", ["dh.dialog", "dh.form", 'dh.service', 'dh.other']);</script>
    <!--[if lt IE 9]><script src="js/fix.js"></script><![endif]-->
    
    
    <script>
        var reviewUrl = "/mobile/ajax/order_review/",favoriteUrl = "/ajax/restaurant/0/favorite/";
    </script>
    <!--<script src="{{asset('Home/js/user_center.js')}}"></script>*/-->

    
    <script>angular.bootstrap(document, ["app"]);</script>

    <!-- Baidu Analytics -->


</body>
</html>
