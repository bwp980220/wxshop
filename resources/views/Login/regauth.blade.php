<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>注册验证</title>
<meta content="app-id=984819816" name="apple-itunes-app" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<link href="css/comm.css" rel="stylesheet" type="text/css" />
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link href="css/findpwd.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="layui/css/layui.css">
<link rel="stylesheet" href="css/modipwd.css">
<script src="js/jquery-1.11.2.min.js"></script>
</head>
<body>
    
<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title"></strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
</div>



    <div class="wrapper">
        <form class="layui-form" action="">
            <div class="registerCon">
                <ul>
                    <li class="auth"><em>请输入验证码</em></li>
                    <li><p>我们已向<em class="red">{{$name}}</em>发送验证码短信，请查看短信并输入验证码。</p></li>
                    <li>
                        <input type="text" value="" name="code" id="userMobile" placeholder="请输入验证码" value=""/>
                        <a href="javascript:void(0);" class="sendcode" id="dateBtn1">获取验证码</a>
                    </li>
                    <li><a id="findPasswordNextBtn" href="javascript:void(0);" class="orangeBtn">确认</a></li>
                    <li>换了手机号码或遗失？请致电客服解除绑定400-666-2110</li>
                </ul>
            </div>
        </form>
        <input type="hidden" id="_token" value="{{ csrf_token() }}" />
    </div>


<script src="layui/layui.js"></script>
<script>
    $(function(){
        //60秒倒计时
        $("#dateBtn1").on("click",function(){
            var _this=$(this);
            var _token=$('#_token').val();
    
            if(!$(this).hasClass("on")){
                var data={};
                data.tel=$("#userMobile").val();
                $.get(
                    "{{url('sendcode')}}",
                    function(res){
                        console.log(res);
                    }
                )
                
            }
        });
        //确认
    $('.orangeBtn').click(function(){
        var _token=$('#_token').val();
            //console.log(_token);
        var _code=$('#userMobile').val();
        //console.log(_code);
        //通过ajax请求数据
        $.ajax({
                    type:"get",
                    url:"{{url('registerdo')}}",
                    data:{code:_code,_token:_token},
                    success:function(res){
                        if(res==1){
                            alert('注册成功');
                            location.href="{{url('login')}}";
                        }else if(res==2){
                            alert('注册失败');
                        }else if(res==3){
                            alert('验证码错误');
                        }
                    },
                });
    })
    });
</script>
<script>
//Demo
layui.use('form', function(){
  var form = layui.form();
  
  //监听提交
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });
});

</script>    

</body>
</html>
    