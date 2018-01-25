<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="icon" href="{{asset('Home/images/yahoo_panda_72px_534234_easyicon.net.ico')}}">
    <link rel="icon" type="image/png" href="{{asset('Home/images/favicon.ico')}}"/>
    <script src="{{ asset('Home/js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ asset('layer/layer.js') }}"></script>
    
    <link rel="stylesheet" href="{{ asset('Home/css/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}">
    <link rel="icon" type="image/png" href="{{asset('Home/images/favicon.ico')}}"/>
    
    <script type="text/javascript">
        
        (function(document, screen) {if (screen.width < 760) {document.location.href="/mobile/";}}(document, screen));
    </script>
    
    <link rel="stylesheet" href="{{asset('Home/css/common.css')}}"/>
    
    <link rel="stylesheet" href="{{asset('Home/css/user_center.css')}}"/>

    <!--[if lte IE 7]><script>window.onload=function(){location.href="/ie6warning/"}</script><![endif]-->
    <!--[if lt IE 9]>
    <script src="js/respond.js"></script>
    <script>
        var e = "abbr, article, aside, audio, canvas, datalist, details, dialog, eventsource, figure, footer, header, hgroup, mark, menu, meter, nav, output, progress, section, time, video, dh-dialog, dh-checkbox".split(', ');
         var i= e.length;while (i--){document.createElement(e[i])}
    </script>
    <![endif]-->
    <title>个人中心 - 我的收藏</title>
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
                            <li class=""><a href="#"  rel="nofollow">氪星礼品站</a></li>
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
                    <li>
                        <a href="/home/user/member_index?id={{ $id }}" rel="nofollow">账号管理</a>
                    </li>
                    <li>
                        <a href="/home/user/member_order?id={{ $id }}" rel="nofollow">我的订单</a>
                    </li>
                    <li  class="active">
                        <a href="/home/user/member_collect?id={{ $id }}" rel="nofollow">我的收藏</a>
                    </li>
                    <li >
                        <a href="/home/user/member_addr?id={{ $id }}"  rel="nofollow">地址管理</a>
                    </li>
                 
                </ul>
            </aside>
            <article class="fl user-center-main">
                <header>订单详情</header>
                
                @if(count($data) > 0)
                    @foreach($data as $k=>$v)
                <table class="table table-hover ">
                    <tr>
                        <th rowspan='2'>
                            <img src="http://p2dtot555.bkt.clouddn.com//shop/shop/logo.jpg" alt="">
                        </th>
                        <th>餐厅:{{ $v['shopName'] }}</th>
                        <th rowspan=2></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>订单号:D-{{ $v['orderNum'] }}</th>
                        <th>店铺电话:{{ $v['shopPhone'] }}</th>
                        <th></th>
                     
                    </tr>
                    <tr>
                        <th colspan='3'>菜品</th>
                   
                        <th>数量</th>
                        <th>小计</th>
                    </tr>
                    
                    @if(count($goodsNames) > 0) 
                        @for($i = 0; $i < count($goodsNames);$i++)
                    <tr>
                        <th colspan=3>{{ $goodsNames[$i] }}</th>
                        <th>{{ $goodsAmounts[$i] }}</th>
                        <th>{{ $subtotals[$i] }}</th>
                    
                    </tr>
                        @endfor
                    @endif
                 
                    <tr>
                        <th colspan=4>配送费:</th>
            
                        <th>￥{{ $v['deliPrice'] }}</th>
                    </tr>
                    <tr>
                        
                        <th colspan=4>总价:</th>
                        <th>￥{{ $v['payment'] }}</th>
                    </tr>
                   
                </table>
                

                <!-- 配送信息 -->
                <table class="table table-hover ">
                    <caption><h3>配送信息</h3></caption>
                    <tr>
                        <td >配送方式:</td>
                        <td>{{ $v['delivery'] }}</td>
                        <td></td>
                        <td></td>
             
                     
                    </tr>
                     <tr>
                        <td>配送人电话:</td>
                        <td>{{ $v['deilPhone'] }}</td>
                        <td></td>
                        <td></td>
                
                    </tr>
                    <tr>
                        <td colspan=4></td>
             
                    </tr>
                     <tr>
                        <td>联系人:</td>
                        <td >{{ $v['recName'] }}(先生)</td>
                        <td></td>
                        <td></td>
    
                    </tr>
                     <tr>
                        <td>收货地址:</td>
                        <td >{{ $v['autoAddr'] }}---{{ $v['detailAddr'] }}</td>
                        <td></td>
                        <td></td>
                    
                    </tr>
                     <tr>
                        <td>发票信息:</td>
                        <td colspan=3></td>
                
                    </tr>
                     <tr>
                        <td>备注:</td>
                        <td colspan=3>无备注</td>
                  
                    </tr>
        
                </table>

                 @if($v['state'] != '3') 
                <button class="btn btn-info btn-block" onClick="history.go(-1)" >返回</button>
                @endif
                    @endforeach
                @endif
  



            </article>
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
    
    <dh-dialog class="disnone" type="alert" index="1001" header="" show="errorShow">
        <div class="alert-box error">
            <p ng-bind="errorMsg"></p>
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
    
    <script type="text/javascript" src="{{asset('Home/js/angular.min.js')}}"></script>
    <script src="{{asset('Home/js/common.js')}}"></script>
    
     
    <script src="{{asset('Home/js/service.js')}}"></script>
    
    <script>var feedbackUrl = '/ajax/feedback/';var app = angular.module("app", ["dh.dialog", "dh.form", 'dh.service', 'dh.other']);</script>
    <!--[if lt IE 9]><script src="js/fix.js"></script><![endif]-->
    
    
    <script>
        var reviewUrl = "/mobile/ajax/order_review/",favoriteUrl = "/ajax/restaurant/0/favorite/";
    </script>
    <script src="{{asset('Home/js/user_center.js')}}"></script>

    
    <script>angular.bootstrap(document, ["app"]);</script>

    <!-- Baidu Analytics -->



</body>
</html>
