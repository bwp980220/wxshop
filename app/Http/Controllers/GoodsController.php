<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Good;
class GoodsController extends Controller
{
   //全部商品
    public function allshops(){
        $res = DB::table('good')
        ->join('category', 'good.cate_id', '=', 'category.cate_id')
        ->get();
        //dd($res);die;
        $res1=DB::table('category')->get();
        //dd($res1);die;
        return view('goods.allshops',['data'=>$res],['res'=>$res1]);     
    }
    //商品分类展示
    public function newshops(Request $request){
        $id=$request->get('cate_id');
        //print_r($id);die;
        $data=DB::table('category')->select("cate_id")->where("p_id",0)->get();
        $cate_id=$id;
        $this->get($id);
        $arr=self::$arrCate;
        $arr=DB::table('good')->whereIn('cate_id',$arr)->get();
        $res1=DB::table('category')->get();
        return view('goods.all',['data'=>$arr]);
    }
    //无限极分类
    private function get($id){
        $arrIds=DB::table('category')->select('cate_id')->where("p_id",$id)->get();
        if(count($arrIds)!=0){
                foreach($arrIds as $k=>$v){
                    $cateId=$v->cate_id;
                    $Ids=$this->get($cateId);
                    self::$arrCate[]=$Ids;
                }
        }
        if(count($arrIds)==0){
                return $id;
        }
    } 
    //重新获取商品+分页
    public function getgoodsinfo(){
            $p=input('post.p');
            $brand_id=input('post.brand_id');
            $price=input('post.price');
            $field=input('post.field');
            //dump($field);die;
            $order=input('post.order');
            $cate_id=input('post.cate_id');
            $cate_id=session('cate_id');
            //处理条件
            $cate_model=model('Category');
            $where=[];
            if(!empty($brand_id)){
                $where['brand_id']=$brand_id;
            }
            if(!empty($price)){
                $price=explode("-",$price);
                $num=count($price);
                if($num==1){
                    $min=intval(str_replace(',','',$price[0]));
                    $where['market_price']=['>',$min];
                }else{
                $min=str_replace(',','',$price[0]);
                $max=str_replace(',','',$price[1]);
                $where['market_price']=['between',[$min,$max]];
                }
            }
            $ord=[];
            if(!empty($field)&&!empty($order)){
                $ord=1;
            }
            if(!empty($field)&&empty($order)){
                $where[$field]=1;
            }
            
            if(!empty($cate_id)){
                $cateInfo=$cate_model->select();
                $c_id=getCateId($cateInfo,$cate_id);
                $where['cate_id']=['in',$c_id];
            }
             //dump($where);die;
            //查询商品数据
            $goods_model=model('Goods');
            $page_num=4;
            if($ord==1){
                $goodsInfo=$goods_model->where($where)->order($field,$order)->page($p,$page_num)->select();       
            }else{
                $goodsInfo=$goods_model->where($where)->page($p,$page_num)->select();
            }
            //dump($goods_model->getLastSql());die;
            //获取页码
            $count=$goods_model->where($where)->count();
            $page_obj=new \page\AjaxPage();
    
            $str=$page_obj::ajaxpager($p,$count,$page_num,url('Goods/goodsPage'));
            $this->view->engine->layout(false);
            $this->assign('goodsInfo',$goodsInfo);
            $this->assign('str',$str);
            echo $this->fetch('div');
    }
    //商品详情
    public function shopcontent(){
            return view('goods.shopcontent');
    }
}
