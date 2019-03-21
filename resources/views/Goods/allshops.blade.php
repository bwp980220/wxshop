<!DOCTYPE html>
<html lang="en">
<head>
    <title>商品列表</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link rel="stylesheet" href="css/mui.min_1.css">
    <link href="css/comm.css" rel="stylesheet" type="text/css" />
    <link href="css/goods.css" rel="stylesheet" type="text/css" />
</head>

<body class="g-acc-bg" fnav="0" style="position: static">
    <form action="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="page-group">
    <div id="page-infinite-scroll-bottom" class="page">
    
        <!--触屏版内页头部-->
        <div class="m-block-header" id="div-header" style="display: none">
            <strong id="m-title"></strong>
            <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
            <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
        </div>
      
        <div class="pro-s-box thin-bor-bottom" id="divSearch">
            <div class="box">
                <div class="border">
                    <div class="border-inner"></div>
                </div>
                <div class="input-box">
                    <i class="s-icon"></i>
                    <input type="text" placeholder="输入“汽车”试试" id="txtSearch" />
                    <i class="c-icon" id="btnClearInput" style="display: none"></i>
                </div>
            </div>
            <a href="javascript:;" class="s-btn" id="btnSearch">搜索</a>
        </div>

        <!--搜索时显示的模块-->
        <div class="search-info" style="display: none;">
            <div class="hot">
                <p class="title">热门搜索</p>
                <ul id="ulSearchHot" class="hot-list clearfix"><li wd='iPhone'><a class="items">iPhone</a></li><li wd='三星'><a class="items">三星</a></li><li wd='小米'><a class="items">小米</a></li><li wd='黄金'><a class="items">黄金</a></li><li wd='汽车'><a class="items">汽车</a></li><li wd='电脑'><a class="items">电脑</a></li></ul>
            </div>
            <div class="history" style="display: none">
                <p class="title">历史记录</p>
                <div class="his-inner" id="divSearchHotHistory">
                    <ul class="his-list thin-bor-top">
                        <li wd="小米移动电源" class="thin-bor-bottom"><a class="items">小米移动电源</a></li>
                        <li wd="苹果6" class="thin-bor-bottom"><a class="items">苹果6</a></li>
                        <li wd="苹果电脑" class="thin-bor-bottom"><a class="items">苹果电脑</a></li>
                    </ul>
                    <div class="cle-cord thin-bor-bottom" id="btnClear">清空历史记录</div>
                </div>
            </div>
        </div>

        <div class="all-list-wrapper">

            <div class="menu-list-wrapper" id="divSortList">
                <ul id="sortListUl" class="list">
                <li sortid='0' class='current'><span class='items'>全部商品</span></li> 
                @foreach ($res as $v)
                @if($v->p_id==0)
                <li sortid='100' cate_id="{{$v->cate_id}}" reletype='1' linkaddr=''><span class='items'>{{$v->cate_name}}</span></li>
                @endif
                @endforeach
                </ul>
            </div>

            <div class="good-list-wrapper">
                <div class="good-menu thin-bor-bottom">
                    <ul class="good-menu-list" id="ulOrderBy">
                        <li orderflag="10" class="current"><a href="javascript:;" a_type="1" class="default now">默认</a></li>
                        <li orderflag="20"><a href="javascript:;" a_type="2" class="default" field="is_new">最新</a></li>
                        <li orderflag="50"><a href="javascript:;" a_type="2" class="default" field="goods_number">库存</a><span>↑</span></li>
                        <li orderflag="30"><a href="javascript:;" a_type="3" class="default" field="goods_price">价格</a><span>↑</span></li>
                        <!--价值(由高到低30,由低到高31)-->
                    </ul>
                </div>
                
                <div class="good-list-inner">
                    <div id="pullrefresh" class="good-list-box  mui-content mui-scroll-wrapper">
                        <div class="goodList mui-scroll">
                            <ul id="ulGoodsList" class="mui-table-view mui-table-view-chevron">
                            @foreach ($data as $v)
                                <li id="23468">    
                                    <span class="gList_l fl">        
                                        <img class="lazy" src="./uploads/goodsimg/{{$v->goods_img}}">
                                    </span>    
                                    <div class="gList_r">        
                                        <h3 class="gray6">{{$v->goods_name}}</h3>        
                                        <em class="gray9">价值：￥{{$v->shop_price}}</em>
                                        <div class="gRate">            
                                            <div class="Progress-bar">    
                                                <p class="u-progress">
                                                    <span style="width: 91.91286930395593%;" class="pgbar">
                                                        <span class="pging"></span>
                                                    </span>
                                                </p>                
                                                <ul class="Pro-bar-li">
                                                    <li class="P-bar01"><em>7342</em>已参与</li>
                                                    <li class="P-bar02"><em>7988</em>总需人次</li>
                                                    <li class="P-bar03"><em>646</em>剩余</li>
                                                </ul>            
                                            </div>           
                                            <a codeid="12785750" class="" canbuy="646"><s></s></a>        
                                        </div>    
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
                   
            </div>
        </div>
       
        <div class="footer clearfix">
            <ul>
                <li class="f_home"><a href="{{url('index')}}" ><i></i>潮购</a></li>
                <li class="f_announced"><a href="{{url('allshops')}}" class="hover"><i></i>全部商品</a></li>
                <li class="f_single"><a href="{{url('index')}}" ><i></i>最新揭晓</a></li>
                <li class="f_car"><a id="btnCart" href="{{url('shopcart')}}" ><i></i>购物车</a></li>
                <li class="f_personal"><a href="{{url('userpage')}}" ><i></i>我的潮购</a></li>
            </ul>
        </div>
    </div>
</div>
</form>
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/lazyload.min.js"></script>
<script src="js/mui.min.js"></script>
<script>
   
        jQuery(document).ready(function() {
            $("img.lazy").lazyload({
                placeholder : "images/loading2.gif",
                effect: "fadeIn",
            });


        });
    
</script>
<script>
    //点击默认
    $(document).on('click', '.default', function () {
               /**
                1.给当前点击的背景颜色  红色
                2.区分当前点击的为排序（符号改变） 还是新品
                3.获取商品信息进行分页
                */
                   //1.给当前点击的背景颜色  红色
               var _this = $(this);
               _this.addClass("now");
                //console.log(_address);
               _this.siblings().removeClass("now");

               // 3.获取商品信息进行分页
               //getGoodInfo(1);
               var _sign = _this.children('span').last().text();
               if (_sign == '↑') {
                   _this.children('span').last().text('↓');
               } else {
                   _this.children('span').last().text('↑');
               }
               var p = 1;
               getGoodInfo(p);
           });
            /**重新获取商品+分页*/
            function getGoodInfo(p) {
               //重新获取商品 价格 品牌
               var brand_id = $("a[class='brand now']").attr('brand_id');
               var price = $("a[class='price now']").text();
               //处理默认
               var _default = $("a[class='default now']");
               var _type = _default.attr('a_type');
               if (_type == 1) {
                   var _field = 'goods_number';
                   var _order = 'desc';
               } else if (_type == 2) {
                   var _field = _default.attr('field');
                   var _sign = _default.children('span').last().text();
                   if (_sign == '↑') {
                       var _order = 'asc';

                   } else {
                       var _order = 'desc';
                   }
               } else if (_type == 3) {
                   var _field = _default.attr('field');
               }
               //通过ajax请求数据
               $.ajax({
                    type:"post",
                    url:'getgoodsinfo',
                    data:{p: p, brand_id: brand_id, price: price, field: _field, order: _order},
                    success:function(res){
                        $("#show").html(res);
                    },
                });
           }
    // 点击切换类别
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
}); 
    $('#sortListUl li').click(function(){
        var _this=$(this);
        var cate_id=$(this).attr("cate_id");
        //console.log(cate_id);
        $(this).addClass('current').siblings('li').removeClass('current');
        $.ajax({
                type:"post",
                url:'newshops',
                data:{cate_id: cate_id},
                success:function(res){
                $('#ulGoodsList').html(res);
                },
        });
    })
</script>
<script>
    mui.init({
        pullRefresh: {
            container: '#pullrefresh',
            down: {
                contentdown : "下拉可以刷新",//可选，在下拉可刷新状态时，下拉刷新控件上显示的标题内容
                contentover : "释放立即刷新",//可选，在释放可刷新状态时，下拉刷新控件上显示的标题内容
                contentrefresh : "正在刷新...",
                callback: pulldownRefresh
            },
            up: {
                contentrefresh: '正在加载...',
                callback: pullupRefresh
            }
        }
    });
    /**
     * 下拉刷新具体业务实现
     */
    function pulldownRefresh() {
        setTimeout(function() {
            var table = document.body.querySelector('.mui-table-view');
            var cells = document.body.querySelectorAll('.mui-table-view-cell');
            for (var i = cells.length, len = i + 3; i < len; i++) {
                var li = document.createElement('li');
                var str='';
                // li.className = 'mui-table-view-cell';
                str += '<span class="gList_l fl">';        
                str += '<img class="lazy" data-original="https://img.1yyg.net/GoodsPic/pic-200-200/20160908104402359.jpg" src="https://img.1yyg.net/GoodsPic/pic-200-200/20160908104402359.jpg" style="display: block;"/>';
                str += '</span>';
                str += '<div class="gList_r">';
                str += '<h3 class="gray6">(第'+i+'云)苹果（Apple）iPhone 7 Plus 256G版 4G手机</h3>';        
                str += '<em class="gray9">价值：￥7988.00</em>';
                str += '<div class="gRate">';           
                str += '<div class="Progress-bar">'    
                str += '<p class="u-progress">';
                str += '<span style="width: 91.91286930395593%;" class="pgbar">';
                str += '<span class="pging"></span>';
                str += '</span>';
                str += '</p>';                
                str += '<ul class="Pro-bar-li">';
                str += '<li class="P-bar01"><em>7342</em>已参与</li>';
                str += '<li class="P-bar02"><em>7988</em>总需人次</li>';
                str += '<li class="P-bar03"><em>646</em>剩余</li>';
                str += '</ul>';            
                str += '</div>';           
                str += '<a codeid="12785750" class="" canbuy="646"><s></s></a>';        
                str += '</div>';    
                str += '</div>';
                //下拉刷新，新纪录插到最前面；
                li.innerHTML = str;
                table.insertBefore(li, table.firstChild);
            }
            mui('#pullrefresh').pullRefresh().endPulldownToRefresh(); //refresh completed
        }, 1500);
    }
    var count = 0;
    /**
     * 上拉加载具体业务实现
     */
    function pullupRefresh() {
        setTimeout(function() {
            mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > 2)); //参数为true代表没有更多数据了。
            var table = document.body.querySelector('.mui-table-view');
            var cells = document.body.querySelectorAll('.mui-table-view-cell');
            for (var i = cells.length, len = i + 20; i < len; i++) {
                var li = document.createElement('li');
                // li.className = 'mui-table-view-cell';
                var str='';
                str += '<span class="gList_l fl">';        
                str += '<img class="lazy" data-original="https://img.1yyg.net/GoodsPic/pic-200-200/20160908104402359.jpg" src="https://img.1yyg.net/GoodsPic/pic-200-200/20160908104402359.jpg" style="display: block;"/>';
                str += '</span>';
                str += '<div class="gList_r">';
                str += '<h3 class="gray6">(第'+i+'云)苹果（Apple）iPhone 7 Plus 256G版 4G手机</h3>';        
                str += '<em class="gray9">价值：￥7988.00</em>';
                str += '<div class="gRate">';           
                str += '<div class="Progress-bar">'    
                str += '<p class="u-progress">';
                str += '<span style="width: 91.91286930395593%;" class="pgbar">';
                str += '<span class="pging"></span>';
                str += '</span>';
                str += '</p>';                
                str += '<ul class="Pro-bar-li">';
                str += '<li class="P-bar01"><em>7342</em>已参与</li>';
                str += '<li class="P-bar02"><em>7988</em>总需人次</li>';
                str += '<li class="P-bar03"><em>646</em>剩余</li>';
                str += '</ul>';            
                str += '</div>';           
                str += '<a codeid="12785750" class="" canbuy="646"><s></s></a>';        
                str += '</div>';    
                str += '</div>';
                li.innerHTML = str;
                table.appendChild(li);
            }
        }, 1500);
    }
    // if (mui.os.plus) {
    //     mui.plusReady(function() {
    //         setTimeout(function() {
    //             mui('#pullrefresh').pullRefresh().pullupLoading();
    //         }, 1000);

    //     });
    // } 
    // else {
    //     mui.ready(function() {
    //         mui('#pullrefresh').pullRefresh().pullupLoading();
    //     });
    // }
</script>

</body>
</html>

