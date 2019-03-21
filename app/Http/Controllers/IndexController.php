<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Good;
use App\Model\User;
class IndexController extends Controller
{
    protected static $arrCate;  
    //首页
    public function index(){
      
        $res=Good::paginate(10);
        $info=Good::get();
        //dd($res);die;
        return view('index.index',['data'=>$res],['info'=>$info]);
    }
    //我的潮购
    public function userpage(){
        return view('index.userpage');
    }
    //潮购记录
    public function recorddetail(){
        return view('index.recorddetail');
    }
    //我的钱包
    public function mywallet(){
        return view('index.mywallet');
    }
    //购物车
    public function shopcart(){
        return view('index.shopcart');
    }
    //我的晒单
    public function share(){
        return view('index.share');
    }
    //晒单
    public function willshare(){
        return view('index.willshare');
    }
    //二维码分享
    public function invite(){
        return view('index.invite');
    }
    //收货地址
    public function address(){
        return view('index.address');
    }
    
}
