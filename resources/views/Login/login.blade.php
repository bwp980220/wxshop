<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>登录</title>
    <meta content="app-id=984819816" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="css/comm.css" rel="stylesheet" type="text/css" />
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <link href="css/vccode.css" rel="stylesheet" type="text/css" />
</head>
<body>
    
<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title">登录</strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="/" class="m-index-icon"><i class="home-icon"></i></a>
</div>

<div class="wrapper">
    <div class="registerCon">
        <div class="binSuccess5">
            <ul>
                <li class="accAndPwd">
                    <dl>
                        <div class="txtAccount">
                        <input type="hidden" id="_token" value="{{ csrf_token() }}" />
                            <input id="txtAccount" type="text" placeholder="请输入您的手机号码/邮箱"><i></i>
                        </div>
                        <cite class="passport_set" style="display: none"></cite>
                    </dl>
                    <dl>
                        <input id="txtPassword" type="password" placeholder="密码" value="" maxlength="20" /><b></b>
                    </dl>
                    <dl>
                        <input id="verifycode" type="text" placeholder="请输入验证码"  maxlength="4" /><b></b>
                        <img src="{{url('/verify/create')}}" alt="" id="img">
                    </dl>
                </li>
            </ul>
            <a id="btnLogin" href="javascript:;" class="orangeBtn loginBtn">登录</a>
        </div>
        <div class="forget">
            <a href="{{url('findpwd')}}">忘记密码？</a><b></b><a href="{{url('register')}}">新用户注册</a>
        </div>
    </div>
    <div class="oter_operation gray9" style="display: none;">
        
        <p>登录666潮人购账号后，可在微信进行以下操作：</p>
        1、查看您的潮购记录、获得商品信息、余额等<br />
        2、随时掌握最新晒单、最新揭晓动态信息
    </div>
</div>
        
<div class="footer clearfix" style="display:none;">
    <ul>
        <li class="f_home"><a href="{{url('index')}}" ><i></i>潮购</a></li>
        <li class="f_announced"><a href="/v44/lottery/" ><i></i>最新揭晓</a></li>
        <li class="f_single"><a href="{{url('willshare')}}" ><i></i>晒单</a></li>
        <li class="f_car"><a id="btnCart" href="{{url('shopcart')}}" ><i></i>购物车</a></li>
        <li class="f_personal"><a href="{{url('userpage')}}" ><i></i>我的潮购</a></li>
    </ul>
</div>
</body>
</html>
<script src="/jquery-3.2.1.min.js"></script>
<script>
    $(function(){
        $("#img").click(function(){
                $(this).attr('src',"{{url('/verify/create')}}"+"?"+Math.random())
            })
        $(document).on('click','#btnLogin',function(){
            var user_tel=$('#txtAccount').val();
            var user_pwd=$('#txtPassword').val();
            var code = $("#verifycode").val();
            if(user_tel==''){
                alert('请输入手机号');
                return false;
            }
            if(user_pwd==''){
                alert('请输入密码');
                return false;
            }
            $.get(
                "{{url('logindo')}}",
                {user_tel:user_tel,user_pwd:user_pwd,code:code},
                function(res){
                    if(res==1){
                        alert('用户名不存在')
                    }else if(res==2){
                        alert('密码错误');
                    }else if(res==3){
                        alert('登录成功');
                        location.href="{{url('index')}}";
                    }else{
                        alert('验证码错误');
                    }
                    $("#img").trigger('click');
                }
            )
        })
    })
</script>