<?php

namespace App\Http\Controllers;

use App\short_url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    //
    public function index(){
        $urls = short_url::all();
        return view('index',compact('urls'));
    }
    public function create() {
        $count = short_url::count();
        if ($count >= 10) {
            return 'เกินกำหนด';
        }
        return view('create');
    }
    public function store(Request $request){
//        dd($request->all());
//        dd($this->randString());
        $long_url = 'https://';
        $long_url .= $request->get('long_url');
        $short_url = $this->randString();

        short_url::create([
            'long_url'=>$long_url,
            'short_url'=>$short_url
        ]);
        return redirect('/')->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function randString(){
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';

//        dd(rand(0,5));
//        dd(strlen($characters));
//        dd($characters[1]);
        $charLength = strlen($characters);
        $numLength = strlen($numbers);
        $string = '394';
        for($i=0;$i < 3;$i++){
            $string.=$characters[rand(0,$charLength-1)];
        }
        for($i=0;$i<2;$i++){
            $string.=$numbers[rand(0,$numLength-1)];
        }
        return $string;
    }

    public function check($code) {
//        dd($code);
        $result = short_url::Where('short_url',$code)->first();
//        dd($result);
        if($result) {
            return redirect()->away($result->long_url);
        }
        return 'ไม่พบรหัส Short URL นี้';
    }
}
