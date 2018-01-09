<!DOCTYPE html>
<html class="ng-scope" ng-app="eleme" perf-error="desktop/">
  
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
   
    <link rel="apple-touch-icon-precomposed" href="{{asset('Home/Index/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('Home/Index/images/favicon-16x16.png')}}"
    type="image/png">
    <link rel="icon" href="{{asset('Home/Index/images/favicon-16x16.png')}}"
    type="image/png" sizes="16x16">
    <link rel="icon" href="{{asset('Home/Index/images/favicon-32x32.png')}}"
    type="image/png" sizes="32x32">
    <link rel="icon" href="{{asset('Home/Index/images/favicon.png')}}"
    type="image/png" sizes="96x96">
    <link href="{{asset('Home/Index/css/vendor.css')}}" rel="stylesheet">
    <link href="{{asset('Home/Index/css/main.css')}}" rel="stylesheet">
    <!--[if lte IE 8]>
      <script>
        window.location.href = 'https://h.ele.me/activities/landing';
      </script>
    <![endif]-->
    <script src="{{asset('Home/Index/js/api.js')}}" data-ref="API_CONFIG">
    </script>
    <script src="{{asset('Home/Index/js/perf.js')}}" type="text/javascript"
    crossorigin="anonymous">
    </script>
    <script src="%E9%A6%96%E9%A1%B5_H_files/vendor.js" type="text/javascript"
    crossorigin="anonymous">
    </script>
    <script src="{{asset('Home/Index/js/main.js')}}" type="text/javascript"
    crossorigin="anonymous">
    </script>
    <!-- base href="https://www.ele.me/" -->
    <meta content="format=html5; url=http://m.ele.me/place/wx4spk2qsy18" name="mobile-agent">
    <meta content="”饿了么”2008年创立于上海，是中国领先的本地生活平台。截至目前，饿了么在线外卖交易平台已覆盖全国2000个城市，加盟餐厅130万家，用户量达2.6亿"
    name="description">
    <meta content="昌平区兄弟连IT教育(北京华文学院西北)美食，昌平区兄弟连IT教育(北京华文学院西北)商家，昌平区兄弟连IT教育(北京华文学院西北)外卖"
    name="keywords">
  </head>
  
  <body style="position: relative;" cute-title="" ng-class="{hidesidebar: layoutState &amp;&amp; layoutState.hideSidebar, smallbody: layoutState.smallBody, whitebody: layoutState.whiteBody}">
    <div class="ng-isolate-scope" state="layoutState" ng-switch="state.type">
      <!-- ngSwitchWhen: checkout -->
      <!-- ngSwitchDefault: -->
      <div class="ng-scope ng-isolate-scope" ng-switch-default="" topbar-default=""
      state="state">
        <header class="topbar" role="navigation" ng-class="{shoptopbar: state.type === 'shop'}">
          <div class="container clearfix">
            <h1>
              <a href="https://www.ele.me/" hardjump="" class="topbar-logo icon-logo">
                <span>
                  饿了么
                </span>
              </a>
            </h1>
            <a href="https://www.ele.me/" hardjump="" class="topbar-item topbar-homepage focus"
            ng-class="{'focus': $root.locationpath[0] === 'place'}">
              首页
            </a>
            <a href="https://www.ele.me/profile/order" hardjump="" class="topbar-item"
            ng-class="{'focus': $root.locationpath[1] === 'order'}">
              我的订单
            </a>
           <a href="https://www.ele.me/profile/order" hardjump="" class="topbar-item"
            ng-class="{'focus': $root.locationpath[1] === 'order'}">
              加盟合作
            </a>
            <nav class="topbar-nav">
              <a href="https://h5.ele.me/service/agreement/#HEAEDER_SHOW=1" ng-href="//h5.ele.me/service/agreement/#HEAEDER_SHOW=1"
              hardjump="" class="topbar-nav-link" target="_blank">
                规则中心
              </a>
              <div class="topbar-nav-link">
                <i class="topbar-nav-icon icon-mobile">
                </i>
                应用
                <div class="dropbox topbar-mobile-dropbox">
                  <span>
                    扫一扫, 手机订餐更方便
                  </span>
                  <img src="{{asset('Home/Index/images/appqc.png')}}" class="topbar-nav-qrcode"
                  alt="扫一扫下载饿了么手机 App">
                </div>
              </div>
              <div topbar-profilebox="">
                <div class="topbar-profilebox">
                  <!-- ngIf: $root.user.avatar && $root.topbarType !==' checkout' -->
                  <span class="topbar-profilebox-avatar icon-profile ng-hide" ng-show="!$root.user.username">
                  </span>
                  <span class="ng-hide" ng-show="!$root.user.username">
                    <a href="https://h5.ele.me/login/#redirect=https%3A%2F%2Fwww.ele.me%2F"
                    ng-href="//h5.ele.me/login/#redirect=https%3A%2F%2Fwww.ele.me%2F" target="_blank">
                      登录/注册
                    </a>
                  </span>
                  <span class="topbar-profilebox-wrapper" ng-show="$root.user.username">
                    <!-- ngIf: $root.topbarType===' checkout' -->
                    <span class="topbar-profilebox-username ng-binding">
                      1aad68514ac
                    </span>
                    <!-- ngIf: $root.topbarType===' checkout' -->
                    <!-- ngIf: $root.topbarType !==' checkout' -->
                    <span class="topbar-profilebox-btn icon-arrow-down ng-scope" ng-if="$root.topbarType !== 'checkout'">
                    </span>
                    <!-- end ngIf: $root.topbarType !==' checkout' -->
                    <div class="dropbox topbar-profilebox-dropbox">
                      <a class="icon-profile" href="https://www.ele.me/profile" hardjump="">
                        个人中心
                      </a>
                      <a class="icon-star" href="https://www.ele.me/profile/favor" hardjump="">
                        我的收藏
                      </a>
                      <a class="icon-location" href="https://www.ele.me/profile/address" hardjump="">
                        我的地址
                      </a>
                      <a class="icon-setting" href="https://www.ele.me/profile/security" hardjump="">
                        安全设置
                      </a>
                      <a class="icon-logout" href="javascript:" ng-click="logout()">
                        退出登录
                      </a>
                    </div>
                  </span>
                </div>
              </div>
            </nav>
          </div>
        </header>
      </div>
    </div>
    <div class="importantnotification container" role="banner">
      <!-- ngIf: enable -->
    </div>
    <div style="transform: translate3d(0px, 0px, 0px);" ng-hide="layoutState &amp;&amp; layoutState.hideSidebar"
    class="sidebar" role="complementary">
      <div class="sidebar-tabs">
        <div class="toolbar-tabs-middle">
          <a class="toolbar-btn icon-order toolbar-close" href="https://www.ele.me/profile/order"
          hardjump="" tooltip="我的订单" tooltip-placement="left" ubt-click="toolbar_order">
            <!-- ngIf: sidebarCount.uncompletedOrder> 0 -->
          </a>
          <div class="toolbar-separator">
          </div>
          <a class="toolbar-cartbtn icon-cart toolbar-open toolbar-cartbtn-shownum"
          href="javascript:" template="cart" ng-class="{'focus': (activeTemplate === 'cart' &amp;&amp; isSidebarOpen), 'toolbar-cartbtn-shownum': foodCount.count}"
          ubt-click="390">
            购物车
            <!-- ngIf: foodCount.count -->
            <i class="toolbar-cartnum ng-binding ng-scope" ng-if="foodCount.count"
            ng-bind="foodCount.count">
              1
            </i>
            <!-- end ngIf: foodCount.count -->
          </a>
          <div class="toolbar-separator">
          </div>
          <a class="toolbar-btn icon-notice toolbar-open modal-hide" href="javascript:"
          template="message" ng-class="{'focus': (activeTemplate === 'message' &amp;&amp; isSidebarOpen), 'toolbar-open': user, 'modal-hide': user}"
          tooltip="我的信息" tooltip-placement="left" ubt-click="392">
            <!-- ngIf: messageCount.count -->
          </a>
        </div>
        <div class="toolbar-tabs-bottom">
          <div class="toolbar-btn icon-QR-code">
            <div class="dropbox toolbar-tabs-dropbox">
              <a href="http://static11.elemecdn.com/eleme/desktop/mobile/index.html"
              target="_blank">
                <img src="{{asset('Home/Index/images/appqc.png')}}" alt="下载手机应用">
                <p>
                  下载手机应用
                </p>
                <p class="icon-QR-code-bonus">
                  即可参加分享红包活动
                </p>
              </a>
            </div>
          </div>
          <a style="visibility: hidden;" class="toolbar-btn sidebar-btn-backtop icon-top"
          tooltip="回到顶部" title="回到顶部" href="javascript:" tooltip-placement="left">
          </a>
        </div>
      </div>
      <div class="sidebar-content">
        <!-- ngInclude: activeTemplate ? ('/common/page/_block/sidebar/sidebar-'+
        activeTemplate + '/sidebar-'+ activeTemplate + '.html') : '' -->
        <div class="ng-scope" ng-include="activeTemplate ? ('/common/page/_block/sidebar/sidebar-'+ activeTemplate + '/sidebar-'+ activeTemplate + '.html') : ''">
          <div class="ng-scope" ng-controller="sidebarCartCtrl">
            <div class="sidebarcart-caption">
              <a href="https://www.ele.me/shop/406884" class="ng-binding" ng-href="/shop/406884"
              ng-bind="cart.restaurant_info.name || '购物车'" ubt-click="394">
                购物车
              </a>
              <span class="icon-angle-double-right" ng-click="toggleSidebar()">
              </span>
            </div>
            <!-- ngIf: loading -->
            <!-- ngIf: pieces -->
            <div ng-if="pieces" class="sidebarcart ng-scope">
              <!-- ngRepeat: basket in cart -->
              <!-- ngIf: basket.length -->
              <dl class="ng-scope" ng-if="basket.length" ng-repeat="basket in cart">
                <dt>
                  <span class="ng-binding" ng-bind="$index + 1 + '号购物车'">
                    1号购物车
                  </span>
                  <!-- ngIf: basket.length -->
                  <a ng-if="basket.length" ng-click="clearGroup($index, $event)" href="javascript:"
                  class="sidebarcart-clear ng-scope">
                    [清空]
                  </a>
                  <!-- end ngIf: basket.length -->
                </dt>
                <!-- ngRepeat: item in basket -->
                <dd class="ng-scope" ng-repeat="item in basket">
                  <ul>
                    <li class="clearfix">
                      <div class="sidebarcart-name ng-binding" ng-bind="item.name" title="吉味双拼饭">
                        吉味双拼饭
                      </div>
                      <div class="sidebarcart-quantity">
                        <span ng-click="update(item, item.quantity - 1, $parent.$index, $event)">
                          -
                        </span>
                        <input value="1" class="ng-pristine ng-valid" ng-model="item.quantity"
                        ng-change="update(item, item.quantity, $parent.$index)">
                        <span ng-click="update(item, item.quantity + 1, $parent.$index)">
                          +
                        </span>
                      </div>
                      <div class="sidebarcart-price ng-binding" ng-bind="item.price * item.quantity">
                        34.5
                      </div>
                    </li>
                  </ul>
                </dd>
                <!-- end ngRepeat: item in basket -->
              </dl>
              <!-- end ngIf: basket.length -->
              <!-- end ngRepeat: basket in cart -->
              <!-- ngIf: cart.extra -->
            </div>
            <!-- end ngIf: pieces -->
            <div class="sidebarcart-summary" ng-show="pieces">
              <p>
                共
                <span class="color-stress ng-binding" ng-bind="pieces">
                  1
                </span>
                份，总计
                <span class="color-stress ng-binding" ng-bind="total">
                  34.5
                </span>
              </p>
              <button ng-click="settle()" class="sidebarcart-submit ng-binding" ng-class="{ 'sidebarcart-hasagio': submitButton.disabled }"
              ng-bind="submitButton.text" ubt-click="391">
                去结算
              </button>
            </div>
            <!-- ngIf: !loading && !pieces -->
          </div>
        </div>
      </div>
    </div>
    <!-- ngView: -->
    <div class="ng-scope" ng-view="" role="main">
      <div class="container clearfix ng-scope">
        <div location="" class="location" ng-style="{visibility: geohash ? '' : 'hidden'}"
        role="navigation">
          <span>
            当前位置:
          </span>
          <span class="location-current">
            <a href="https://www.ele.me/place/wx4spk2qsy5" class="inherit ng-binding"
            ng-href="/place/wx4spk2qsy5" ubt-click="401" ng-bind="place.name || place.address">
              昌平区兄弟连IT教育(北京华文学院西北)
            </a>
          </span>
          <span class="location-change" ng-class="{ 'location-hashistory': user.username &amp;&amp; userPlaces &amp;&amp; userPlaces.length &gt; 0 }">
            <a href="https://www.ele.me/home" ng-href="/home" ubt-click="400" hardjump="">
              [切换地址]
            </a>
            <ul class="dropbox location-dropbox" ubt-visit="398">
              <li class="arrow">
              </li>
              <!-- ngRepeat: userPlace in userPlaces | filter:filterPlace | limitTo:
              4 -->
              <li class="changelocation">
                <a href="https://www.ele.me/home" ng-href="/home" hardjump="">
                  修改收货地址
                  <span class="icon-location">
                  </span>
                </a>
              </li>
            </ul>
          </span>
          <span ng-transclude="">
          </span>
        </div>
        <div search-input="" class="place-search" role="search">
          <a ubt-data-keyword="" class="place-search-btn icon-search" ubt-click="403"
          ng-attr-ubt-data-keyword="美食" title="搜索商家或美食">
          </a>
          <label for="globalsearch">
            搜索商家或美食
          </label>
          <input id="globalsearch" class="place-search-input ng-pristine ng-valid"
          ng-model="美食" autocomplete="" placeholder="搜索商家,美食...">
          <div class="searchbox">
            <div class="searchbox-list searchbox-rstlist ng-hide" ng-show="searchRestaurants &amp;&amp; searchRestaurants.length &gt; 0"
            ng-class="{ 'show-separator': searchFoods &amp;&amp; searchFoods.length &gt; 0 }">
              <ul>
                <!-- ngRepeat: restaurant in searchRestaurants | orderBy: [ '-is_opening',
                'order_lead_time' ] | limitTo: 5 -->
              </ul>
            </div>
            <div class="searchbox-list searchbox-foodlist ng-hide" ng-show="searchFoods &amp;&amp; searchFoods.length &gt; 0">
              <ul>
                <!-- ngRepeat: food in searchFoods | limitTo: 5 -->
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- ngIf: activities -->
      <div class="place-tab clearfix container ng-scope">
        <div class="place-fetchtakeout ng-isolate-scope" show-fetch-takeout-dialog="">
          <img src="{{asset('Home/Index/images/takeout.png')}}" alt="谁去拿外卖">
        </div>
      </div>
      <div ng-show="!recentBoughtOnly" class="container ng-scope">
        <div class="excavator container">
          <!-- ngIf: rstCategories.length -->
          <div class="excavator-filter ng-scope" ng-if="rstCategories.length">
            <span class="excavator-filter-name">
              商家分类:
            </span>
            <!-- ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope active" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              全部商家
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              美食
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              快餐便当
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              特色菜系
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              异国料理
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              小吃夜宵
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              甜品饮品
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              果蔬生鲜
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              商店超市
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              鲜花绿植
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              医药健康
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              早餐
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              午餐
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              下午茶
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              晚餐
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
            ng-repeat="category in rstCategories" ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory &lt; 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
            ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">
              夜宵
            </a>
            <!-- end ngRepeat: category in rstCategories -->
            <div ng-show="subCategories" class="excavator-filter-subbox ng-hide">
              <!-- ngRepeat: subitem in subCategories -->
            </div>
          </div>
          <!-- end ngIf: rstCategories.length -->
        </div>
        <div class="place-rstbox clearfix">
          <div style="height: 840px;" data="filteredRestaurants = (rstStream.restaurants | filter: rstStream.filter | filter: otherFilter | orderBy: [ '-is_opening', rstStream.orderBy || 'index' ])"
          class="clearfix">



            <a href="https://www.ele.me/shop/159434434" target="_blank" data-bidding=""
            data-rst-id="159434434" class="rstblock">
              <div class="rstblock-logo">
                <img src="{{asset('Home/Index/images/4e892a28b4555375a0c37769de20apng.png')}}"
                alt="蜀香源（昌平店）" class="rstblock-logo-icon" height="70" width="70">
                <span>
                  38 分钟
                </span>
              </div>
              <div class="rstblock-content">
                <div class="rstblock-title">
                  蜀香源（昌平店）
                </div>
                <div class="starrating icon-star">
                  <span class="icon-star" style="width:86%;">
                  </span>
                </div>
                <span class="rstblock-monthsales">
                  月售2515单
                </span>
                <div class="rstblock-cost">
                  配送费¥3
                </div>
                <div class="rstblock-activity">
                </div>
              </div>
            </a>



          </div>
    
   
        
        </div>
      </div>
    </div>
    <footer class="footer" role="contentinfo">
      <div class="container clearfix">
        <div class="footer-link">
          <h3 class="footer-link-title">
            用户帮助
          </h3>
          <a class="footer-link-item" href="https://www.ele.me/support/question/default"
          target="_blank">
            常见问题
          </a>
        </div>
        <div class="footer-link">
          <h3 class="footer-link-title">
            商务合作
          </h3>
          <a class="footer-link-item" href="https://kaidian.ele.me/" target="_blank">
            我要开店
          </a>
          <a class="footer-link-item" href="https://www.ele.me/support/about/jiameng"
          target="_blank">
            加盟指南
          </a>
          <a class="footer-link-item" href="https://www.ele.me/support/about/contact"
          target="_blank">
            市场合作
          </a>
          <a class="footer-link-item" href="http://openapi.eleme.io/" target="_blank">
            开放平台
          </a>
        </div>
        <div class="footer-link">
          <h3 class="footer-link-title">
            关于我们
          </h3>
          <a class="footer-link-item" href="https://www.ele.me/support/about" target="_blank">
            饿了么介绍
          </a>
          <a class="footer-link-item" href="http://jobs.ele.me/" target="_blank">
            加入我们
          </a>
          <a class="footer-link-item" href="https://www.ele.me/support/about/contact"
          target="_blank">
            联系我们
          </a>
          <a href="https://h5.ele.me/service/agreement/#HEAEDER_SHOW=1" class="footer-link-item"
          ng-href="//h5.ele.me/service/agreement/#HEAEDER_SHOW=1" target="_blank">
            规则中心
          </a>
        </div>
        <div class="footer-contect">
          <div class="footer-contect-item">
            24小时客服热线 :
            <a class="inherit" href="tel:10105757">
              10105757
            </a>
          </div>
          <div class="footer-contect-item">
            关注我们 :
            <div href="JavaScript:" class="icon-wechat" ubt-click="402">
              <div class="dropbox dropbox-bottom footer-contect-dropbox" ubt-visit="402">
                <img src="{{asset('Home/Index/images/wexinqc1002x.png')}}" alt="微信号: elemeorder">
                <p>
                  微信号: elemeorder
                </p>
                <p>
                  饿了么网上订餐
                </p>
              </div>
            </div>
            <a href="http://e.weibo.com/elemeorder" class="icon-weibo" target="_blank">
            </a>
          </div>
        </div>
        <div class="footer-mobile">
          <a href="https://h.ele.me/landing" target="_blank">
            <img src="{{asset('Home/Index/images/appqc.png')}}" class="footer-mobile-icon"
            alt="扫一扫下载饿了么手机 App">
          </a>
          <div class="footer-mobile-content">
            <h3>
              下载手机版
            </h3>
            <p>
              扫一扫,手机订餐方便
            </p>
          </div>
        </div>
        <div class="footer-copyright serif">
          <h5 class="owner">
            所有方：上海拉扎斯信息科技有限公司
          </h5>
          <p>
            增值电信业务许可证 :
            <a href="http://www.shca.gov.cn/" target="_blank">
              沪B2-20150033
            </a>
            |
            <a href="http://www.miibeian.gov.cn/" target="_blank">
              沪ICP备 09007032
            </a>
            |
            <a href="http://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&amp;entyId=20120305173227823"
            target="_blank">
              上海工商行政管理
            </a>
            Copyright ©2008-2017 ele.me, All Rights Reserved.
          </p>
        </div>
        <div class="footer-police container">
          <a href="http://www.zx110.org/picp/?sn=310100103568" rel="nofollow" target="_blank">
            <img alt="已通过沪公网备案，备案号 310100103568" src="{{asset('Home/Index/images/picp_bg.jpg')}}"
            height="30">
          </a>
        </div>
      </div>
    </footer>
    <script src="{{asset('Home/Index/js/home.js')}}">
    </script>
  </body>

</html>