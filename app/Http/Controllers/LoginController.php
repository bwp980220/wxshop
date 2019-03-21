<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Admin;
use App\Model\User;
class LoginController extends Controller
{
    //登陆
    public function login(){ 
        return view('login.login');
    }
    //执行登陆
    public function logindo(Request $request){
        $user_tel=$request->get('user_tel');
        $user_pwd=$request->get('user_pwd');
        $user_pwd=md5($user_pwd);
        $user_model=new User;
        $data=$user_model->where('user_tel',$user_tel)->first();
        $code = session('verifycode');
        $Pcode = $request->code;
        if($code != $Pcode){
            echo 5;die;
        }
        if(empty($data)){
            echo 1;
        }else{
            $pwd=($data['user_pwd']);
            if($user_pwd==$pwd){
                $request->session()->put('user',$user_tel);
                echo 3;
            }else{
                echo 2;
            }
        }
    }
    //注册
    public function register(){
        return view('login.register');
    }
    //随机验证码
    /*
     * @content 生成随机验证码
     * @params $len  int   需要生成验证码的长度
     * @return  $code  string  生成的验证码
     * */
    public function createcode($len)
    {
        $code = '';
        for($i=1;$i<=$len;$i++){
            $code .=mt_rand(0,9);
        }
        return $code;
    }
    /*
     * @content 发送手机验证码
     * @params  $mobile  要发送的手机号
     * 
     * */
    public static function sendMobile($mobile,$code)
    {
        
        $host = env("MOBILE_HOST");
        $path = env("MOBILE_PATH");
        $method = "POST";
        $appcode = env("MOBILE_APPCODE");
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "content=【创信】你的验证码是：".$code."，3分钟内有效！&mobile=".$mobile;
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        var_dump(curl_exec($curl));
    }

    public function sendcode()
    {
        $code = $this->createcode(4);
        session(['sendcode'=>$code]);
        $this->sendMobile(session('name'),$code);
    }
    //执行注册
    public function registerdo(Request $request){
        $code1=$request->get('code');
        $name=session()->get('name');
        $code=session()->get('sendcode');
        $pwd=session()->get('pwd');
        if($code1==$code){
            $admin_model=new Admin;
            $data=$admin_model->insert(['admin_pwd'=>$pwd,'admin_tel'=>$name]);
            if($data){
                echo 1;
            }else{
                echo 2;
            }
        }else{
            echo 3;
        }
        
    }  
    //发送验证码
    public function regauth(Request $request){
        $name=session()->get('name');
        $code=session()->get('code');
        $pwd=session()->get('pwd');
        return view('login.regauth',['name'=>$name,'pwd'=>$pwd,'code'=>$code]);
    }
    //点击下一步
    public function next(Request $request){
        $name=$request->name;
        $pwd=$request->pwd;
        $code=$request->code;
        //dump($code);die;
        session(['name'=>$name,'pwd'=>$pwd,'code'=>$code]);
        return redirect('regauth');
    }
    //找回密码
    public function findpwd(){
        return view('login.findpwd');
    }
}
