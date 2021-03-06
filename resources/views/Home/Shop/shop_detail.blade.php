<!DOCTYPE html>


<html>
<head>
    <meta charset="utf-8"/>
   
    <link rel="icon" type="image/png" href="{{asset('Home/images/favicon.ico')}}"/>
    
    <script type="text/javascript">
        
        (function(document, screen) {if (screen.width < 760) {document.location.href="/mobile/";}}(document, screen));
    </script>
    
    <link rel="stylesheet" href="{{asset('Home/css/common.css')}}"/>
    
    <link rel="stylesheet" href="{{asset('Home/css/menuPage.css')}}"/>

    <!--[if lte IE 7]><script>window.onload=function(){location.href="/ie6warning/"}</script><![endif]-->
    <!--[if lt IE 9]>
    <script src="js/respond.js"></script>
    <script>
        var e = "abbr, article, aside, audio, canvas, datalist, details, dialog, eventsource, figure, footer, header, hgroup, mark, menu, meter, nav, output, progress, section, time, video, dh-dialog, dh-checkbox".split(', ');
         var i= e.length;while (i--){document.createElement(e[i])}
    </script>
    <![endif]-->
    <title>店铺商品</title>
</head>
<body class="day " ng-controller="bodyCtrl"  day-or-night>
    <section class="common-back" id="wrapBackground">
        
            <header id="header">
                <div class="common-width clearfix">
                    <h1 class="fl">
                        <a class="logo base-logo" href="{{asset('/home/list')}}">外卖超人</a>
                    </h1>

                        <ul class="member" login-box>
                            <li><a href="{{asset('/home/list')}}" class="index">首页</a></li>
                            <li class="login-register"><a href="{{asset('/home/login/login')}}" referer-url  class="login"  rel="nofollow">登录</a><span class="cg">/</span><a href="register.html" referer-url  rel="nofollow" class="register">注册</a></li>
                            <li><a href="{{asset('/home/user/member_order')}}" class="order-center"  rel="nofollow">查看订单</a></li>
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
        
            
    <section class="menupage-main common-width" ng-init="city_name='上海'">
@if(count($shop_info) > 0)       
    @foreach($shop_info as $k_shop=>$v_shop)
        @if($v_shop)
<header class="nav clearfix">
    <div class="fl clearfix nav-des">
        <img src="http://p2dtot555.bkt.clouddn.com//shop/shop/logo.jpg" alt="{{ $v_shop['shopName'] }}" class="fl" />
        <div class="fl nav-des-text">
            <h2 class="ellipsis" title="{{ $v_shop['shopName'] }}">{{ $v_shop['shopName'] }}</h2>
            <div class="clearfix">
                <div class="fl nav-review">
                    <div style="width:65.00px;"></div>
                </div>
                <p class="nav-review-x">5星</p>
            </div>
        </div>
    </div>
    <div class="fr clearfix nav-right">
        
        <div class="fl nav-right-blast line-right">
            <p>{{ $v_shop['initPrice'] }}<span style="font-size:12px;color:#999;">元</span></p>
            <span>起送</span>
        </div>
        
        <div class="fl nav-right-blast">
            <p>37<span style="font-size:12px;color:#999;">分钟</span></p>
            <span>送餐时间</span>
        </div>
        <div class="fl nav-right-collect line-left">
            
                <div class="collect not-collect" title="收藏餐厅" data-rid="1592"></div>
                <div class="collect-success">收藏成功</div>
                <div id="review-text">未收藏</div>
            
        </div>
    </div>
</header>
        @endif
    @endforeach
@endif

<ul class="clearfix menu-nav-list" scroll-position-static="160">
    <li class="no-line "><a href="/home/shop/shop_intro?id={{ $id }}">餐厅介绍</a></li>
    <li class="active"><a href="/home/shop/shop_detail?id={{ $id }}">菜单</a></li>
    <li ><a href="/home/shop/shop_comment?id={{ $id }}">评论</a></li>
	<li ><a href="/home/shop/shop_brand?id={{ $id }}" id='point-tab'>大家都在点</a></li>
    
</ul>

        <section class="main-box clearfix" lazy-img-load>
            <div class="main fl">
                <div class="inner-main">
                    <!-- <nav class="menu-nav link fs12 clearfix" scroll-position-static="130">
                        <ul class="fl" menutoggle>
                            <li data-toggle="section-all" class="active">
                                <a href="javascript:void(0);">显示全部</a>
                            </li>
                            
                                 <li data-toggle="section-39215">
                                    <a href="javascript:void(0);">店主推荐(6)</a>
                            
                            
                                <li data-toggle="section-189417">
                                    <a href="javascript:void(0);">份份减6元活动专区(8)</a>
                                </li>
                            
                                <li data-toggle="section-25305">
                                    <a href="javascript:void(0);">冷面系列(9)</a>
                                </li>
                            
                                <li data-toggle="section-25301">
                                    <a href="javascript:void(0);">【八五折便当区】(23)</a>
                                </li>
                            
                                <li data-toggle="section-25300">
                                    <a href="javascript:void(0);">一品料理(22)</a>
                                </li>
                            
                                <li data-toggle="section-25302">
                                    <a href="javascript:void(0);">盖浇饭系列(9)</a>
                                </li>
                            
                                <li data-toggle="section-122476">
                                    <a href="javascript:void(0);">日式沾沾面类(3)</a>
                                </li>
                            
                                <li data-toggle="section-168983">
                                    <a href="javascript:void(0);">寿喜锅系列(6)</a>
                                </li>
                            
                                <li data-toggle="section-168984">
                                    <a href="javascript:void(0);">寿喜锅套餐系列(4)</a>
                                </li>
                            
                                <li data-toggle="section-168980">
                                    <a href="javascript:void(0);">刺身系列(3)</a>
                                </li>
                            
                                <li data-toggle="section-25308">
                                    <a href="javascript:void(0);">特色煎饺(3)</a>
                                </li>
                            
                                <li data-toggle="section-25299">
                                    <a href="javascript:void(0);">特色油淋鸡/布丁(2)</a>
                                </li>
                            
                                <li data-toggle="section-25304">
                                    <a href="javascript:void(0);">蔬菜色拉系列(5)</a>
                                </li>
                            
                                <li data-toggle="section-25306">
                                    <a href="javascript:void(0);">炒面系列(1)</a>
                                </li>
                            
                                <li data-toggle="section-25307">
                                    <a href="javascript:void(0);">烤物系列(5)</a>
                                </li>
                            
                                <li data-toggle="section-25310">
                                    <a href="javascript:void(0);">米饭(2)</a>
                                </li>
                            
                                <li data-toggle="section-25311">
                                    <a href="javascript:void(0);">饮料(12)</a>
                                </li>
                            
                                <li data-toggle="section-56459">
                                    <a href="javascript:void(0);">酒水(3)</a>
                                </li>
                            
                        </ul>
                        <i class="icon expand-icon fr" toogle-nav-menu="39"></i>
                    </nav>-->
                    <nav class="list-order-nav clearfix" id="list-order-nav">
                        <ul class="fl">
                            <li>菜单排序：</li>
                            <li><a href="javascript:void(0);" class="sort-default active">默认排序</a></li>
                            <li class="split-line">|</li>
                            <li><a href="javascript:void(0);" class="sort-sale descend">销量<i class="order-icon"></i></a></li>
                            <li class="split-line">|</li>
                            <li><a href="javascript:void(0);" class="sort-price">价格<i class="order-icon"></i></a></li>
                            <li class="split-line">|</li>
                        </ul>
                    </nav>
                    <div id="menu-main" class="menu-main">
                    
                    
                    
                
                    @if(count($cates) > 0)
                        @foreach($cates as $k=>$v)
                            @if($v) 
                
                    <article class="collapse section-25305">
                        <header accordion>
                            <h3 class="ellipsis" title="{{ $v }}">
                                {{ $v }}
                                
                            </h3>
                            <span ng-if="sectionCount['25305']" ng-class="{disinbl:sectionCount['25305']}"
                                  class="badge disnone" ng-bind="sectionCount['25305']"></span>
                            <i class="icon shrink-icon position"></i>
                        </header>
                        <section>
                              
                            <ul class="clearfix menu-group menu-group-img menu-first-load">
                                 
                                @if(count($data) > 0)    
                                    @foreach($data as $k_foods=>$v_foods)
                                        @if($v_foods['cate'] == $k)
                                <li title="{{ $v_foods['goodsName'] }}" class="menu-item hasImg" accessorykey="25305-559095" data-sale="2" data-price="{{ $v_foods['price'] }}">
                                    <div class="menu-item-img"> 
                                        <img src="http://p2dtot555.bkt.clouddn.com//shop/shop/logo.jpg" style="border:1px solid #EEE" width="200" height="200" />
                                    </div>
                                    <div class="meun-item-name"><span class="ellipsis">{{ $v_foods['goodsName'] }}</span></div>
                                    <p class="ellipsis meun-item-des"></p>
                                    <div class="meun-item-sale clearfix">
                                        <span class="last"></span>
                                        <span class="price">￥{{ $v_foods['price'] }}</span>
                                        <span ng-if="menuItemCount['25305-559095']" ng-class="{disinbl:menuItemCount['25305-559095']}"
                                              class="badge disnone" ng-bind="menuItemCount['25305-559095']"></span>
                                        <span class="fr">已售{{ $v_foods['amount'] }}份</span>
                                        
                                    </div>
                                    
                                </li>
                                        @endif
                                    @endforeach
                                @endif

                            </ul>
                            
                            <ul class="clearfix menu-group">
             
                            </ul>
                        </section>
                    </article>
                            @endif
                        @endforeach
                    @endif
                
          
                    </div>
                </div>
            </div>
            <aside class="fl">
                <article class="cart" scroll-position-static="160" top="42">
                    <div class="menu-cart">
                        <header>
                            <!-- <h4 class="ellipsis w100p" title="[半价菜][送可乐]樱花日本料理">[半价菜][送可乐]樱花日本料理</h4> -->
                            <h5>
                                购物车
                                <i class="icon trash-can-icon fr " ng-click="clearCart()"></i>
                            </h5>
                        </header>
                        <section>
                            <div class="inner-cart empty" ng-class="{empty:isEmpty}">
                                <div class="cart-thead clearfix">
                                    <div class="goods-name fs16">商品名</div>
                                    <div class="goods-count fs16">份数</div>
                                    <div class="goods-price fs16">单价</div>
                                    <div class="goods-subtotal fs16">小计</div>
                                </div>
                                <div class="cart-item-list select-none">
                                    <div class="disnone" ng-class="{disnone:isEmpty}">
                                        <div class="cart-item cart-data clearfix" ng-repeat="obj in cartDatas">
                                            <div class="goods-name ellipsis" ng-bind="obj.name"></div>
                                            <div class="goods-count clearfix ellipsis">
                                                <span class="goods-sub icon sub-icon fl" sub-goods="[[$index]]"></span>
                                                <span class="goods-nums fl" ng-bind="obj.quantity"></span>
                                                <span class="goods-add icon add-icon fl" ng-click="addGoodsNum($index)"></span>
                                            </div>
                                            <div class="goods-price">￥<span ng-bind="obj.price|number:2"></span></div>
                                            <div class="goods-subtotal">￥<span ng-bind="(obj.quantity * obj.price)|number:2"></span></div>

                                            <div class="accessory-item" ng-class="{firstitem:$first}" ng-repeat="item in obj.options">
                                                <div class="cart-item clearfix">
                                                    <div class="goods-name ellipsis" ng-bind="item.name"></div>
                                                    <div class="goods-count fs20">
                                                       <span class="goods-sub fl"></span>
                                                       <span class="goods-nums fl" ng-bind="item.quantity"></span>
                                                    </div>
                                                    <div class="goods-price">￥<span ng-bind="item.price|number:2"></span></div>
                                                    <div class="goods-subtotal">￥<span ng-bind="(item.price * item.quantity)|number:2"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--附加物-->
                                        <div class="cart-item cart-item-addendum cart-data clearfix" ng-repeat="addition in additions">
                                            <div class="goods-name ellipsis" ng-bind="addition.name"></div>
                                            <div class="goods-count clearfix ellipsis">
                                                <span class="goods-nums fl" ng-bind="addition.quantity"></span>
                                            </div>
                                            <div class="goods-price">￥<span ng-bind="addition.price|number:2"></span></div>
                                            <div class="goods-subtotal">￥<span ng-bind="(addition.price * addition.quantity)|number:2"></span></div>
                                        </div>
                                        <!--附加物-->
                                    </div>
                                    <div class="cart-item-empty">暂无商品，请在左边的菜单上点单</div>
                                </div>
                                <div id="cart-item-list"></div>
                                <div class="total clearfix disnone" ng-class="{disnone:isEmpty}">
                                    <div class="fl">配送费：￥<span ng-bind="deliveryCost|number:2"></span></div>
                                    <div class="fr">合计：￥<span ng-bind="total|number:2"></span></div>
                                </div>
                                <div class="checkout">
                                    <button class="checkout btn" ng-disabled="isPlaceOrder" ng-click="createOrder()" ng-bind="createOrderBtnName">立即下单</button>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                    <article class="restaurant-notice">
                        <header>
                            餐厅活动
                        </header>
                        <section>
                            <ul>
                                
                                
                                    <li><i class="status-icon"></i><span>餐厅支持在线支付</span></li>
                                
                                
                                    
                                    <li><img src="{{asset('Home/images/Fg-4kUvXVpR1DRR0O3VFr73KHEQr.png')}}" alt="" /><span>每单赠送价值15元进口果汁1瓶！</span></li>
                                    
                                    <li><img src="{{asset('Home/images/Fg-4kUvXVpR1DRR0O3VFr73KHEQr.png')}}" alt="" /><span>活动菜品立减6元，多点多减！</span></li>
                                    
                                    <li><img src="{{asset('Home/images/Fg-4kUvXVpR1DRR0O3VFr73KHEQr.png')}}" alt="" /><span>该餐厅已通过认证</span></li>
                                    
                                
                            </ul>
                        </section>
                    </article>
                    
                </article>
            </aside>
        </section>
        <span id="element" style="position:absolute;display:none" class="badge">1</span>
        <!--one tip-->
        <!-- <div class="common-layer" id="layer-tip"></div>
        <div id="point-tip" class="point-tip" ng-controller="tipController">
            <div class="point-tab">大家都在点</div>
            <em></em>
            <div class="point-main">
                <i></i>
                <p>看看大家都在点啥</p>
                <button ng-click="closeTip()">知道了</button>
            </div>
        </div> -->
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
    
    <dh-dialog class="disnone" height="420" type="search-address" header="" show="searchAddress">
    <div class="search-address-dialog" ng-controller="searchAddressCtrl">
        
        <div class="search-box">
            <h2>请输入用餐地址，校验是否在配送范围</h2>
            <autocomplete-box keyword="keyword" city="city_name" callback="selectedResult(text)"></autocomplete-box>
        </div>
        <section class="street-error" ng-class="{disblock:isNotFindStreet}">
            <p>很抱歉，我们很难找到您的地址。</p>
            <p>请您检查地址拼写/格式是否正确， 或者联系我们客服获得帮助：4001-517-577</p>
        </section>
        <div class="search-address-footer">
            <ul class="clearfix">
                <li><i class="search-address-img second"></i><span>填写地址、搜索餐厅</span></li>
                <li class="arrow"><i class="icon search-address-arrow-icon"></i></li>
                <li><i class="search-address-img"></i><span>订购美食</span></li>
                <li class="arrow"><i class="icon search-address-arrow-icon"></i></li>
                <li><i class="search-address-img third"></i><span>享受美食</span></li>
            </ul>
        </div>
    </div>
</dh-dialog>

<dh-dialog class="disnone" height="550" index="1001" type="street" header="请选择最靠近你的地址" show="addressShow">
    <ul class="select-street">
        <li ng-repeat="item in shreets" ng-click="resultClick(item)">
            <i class="icon address-yellow"></i>
            <div class="shreets-item">
                <h4 ng-bind="item.name"></h4>
                <h5 ng-bind="item.address"></h5>
            </div>
        </li>
    </ul>
    <div class="street-commet">
        <p>以上列出地址都不正确么？</p>
        <p>请您检查地址拼写/格式是否正确和 <a href="javascript:void(0)" class="link" ng-click="resetStreet()">重新输入您的地址</a>。</p>
    </div>
</dh-dialog>
    
<dh-dialog class="disnone" type='login' height="500" header="登录" show="loginShow" >
    <form class="login-form" novalidate name="loginForm" ng-controller="loginCtrl">
        <div class="form-group">
            <label for="">手机号码</label>
            <div>
                <input type="text" ng-model="user.username" ng-class="{error:user.usernameMessage}" ng-focus="user.usernameMessage=''" maxlength="11" placeholder="请输入你的手机号码" />
                <span class="vaildate-error" ng-if="user.usernameMessage">
                    <span ng-bind="user.usernameMessage"></span>
                </span>
                <span class="vaildate-error" ng-if="user.isLogined">
                    该手机号码尚未注册！<a href="javascript:;" ng-click="locationRegister()" class="link">立即注册</a>
                </span>
            </div>
        </div>
        <div class="form-group mb10">
            <label for="">登录密码</label>
            <div>
                <input type="password" onpaste="return false" ng-model="user.password" ng-focus="user.passwordMessage=''"  ng-class="{error:user.passwordMessage}" maxlength="10" placeholder="请输入登录密码" />
                <span class="vaildate-error" ng-if="user.passwordMessage">
                    <span ng-bind="user.passwordMessage"></span>
                </span>
            </div>
        </div>
        <div ng-init="showCaptcha=0" ng-if="showCaptcha" class="form-group inline clearfix mb10">
            <div class="fl w50p">
                <input type="text" ng-model="user.captcha" ng-focus="user.captchaMessage=''"  ng-class="{error:user.captchaMessage}" placeholder="请输入验证码">
                <span class="vaildate-error" ng-if="user.captchaMessage">
                    <span ng-bind="user.captchaMessage"></span>
                </span>
            </div>
            <label class="fr">
                <dh-captcha change="captchaChange" src="/captcha/"></dh-captcha>
            </label>
        </div>
        <div class="clearfix mb10">
            <dh-checkbox model="user.rememberme" title="记住我" class="fl"></dh-checkbox>
            <a href="/account/password/reset_via_mobile/" target="_blank" class="fs12 fr link">忘记密码</a>
        </div>
        <button class="big-btn btn-green btn mb10" ng-click="loginVaildate()" ng-disabled="loginBtnDisabled" ng-bind="loginBtn"></button>
        <div class="clearfix">
            <span class="fr fs12">
                没有账号?
                <a href="javascript:void(0)" ng-click="locationRegister()" class="link">立即注册</a>
            </span>
        </div>
    </form>
</dh-dialog>
<dh-dialog class="disnone" type='register' height="500" header="注册" show="registerShow" >
    <form ng-controller="registerCtrl" class="register-form" name="registerForm">
        <div class="form-group mb10">
            <label for="">手机号码</label>
            <div>
                <input type="text" ng-class="{error:user.usernameMessage}" maxlength="11" placeholder="请输入您的手机号码" ng-model="user.username"/>
                <span class="vaildate-error" ng-if="user.usernameMessage">
                    <span ng-bind="user.usernameMessage"></span>
                </span>
                <span class="vaildate-error" ng-if="user.isRegistered">
                    该手机号码已经注册！<a href="javascript:;" ng-click="locationLogin()" class="link">立即登录</a>
                </span>
            </div>
        </div>



        <div class="form-group captcha-wrap">
            <div class="clearfix captcha-box">
                <div class="fl form-group captcha-item">
                    <div class="fl w50p">
                        <input type="text" ng-class="{error:user.captchaMessage}" ng-focus="user.captchaMessage=''" placeholder="请输入验证码" ng-model="user.captcha" />
                        <span class="vaildate-error" ng-if="user.captchaMessage">
                            <span ng-bind="user.captchaMessage"></span>
                        </span>
                    </div>
                    <button class="fs12 fr w40p btn btn-pink" ng-click="getCaptcha()" ng-disabled="captchaDisabled" ng-bind="captchaVal"></button>
                </div>
                <div class="fl form-group captcha-item">
                    <div class="fl w50p">
                        <input type="text" ng-model="user.imgCaptcha" maxlength="4" ng-disabled="imgCaptchaIsDisabled" ng-class="{error:user.imgCaptchaMessage}" placeholder="请输入验证码">
                        <span class="vaildate-error" ng-if="user.imgCaptchaMessage">
                            <span ng-bind="user.imgCaptchaMessage"></span>
                        </span>
                    </div>
                    <label class="fr">
                        <dh-captcha style="width:119px;height:34px;" change="captchaImgChange" src="/captcha/"></dh-captcha>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group mb10">
            <label for="">登录密码</label>
            <div><input type="password" ng-class="{error:user.passwordMessage}" ng-focus="user.passwordMessage=''"  maxlength="10" onpaste="return false" placeholder="输入登录密码 6-10个字符" ng-model="user.password" />
                <span class="vaildate-error" ng-if="user.passwordMessage">
                    <span ng-bind="user.passwordMessage"></span>
                </span>
            </div>
        </div>
        <div class="form-group mb10">
            <div><input type="password" ng-class="{error:user.password2Message}" ng-focus="user.password2Message=''" maxlength="10" onpaste="return false" placeholder="输入登录密码 6-10个字符" ng-model="user.password2"/>
                <span class="vaildate-error" ng-if="user.password2Message">
                    <span ng-bind="user.password2Message"></span>
                </span>
            </div>
        </div>
        <div class="clearfix mb10">
            <dh-checkbox model="user.remember" title="我同意外卖超人" class="fl"></dh-checkbox>
            <a href="/terms-and-conditions/" target="_blank" class="fs12 fl link"> " 注册条款 "</a>
        </div>
        <button ng-disabled="!user.remember || registerBtnDisabled" ng-click="registerVaildate()" class="big-btn btn-green btn mb10" ng-bind="registerBtn"></button>
    </form>
</dh-dialog>
<script>
    var common_sms_code = '/ajax/common_sms_code/';
    var ajax_customer_user_register_start = '/ajax/customer_user_register_start/';
    var common_validate_sms_code = '/ajax/common_validate_sms_code/';
    var ajax_customer_user_register_register = '/ajax/customer_user_register_register/';
</script>

    <dh-dialog type="search-address" hideclose="1" class="disnone" header="" show="notInRange">
        <div class="not-in-range">
            <p>此餐厅不在配送范围内，我们将展示您</p>
            <p class="fs20 link">附近可配送的全部餐厅。</p>
        </div>
    </dh-dialog>
    <dh-dialog type="accessory" class="disnone" header="[[accessoryTitle]]" show="accessoryShow">
        <div class="tab">
            <div class="tab-nav clearfix">
                <div class="fl">
                    <i class="icon tab-left-icon"></i>
                </div>
                <nav class="fl">
                    <ul class="accessory-nav clearfix" id="accessory-nav">
                        <li ng-class="{star:options.mandatory,active:curIndex==$index}" ng-init="init($index,options.mandatory)"
                            ng-click="changeAccessoryContent($index,options.mandatory)" ng-repeat="options in optionSets">
                            <span>
                                <span ng-bind="options.name"></span>
                                <span class="select-accessory-count">(<span ng-bind="selectTabCount[$index]"></span>)</span>
                            </span>
                        </li>
                    </ul>
                </nav>
                <div class="fr">
                    <i class="icon tab-right-icon"></i>
                </div>
            </div>
            <div class="tab-content">
                <ul class="accessory-main clearfix" ng-click="handleContentClick($event)">
                    <li ng-repeat="item in current_options.options" ng-class="{clearboth:$index%4==0}" ng-init="setCatchData(item);autoSelect()">
                        <div ng-if="current_options.mandatory">
                            <dh-radio model="optional[curIndex]" title="[[item.name]]" value="item.id" id="checked"></dh-radio>
                        </div>
                        <div ng-if="!current_options.mandatory">
                            <dh-checkbox model="optional[curIndex+'-'+$index]" title="[[item.name]]" value="item.id"></dh-checkbox>
                        </div>
                        <span class="accessory-price">￥[[item.price|number:2]]</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="checked-accessory">已选辅料( [[selectedAccessory.length]] )</div>
        <ul class="accessory-checked clearfix">
            <li ng-repeat="option in selectedAccessory" ng-class="{clearboth:$index%4==0}">
                 
                <div class="accessory-mandatory" ng-bind="option.name"></div>
                <span class="accessory-price">￥<span ng-bind="option.price|number:2"></span></span>
            </li>
        </ul>
        <div class="accessory-total">
            <div class="food-price"><span ng-bind="footItemName"></span>：￥<span ng-bind="footItemPrice|number:2"></span></div>
            <div class="accessory-price">已选辅料价格：￥<span ng-bind="selectedAccessoryPrice|number:2"></span></div>
            <div class="subtotal">小计：￥<span ng-bind="subtotal|number:2"></span></div>
            <div class="add-cart">
                <button class="btn" ng-disabled="isDisabledPut" ng-click="putCart()">
                    <i class="icon cart-icon2"></i>
                    放到购物车
                </button>
            </div>
        </div>
    </dh-dialog>
    <dh-dialog class="disnone" type="alert" index="1001" header="" show="createOrderError">
        <div class="alert-box error">
            <p style="padding-right:20px;">
                <span ng-bind="createOrderErrorMsg"></span><a href="javascript:" title="清空购物车" class="clearShopingCart" ng-show="clearShopCart" ng-click="clearShopingCart()">清空购物车</a>
            </p>
        </div>
    </dh-dialog>
    <dh-dialog class="disnone" type="alert" index="1001" header="" show="showErrorMsg">
        <div class="alert-box" ng-class="errorIcon">
            <p ng-bind="errorMsg"></p>
        </div>
    </dh-dialog>
    <dh-dialog class="disnone" type="alert" index="1002" header="" show="restaurantRest">
        <div class="alert-box warning">
            <p>该餐厅休息中，暂不支持下单。</p>
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
        var sections = [{"description": "\u6b64\u533a\u57df\u70b9\u9910\uff0c\u6bcf\u4efd\u7acb\u51cf6\u5143", "image": null, "recommended": false, "id": 189417, "menu_items": [{"qiniu_url": "", "additions": [{"visible": true, "is_valid": true, "name": "\u70b9\u6b64\u83dc\u54c1\u7acb\u51cf6\u5143", "price": -6.00, "logo_url": "", "id": 7912}], "name": "[\u51cf]\u9ebb\u5a46\u8c46\u8150\u4fbf\u5f53", "optionsets": [], "ordercount": 0, "position": 1, "price": 22.00, "id": 2237631, "description": ""}, {"qiniu_url": "", "additions": [{"visible": true, "is_valid": true, "name": "\u70b9\u6b64\u83dc\u54c1\u7acb\u51cf6\u5143", "price": -6.00, "logo_url": "", "id": 7912}], "name": "[\u51cf]\u516b\u5b9d\u83dc\u4fbf\u5f53", "optionsets": [], "ordercount": 0, "position": 2, "price": 25.00, "id": 2237632, "description": ""}, {"qiniu_url": "", "additions": [{"visible": true, "is_valid": true, "name": "\u70b9\u6b64\u83dc\u54c1\u7acb\u51cf6\u5143", "price": -6.00, "logo_url": "", "id": 7912}], "name": "[\u51cf]\u94c1\u677f\u70e7\u8089\u4fbf\u5f53", "optionsets": [], "ordercount": 0, "position": 3, "price": 28.00, "id": 2237633, "description": ""}, {"qiniu_url": "", "additions": [{"visible": true, "is_valid": true, "name": "\u70b9\u6b64\u83dc\u54c1\u7acb\u51cf6\u5143", "price": -6.00, "logo_url": "", "id": 7912}], "name": "[\u51cf]\u87f9\u5473\u83c7\u8304\u5b50\u94c1\u677f\u70e7\u8089\u4fbf\u5f53", "optionsets": [], "ordercount": 0, "position": 4, "price": 25.00, "id": 2237634, "description": ""}, {"qiniu_url": "", "additions": [{"visible": true, "is_valid": true, "name": "\u70b9\u6b64\u83dc\u54c1\u7acb\u51cf6\u5143", "price": -6.00, "logo_url": "", "id": 7912}], "name": "[\u51cf]\u5e72\u70e7\u732a\u8089\u8304\u5b50\u4fbf\u5f53", "optionsets": [], "ordercount": 2, "position": 5, "price": 25.00, "id": 2237635, "description": ""}, {"qiniu_url": "", "additions": [{"visible": true, "is_valid": true, "name": "\u70b9\u6b64\u83dc\u54c1\u7acb\u51cf6\u5143", "price": -6.00, "logo_url": "", "id": 7912}], "name": "[\u51cf]\u5e72\u70e7\u9e21\u86cb\u87f9\u8089\u4fbf\u5f53", "optionsets": [], "ordercount": 0, "position": 6, "price": 25.00, "id": 2237636, "description": ""}, {"qiniu_url": "", "additions": [{"visible": true, "is_valid": true, "name": "\u70b9\u6b64\u83dc\u54c1\u7acb\u51cf6\u5143", "price": -6.00, "logo_url": "", "id": 7912}], "name": "[\u51cf]\u7092\u7d20\u83dc\u4fbf\u5f53", "optionsets": [], "ordercount": 0, "position": 7, "price": 23.00, "id": 2237637, "description": ""}, {"qiniu_url": "", "additions": [{"visible": true, "is_valid": true, "name": "\u70b9\u6b64\u83dc\u54c1\u7acb\u51cf6\u5143", "price": -6.00, "logo_url": "", "id": 7912}], "name": "[\u51cf]\u8fa3\u767d\u83dc\u70e7\u8089\u4fbf\u5f53", "optionsets": [], "ordercount": 0, "position": 8, "price": 30.00, "id": 2237638, "description": ""}], "name": "\u4efd\u4efd\u51cf6\u5143\u6d3b\u52a8\u4e13\u533a"}, {"description": null, "image": null, "recommended": false, "id": 25305, "menu_items": [{"qiniu_url": "http://dhcmenuitem.dhero.cn/142660475314614411364030092955", "additions": [], "name": "\u6d77\u9c9c\u829d\u9ebb\u98ce\u51b7\u9762", "optionsets": [], "ordercount": 2, "position": 0, "price": 42.00, "id": 559095, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142660448485012150529958307743", "additions": [], "name": "\u548c\u98ce\u6d77\u9c9c\u51b7\u9762", "optionsets": [], "ordercount": 2, "position": 1, "price": 38.00, "id": 559105, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/1426604506846864286175230518", "additions": [], "name": "\u829d\u9ebb\u98ce\u5473\u51b7\u9762", "optionsets": [], "ordercount": 22, "position": 2, "price": 26.00, "id": 559106, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142660453082328511429228819907", "additions": [], "name": "\u548c\u98ce\u51b7\u9762", "optionsets": [], "ordercount": 8, "position": 3, "price": 24.00, "id": 559107, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14266047241531294354081619531", "additions": [], "name": "\u8fa3\u767d\u83dc\u51b7\u9762(\u539f\u4ef735)", "optionsets": [], "ordercount": 13, "position": 4, "price": 30.00, "id": 590974, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14266045953096752821675036103", "additions": [], "name": "\u571f\u9e21\u86cb\u4e1d\u548c\u98ce\u51b7\u9762", "optionsets": [], "ordercount": 1, "position": 5, "price": 38.00, "id": 590975, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142660462463044115045526996255", "additions": [], "name": "\u571f\u9e21\u86cb\u4e1d\u829d\u9ebb\u98ce\u51b7\u9762", "optionsets": [], "ordercount": 6, "position": 6, "price": 42.00, "id": 590976, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14266046529918752918499521911", "additions": [], "name": "\u53c9\u70e7\u548c\u98ce\u51b7\u9762", "optionsets": [], "ordercount": 6, "position": 7, "price": 38.00, "id": 590977, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14266046865429880380171816796", "additions": [], "name": "\u53c9\u70e7\u829d\u9ebb\u98ce\u51b7\u9762", "optionsets": [], "ordercount": 9, "position": 8, "price": 42.00, "id": 590978, "description": ""}], "name": "\u51b7\u9762\u7cfb\u5217"}, {"description": "", "image": null, "recommended": false, "id": 25301, "menu_items": [{"qiniu_url": "http://dhcmenuitem.dhero.cn/14258121604699352190920617431", "additions": [], "name": "\u65e5\u5f0f\u70e4\u591a\u6625\u9c7c\u4fbf\u5f53", "optionsets": [], "ordercount": 9, "position": 0, "price": 26.00, "id": 558972, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142581223137413955022022128105", "additions": [], "name": "\u65e5\u5f0f\u70e4\u9cb3\u9c7c\u4fbf\u5f53", "optionsets": [], "ordercount": 33, "position": 2, "price": 30.00, "id": 558998, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258122435561864683071617037", "additions": [], "name": "\u65e5\u5f0f\u70e4\u79cb\u5200\u9c7c\u4fbf\u5f53", "optionsets": [], "ordercount": 35, "position": 3, "price": 22.00, "id": 558999, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258122558049555131976958364", "additions": [], "name": "\u65e5\u5f0f\u94c1\u677f\u70e7\u8089\u4fbf\u5f53", "optionsets": [], "ordercount": 199, "position": 4, "price": 23.00, "id": 559001, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258122653808131334355566651", "additions": [], "name": "\u65e5\u5f0f\u70b8\u9e21\u5757\u4fbf\u5f53", "optionsets": [], "ordercount": 190, "position": 5, "price": 22.00, "id": 559002, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/1425812300322917620838386938", "additions": [], "name": "\u65e5\u5f0f\u70e4\u9752\u82b1\u9c7c\u4fbf\u5f53", "optionsets": [], "ordercount": 45, "position": 11, "price": 33.00, "id": 558995, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258123403308944282019510865", "additions": [], "name": "\u65e5\u5f0f\u8fa3\u767d\u83dc\u70e7\u8089\u4fbf\u5f53", "optionsets": [], "ordercount": 28, "position": 13, "price": 24.00, "id": 559000, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14266032503424814076451584697", "additions": [], "name": "\u65e5\u5f0f\u5e72\u70e7\u9e21\u86cb\u87f9\u8089\u4fbf\u5f53", "optionsets": [], "ordercount": 13, "position": 14, "price": 21.00, "id": 559005, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14266032080665809596630278975", "additions": [], "name": "\u65e5\u5f0f\u97ed\u83dc\u7092\u86cb\u4fbf\u5f53", "optionsets": [], "ordercount": 4, "position": 15, "price": 23.00, "id": 559006, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14266031615415642492109909654", "additions": [], "name": "\u65e5\u5f0f\u9ebb\u5a46\u8c46\u8150\u4fbf\u5f53", "optionsets": [], "ordercount": 30, "position": 17, "price": 19.00, "id": 559012, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14266031314005406017394270748", "additions": [], "name": "\u65e5\u5f0f\u70e4\u4e09\u6587\u9c7c\u4fbf\u5f53", "optionsets": [], "ordercount": 44, "position": 18, "price": 39.00, "id": 558923, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14266030605768541052464861423", "additions": [], "name": "\u65e5\u5f0f\u87f9\u5473\u83c7\u8304\u5b50\u94c1\u677f\u70e7\u8089\u4fbf\u5f53", "optionsets": [], "ordercount": 43, "position": 21, "price": 21.00, "id": 559007, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14266030964248654665104113519", "additions": [], "name": "\u65e5\u5f0f\u97ed\u83dc\u7092\u732a\u809d\u4fbf\u5f53", "optionsets": [], "ordercount": 7, "position": 22, "price": 21.00, "id": 559008, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258124348289665521364659071", "additions": [], "name": "\u65e5\u5f0f\u7092\u7d20\u83dc\u4fbf\u5f53", "optionsets": [], "ordercount": 14, "position": 23, "price": 19.00, "id": 559011, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u716e\u732a\u6392\u4fbf\u5f53", "optionsets": [], "ordercount": 37, "position": 1, "price": 33.00, "id": 558990, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u5496\u55b1\u87f9\u5473\u83c7\u4fbf\u5f53", "optionsets": [], "ordercount": 9, "position": 6, "price": 21.00, "id": 559003, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u5e72\u70e7\u732a\u8089\u8304\u5b50\u4fbf\u5f53", "optionsets": [], "ordercount": 38, "position": 7, "price": 21.00, "id": 559004, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u516b\u5b9d\u83dc\u4fbf\u5f53", "optionsets": [], "ordercount": 5, "position": 8, "price": 21.00, "id": 559009, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u716e\u725b\u8089\u4fbf\u5f53", "optionsets": [], "ordercount": 64, "position": 9, "price": 36.00, "id": 558991, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u5496\u55b1\u725b\u8089\u4fbf\u5f53", "optionsets": [], "ordercount": 35, "position": 10, "price": 36.00, "id": 558994, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u716e\u9752\u82b1\u9c7c\u4fbf\u5f53", "optionsets": [], "ordercount": 20, "position": 12, "price": 38.00, "id": 558997, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u9ebb\u5a46\u8304\u5b50\u4fbf\u5f53", "optionsets": [], "ordercount": 10, "position": 16, "price": 21.00, "id": 559010, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u5496\u55b1\u732a\u6392\u4fbf\u5f53", "optionsets": [], "ordercount": 64, "position": 19, "price": 33.00, "id": 558992, "description": ""}], "name": "\u3010\u516b\u4e94\u6298\u4fbf\u5f53\u533a\u3011"}, {"description": null, "image": null, "recommended": false, "id": 25300, "menu_items": [{"qiniu_url": "http://dhcmenuitem.dhero.cn/14280691542685567200763616711", "additions": [], "name": "\u65e5\u5f0f\u9752\u6912\u8089\u4e1d", "optionsets": [], "ordercount": 13, "position": null, "price": 25.00, "id": 558913, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142806917875637372537166811526", "additions": [], "name": "\u65e5\u5f0f\u5e72\u70e7\u9e21\u86cb\u87f9\u8089", "optionsets": [], "ordercount": 9, "position": null, "price": 25.00, "id": 558917, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14280691892087893752411473542", "additions": [], "name": "\u65e5\u5f0f\u97ed\u83dc\u7092\u732a\u809d", "optionsets": [], "ordercount": 21, "position": null, "price": 25.00, "id": 558919, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142806921278042418279591947794", "additions": [], "name": "\u65e5\u5f0f\u7092\u7d20\u83dc", "optionsets": [], "ordercount": 31, "position": null, "price": 18.00, "id": 558922, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14280691108554215591656975448", "additions": [], "name": "\u65e5\u5f0f\u97ed\u83dc\u7092\u571f\u9e21\u86cb", "optionsets": [], "ordercount": 11, "position": null, "price": 35.00, "id": 558903, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14280691398849478654891718179", "additions": [], "name": "\u65e5\u5f0f\u94c1\u677f\u70e7\u8089", "optionsets": [], "ordercount": 32, "position": null, "price": 30.00, "id": 558906, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142806924964629731218912638724", "additions": [], "name": "\u65e5\u5f0f\u716e\u725b\u8089", "optionsets": [], "ordercount": 29, "position": 558905, "price": 38.00, "id": 558905, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142806926426326311941305175424", "additions": [], "name": "\u65e5\u5f0f\u6cb9\u6dcb\u9e21", "optionsets": [], "ordercount": 33, "position": 558908, "price": 26.00, "id": 558908, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142806927484017436699196696281", "additions": [], "name": "\u65e5\u5f0f\u9ebb\u5a46\u8304\u5b50", "optionsets": [], "ordercount": 9, "position": 558918, "price": 25.00, "id": 558918, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14280692870398449877810198814", "additions": [], "name": "\u65e5\u5f0f\u97ed\u83dc\u7092\u86cb", "optionsets": [], "ordercount": 4, "position": 558920, "price": 27.00, "id": 558920, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14280692963937271462718490511", "additions": [], "name": "\u65e5\u5f0f\u9ebb\u5a46\u8c46\u8150", "optionsets": [], "ordercount": 17, "position": 558921, "price": 20.00, "id": 558921, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u725b\u5fc3\u83dc\u5473\u66fe\u94c1\u677f\u70e7\u8089", "optionsets": [], "ordercount": 14, "position": null, "price": 25.00, "id": 558912, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u732a\u8089\u5473\u589e\u7092\u8304\u5b50", "optionsets": [], "ordercount": 13, "position": null, "price": 25.00, "id": 558914, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u5e72\u70e7\u732a\u8089\u8304\u5b50", "optionsets": [], "ordercount": 9, "position": null, "price": 25.00, "id": 558916, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u5e72\u70e7\u9cb3\u9c7c", "optionsets": [], "ordercount": 4, "position": null, "price": 88.00, "id": 558870, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u5496\u55b1\u732a\u6392", "optionsets": [], "ordercount": 7, "position": null, "price": 40.00, "id": 558901, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u5496\u55b1\u725b\u8089", "optionsets": [], "ordercount": 12, "position": null, "price": 38.00, "id": 558902, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u716e\u732a\u6392", "optionsets": [], "ordercount": 3, "position": null, "price": 36.00, "id": 558904, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u87f9\u5473\u83c7\u8304\u5b50\u94c1\u677f\u70e7\u8089", "optionsets": [], "ordercount": 14, "position": null, "price": 25.00, "id": 558909, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u516b\u5b9d\u83dc", "optionsets": [], "ordercount": 5, "position": null, "price": 26.00, "id": 558910, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u5e72\u70e7\u867e\u4ec1", "optionsets": [], "ordercount": 7, "position": 558900, "price": 68.00, "id": 558900, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u8fa3\u767d\u83dc\u7092\u8089", "optionsets": [], "ordercount": 22, "position": 558907, "price": 28.00, "id": 558907, "description": ""}], "name": "\u4e00\u54c1\u6599\u7406"}, {"description": null, "image": null, "recommended": false, "id": 25302, "menu_items": [{"qiniu_url": "", "additions": [], "name": "\u5496\u55b1\u9e21\u817f\u76d6\u6d47\u996d", "optionsets": [], "ordercount": 12, "position": null, "price": 22.00, "id": 559056, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u725b\u4e3c/\u4e2d", "optionsets": [], "ordercount": 29, "position": null, "price": 25.00, "id": 559060, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u9ebb\u5a46\u996d", "optionsets": [], "ordercount": 6, "position": null, "price": 20.00, "id": 559061, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u4e2d\u534e\u996d", "optionsets": [], "ordercount": 9, "position": null, "price": 18.00, "id": 559062, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u725b\u4e3c/\u5927", "optionsets": [], "ordercount": 27, "position": null, "price": 28.00, "id": 559052, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u5496\u55b1\u732a\u6392\u76d6\u6d47\u996d", "optionsets": [], "ordercount": 14, "position": null, "price": 23.00, "id": 559054, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u5e72\u70e7\u9e21\u86cb\u996d", "optionsets": [], "ordercount": 5, "position": null, "price": 22.00, "id": 559055, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u4eb2\u5b50\u996d", "optionsets": [], "ordercount": 0, "position": 0, "price": 24.00, "id": 2180153, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u70e7\u8089\u4e3c", "optionsets": [], "ordercount": 9, "position": 559058, "price": 25.00, "id": 559058, "description": ""}], "name": "\u76d6\u6d47\u996d\u7cfb\u5217"}, {"description": "", "image": null, "recommended": false, "id": 122476, "menu_items": [{"qiniu_url": "http://dhcmenuitem.dhero.cn/14266885069648087543265428394", "additions": [], "name": "\u65e5\u5f0f\u829d\u9ebb\u5473\u564c\u6cbe\u6cbe\u9762(\u539f\u4ef732\u5143)", "optionsets": [], "ordercount": 14, "position": 0, "price": 26.00, "id": 1562368, "description": "\u829d\u9ebb\u5473\u564c\u5473"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142668843896746840784954838455", "additions": [], "name": "\u65e5\u5f0f\u8f9b\u5473\u829d\u9ebb\u6cbe\u6cbe\u9762(\u539f\u4ef732\u5143", "optionsets": [], "ordercount": 19, "position": 0, "price": 26.00, "id": 1562366, "description": "\u8fa3\u5473"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/1426688485140022877077106386423", "additions": [], "name": "\u65e5\u5f0f\u6d77\u9c9c\u9171\u6cb9\u6cbe\u6cbe\u9762(\u539f\u4ef732\u5143)", "optionsets": [], "ordercount": 9, "position": 0, "price": 26.00, "id": 1562367, "description": "\u9171\u6cb9\u5473"}], "name": "\u65e5\u5f0f\u6cbe\u6cbe\u9762\u7c7b"}, {"description": "", "image": null, "recommended": false, "id": 168983, "menu_items": [{"qiniu_url": "http://dhcmenuitem.dhero.cn/14258120091488188448394648731", "additions": [], "name": "\u80a5\u725b\u5bff\u559c\u9505", "optionsets": [], "ordercount": 6, "position": 0, "price": 28.00, "id": 2026769, "description": "\u6c64/\u6c64\u98df\u7c7b"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258120215667389527354389429", "additions": [], "name": "\u87f9\u6392\u5bff\u559c\u9505", "optionsets": [], "ordercount": 0, "position": 0, "price": 24.00, "id": 2026771, "description": "\u6c64/\u6c64\u98df\u7c7b"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258120362925413152968976647", "additions": [], "name": "\u6d77\u9c9c\u5bff\u559c\u9505", "optionsets": [], "ordercount": 1, "position": 0, "price": 28.00, "id": 2026772, "description": "\u6c64/\u6c64\u98df\u7c7b"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142581206031728475282015278935", "additions": [], "name": "\u5bff\u559c\u9505\u5e74\u7cd5", "optionsets": [], "ordercount": 0, "position": 0, "price": 24.00, "id": 2026785, "description": "\u6c64/\u6c64\u98df\u7c7b"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258120490529422179013490677", "additions": [], "name": "\u5bff\u559c\u9505\u4e4c\u51ac\u9762", "optionsets": [], "ordercount": 3, "position": 0, "price": 24.00, "id": 2026781, "description": "\u6c64/\u6c64\u98df\u7c7b"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258119905496936784696299583", "additions": [], "name": "\u5bff\u559c\u9505", "optionsets": [], "ordercount": 2, "position": 0, "price": 21.00, "id": 2026767, "description": "\u6c64/\u6c64\u98df\u7c7b"}], "name": "\u5bff\u559c\u9505\u7cfb\u5217"}, {"description": "\u5957\u9910", "image": null, "recommended": false, "id": 168984, "menu_items": [{"qiniu_url": "http://dhcmenuitem.dhero.cn/14258119354368155831098556519", "additions": [], "name": "\u80a5\u725b\u5bff\u559c\u9505\u5957\u9910\u7279\u4ef7", "optionsets": [], "ordercount": 5, "position": 0, "price": 41.00, "id": 2026800, "description": "\u6c64+\u7c73\u996d+\u5c0f\u4efd\u6cb9\u6dcb\u9e21"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142581197008417081292811781168", "additions": [], "name": "\u5bff\u559c\u9505\u5957\u9910\u7279\u4ef7", "optionsets": [], "ordercount": 0, "position": 0, "price": 34.00, "id": 2026794, "description": "\u6c64+\u7c73\u996d+\u5c0f\u4efd\u6cb9\u6dcb\u9e21"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258119512429560842211358249", "additions": [], "name": "\u87f9\u6392\u5bff\u559c\u9505\u5957\u9910\u7279\u4ef7", "optionsets": [], "ordercount": 1, "position": 0, "price": 37.00, "id": 2026803, "description": "\u6c64+\u7c73\u996d+\u5c0f\u4efd\u6cb9\u6dcb\u9e21"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142581196022216549888695590198", "additions": [], "name": "\u6d77\u9c9c\u5bff\u559c\u9505\u5957\u9910\u7279\u4ef7", "optionsets": [], "ordercount": 0, "position": 0, "price": 41.00, "id": 2026805, "description": "\u6c64+\u7c73\u996d+\u5c0f\u4efd\u6cb9\u6dcb\u9e21"}], "name": "\u5bff\u559c\u9505\u5957\u9910\u7cfb\u5217"}, {"description": "", "image": null, "recommended": false, "id": 168980, "menu_items": [{"qiniu_url": "", "additions": [], "name": "\u751f\u9cb7\u7279\u4ef7", "optionsets": [], "ordercount": 0, "position": 0, "price": 40.00, "id": 2026648, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u4e09\u6587\u9c7c/\u4e2d", "optionsets": [], "ordercount": 1, "position": 0, "price": 48.00, "id": 2026646, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u4e09\u6587\u9c7c/\u5927", "optionsets": [], "ordercount": 0, "position": 0, "price": 88.00, "id": 2026647, "description": ""}], "name": "\u523a\u8eab\u7cfb\u5217"}, {"description": null, "image": null, "recommended": false, "id": 25308, "menu_items": [{"qiniu_url": "http://dhcmenuitem.dhero.cn/1425811904449027837260626256466", "additions": [], "name": "\u714e\u997a/\u5c0f", "optionsets": [], "ordercount": 59, "position": 559152, "price": 11.00, "id": 559152, "description": "5\u4e2a"}, {"qiniu_url": "", "additions": [], "name": "\u714e\u997a/\u5927", "optionsets": [], "ordercount": 26, "position": 559146, "price": 31.00, "id": 559146, "description": "15\u4e2a"}, {"qiniu_url": "", "additions": [], "name": "\u714e\u997a/\u4e2d", "optionsets": [], "ordercount": 44, "position": 559151, "price": 21.00, "id": 559151, "description": "10\u4e2a"}], "name": "\u7279\u8272\u714e\u997a"}, {"description": null, "image": null, "recommended": false, "id": 25299, "menu_items": [{"qiniu_url": "http://dhcmenuitem.dhero.cn/142581212597419827453279867768", "additions": [], "name": "\u65e5\u5f0f\u6cb9\u6dcb\u9e21", "optionsets": [], "ordercount": 172, "position": 0, "price": 26.00, "id": 558862, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/1425812370943506022191606462", "additions": [], "name": "\u5bc6\u5236\u5927\u5e03\u4e01\u7279\u4ef7", "optionsets": [], "ordercount": 480, "position": 1, "price": 15.00, "id": 558868, "description": ""}], "name": "\u7279\u8272\u6cb9\u6dcb\u9e21/\u5e03\u4e01"}, {"description": null, "image": null, "recommended": false, "id": 25304, "menu_items": [{"qiniu_url": "", "additions": [], "name": "\u829d\u9ebb\u548c\u98ce\u8272\u62c9", "optionsets": [], "ordercount": 149, "position": null, "price": 17.00, "id": 559091, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u548c\u98ce\u8272\u62c9", "optionsets": [], "ordercount": 28, "position": null, "price": 15.00, "id": 559092, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u8fa3\u767d\u83dc", "optionsets": [], "ordercount": 33, "position": null, "price": 10.00, "id": 559093, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u65e5\u5f0f\u6d77\u8349", "optionsets": [], "ordercount": 65, "position": null, "price": 10.00, "id": 559094, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u91d1\u9488\u83c7\u62cc\u9ec4\u74dc", "optionsets": [], "ordercount": 31, "position": null, "price": 16.00, "id": 559079, "description": ""}], "name": "\u852c\u83dc\u8272\u62c9\u7cfb\u5217"}, {"description": null, "image": null, "recommended": false, "id": 25306, "menu_items": [{"qiniu_url": "", "additions": [], "name": "\u94c1\u677f\u7092\u4e4c\u51ac\u9762", "optionsets": [], "ordercount": 202, "position": 1, "price": 18.00, "id": 559108, "description": ""}], "name": "\u7092\u9762\u7cfb\u5217"}, {"description": null, "image": null, "recommended": false, "id": 25307, "menu_items": [{"qiniu_url": "http://dhcmenuitem.dhero.cn/142806939755403276293305680156", "additions": [], "name": "\u70e4\u591a\u6625\u9c7c/4\u6761", "optionsets": [], "ordercount": 30, "position": null, "price": 16.00, "id": 559144, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14280693667756922184340655804", "additions": [], "name": "\u70e4\u4e09\u6587\u9c7c", "optionsets": [], "ordercount": 22, "position": null, "price": 38.00, "id": 559114, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/1428069377305640650216024369", "additions": [], "name": "\u70e4\u9cb3\u9c7c/\u6761", "optionsets": [], "ordercount": 9, "position": null, "price": 25.00, "id": 559141, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14280693866656245490235742182", "additions": [], "name": "\u70e4\u79cb\u5200\u9c7c/\u6761", "optionsets": [], "ordercount": 82, "position": null, "price": 18.00, "id": 559143, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/1428069415215042204298079013824", "additions": [], "name": "\u70e4\u9752\u82b1\u9c7c", "optionsets": [], "ordercount": 29, "position": 559139, "price": 28.00, "id": 559139, "description": ""}], "name": "\u70e4\u7269\u7cfb\u5217"}, {"description": "", "image": null, "recommended": false, "id": 25310, "menu_items": [{"qiniu_url": "http://dhcmenuitem.dhero.cn/14266040049219962146454490721", "additions": [], "name": "\u7c73\u996d/\u4e2d", "optionsets": [], "ordercount": 108, "position": null, "price": 3.00, "id": 559159, "description": ""}, {"qiniu_url": "", "additions": [], "name": "\u7c73\u996d/\u5927", "optionsets": [], "ordercount": 37, "position": null, "price": 5.00, "id": 560160, "description": ""}], "name": "\u7c73\u996d"}, {"description": null, "image": null, "recommended": false, "id": 25311, "menu_items": [{"qiniu_url": "http://dhcmenuitem.dhero.cn/142581155250225208035157993436", "additions": [], "name": "\u9ed1\u4e4c\u9f99\u8336   ", "optionsets": [], "ordercount": 24, "position": null, "price": 8.00, "id": 559200, "description": "\u74f6"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142581157141205054806708358228", "additions": [], "name": "\u96ea\u78a7 ", "optionsets": [], "ordercount": 7, "position": null, "price": 6.00, "id": 559203, "description": "\u7f50"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142581158197425344133260659873", "additions": [], "name": "\u767e\u4e8b\u53ef\u4e50", "optionsets": [], "ordercount": 11, "position": null, "price": 6.00, "id": 559204, "description": "\u7f50"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258115944954149988682474941", "additions": [], "name": "\u53ef\u53e3\u53ef\u4e50", "optionsets": [], "ordercount": 13, "position": null, "price": 6.00, "id": 559205, "description": "\u7f50"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142581162698406904030777513981", "additions": [], "name": "\u679c\u7c92\u6a591.25L", "optionsets": [], "ordercount": 1, "position": null, "price": 18.00, "id": 560751, "description": "\u74f6"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258116062443986762883141637", "additions": [], "name": "\u52a0\u591a\u5b9d", "optionsets": [], "ordercount": 18, "position": null, "price": 8.00, "id": 559206, "description": "\u7f50"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258115349614898559188004583", "additions": [], "name": "\u7ea2\u725b", "optionsets": [], "ordercount": 4, "position": null, "price": 10.00, "id": 559198, "description": "\u7f50"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258116368907343224382493645", "additions": [], "name": "\u53ef\u53e3\u53ef\u4e502L", "optionsets": [], "ordercount": 0, "position": 0, "price": 15.00, "id": 2026566, "description": "\u74f6"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258116466206997791028115898", "additions": [], "name": "\u767e\u4e8b\u53ef\u4e502L", "optionsets": [], "ordercount": 0, "position": 0, "price": 15.00, "id": 2026567, "description": "\u74f6"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142581165577202025330113247037", "additions": [], "name": "\u96ea\u78a72L", "optionsets": [], "ordercount": 1, "position": 0, "price": 15.00, "id": 2026568, "description": "\u74f6"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142581166822627141066011972725", "additions": [], "name": "\u767e\u5c81\u5c71570ml", "optionsets": [], "ordercount": 0, "position": 0, "price": 5.00, "id": 2026569, "description": "\u74f6"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142581168360349328217282891273", "additions": [], "name": "\u65e0\u7cd6\u4e4c\u9f99\u8336500cl", "optionsets": [], "ordercount": 1, "position": 0, "price": 6.00, "id": 2026570, "description": "\u74f6"}], "name": "\u996e\u6599"}, {"description": "None", "image": null, "recommended": false, "id": 56459, "menu_items": [{"qiniu_url": "http://dhcmenuitem.dhero.cn/14258117096697485328000038862", "additions": [], "name": "\u4e09\u5f97\u5229\u8d85\u723d\u5564\u9152", "optionsets": [], "ordercount": 36, "position": null, "price": 6.00, "id": 884769, "description": "\u7f50"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258117179149494583695195615", "additions": [], "name": "\u9752\u5c9b\u51b0\u7eaf\u5564\u9152", "optionsets": [], "ordercount": 1, "position": null, "price": 8.00, "id": 884770, "description": "\u7f50"}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14258117298517467306670732796", "additions": [], "name": "\u767e\u5a01\u5564\u9152", "optionsets": [], "ordercount": 2, "position": null, "price": 15.00, "id": 884773, "description": "\u74f6"}], "name": "\u9152\u6c34"}, {"description": null, "image": null, "recommended": true, "id": 39215, "menu_items": [{"qiniu_url": "http://dhcmenuitem.dhero.cn/142615425540822113425540737808", "additions": [], "name": "\u9ec4\u6cb9\u867e\u4ec1\u7092\u996d", "optionsets": [], "ordercount": 8, "position": 0, "price": 38.00, "id": 2048898, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/142615433527424161369469948113", "additions": [], "name": "\u8fa3\u767d\u83dc\u4fbf\u5f53", "optionsets": [], "ordercount": 0, "position": 0, "price": 28.00, "id": 2048900, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/1426153912897003362415824085474", "additions": [], "name": "\u5e03\u4e01", "optionsets": [], "ordercount": 8, "position": 0, "price": 16.00, "id": 2048890, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14261541063989146357635036111", "additions": [], "name": "\u829d\u9ebb\u98ce\u53c9\u70e7\u51b7\u9762", "optionsets": [], "ordercount": 1, "position": 0, "price": 42.00, "id": 2048891, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/14261541915173012366993352771", "additions": [], "name": "\u6d77\u9c9c\u6cbe\u6cbe\u9762", "optionsets": [], "ordercount": 2, "position": 0, "price": 26.00, "id": 2048893, "description": ""}, {"qiniu_url": "http://dhcmenuitem.dhero.cn/141351044817949330244050361216", "additions": [], "name": "\u65e5\u5f0f\u6cb9\u6dcb\u9e21", "optionsets": [], "ordercount": 9, "position": 4, "price": 26.00, "id": 879895, "description": ""}], "name": "\u5e97\u4e3b\u63a8\u8350"}],accessoryObj = {},orderObj=[],other_order={};
        if(sections){
            for(var i = 0 , len = sections.length; i < len; i++){
                var sectionObj = sections[i] , key = '';
                for(var j = 0 , itemLen = sectionObj.menu_items.length; j < itemLen; j++){
                    var menuItemObj = sectionObj.menu_items[j];
                    key = sectionObj.id + '-' + menuItemObj.id;
                    menuItemObj.key = key;
                    menuItemObj.sectionId = sectionObj.id;
                    accessoryObj[key] = menuItemObj;
                }
            }
        }

        if(other_order&&other_order.items){
            //order data
            for(var j=0;j<other_order.items.length;j++){
                if(other_order.items[j].status==true){
                    orderObj.push(other_order.items[j]);
                }
            }   
        }
        var restaurantId='1592';
        var restaurantInRange = true;
        var grid_locationId =  602341 ;
        var inRange = true;
        var can_process_order = true;
        var create_order_url = "/mobile/ajax/create_order/";
        var checkout_url = "/checkout/0/";
        var restaurant_list_url = "/restaurants/0/";
        var favoriteUrl = "/ajax/restaurant/0/favorite/";
        var delivery = {minimum_order_quantity:'150',free_delivery_treshold:'0',delivery_fee:'0' }
    </script>
    <script src="{{asset('Home/js/menupage.js')}}"></script>
    <script src="{{asset('Home/js/favorite.js')}}"></script>

    
    <script>angular.bootstrap(document, ["app"]);</script>

    <!-- Baidu Analytics -->




</body>
</html>
