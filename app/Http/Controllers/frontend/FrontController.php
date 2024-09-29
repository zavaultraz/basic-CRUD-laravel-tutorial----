<?php

namespace App\Http\Controllers\frontend;

use App\Models\news;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index(){
        $title="Home";
        $newsSideNews = news::where('category_id')->limit(10)->get();
        //get data category
        $sliderNews = news::latest()->limit(3)->get();
        $category= category::latest()->get();
        // get data news by category
   
        return view('frontend.news.index',compact('title', 'category', 'sliderNews', 'newsSideNews'));
    }
    public function detailNews($slug){
        $category=category::latest()->get();
        //get data news
        $news = news::where('slug', $slug )->first();
        return view('frontend.news.detail', compact('category','news'));
    }
    public function detailCategory($slug){
        //  datail/category{slug}
        // 
            $category=category::latest()->get();
       
            $detailCategory = category::where('slug', $slug)->first();
    
            $news = news::where('category_id',$detailCategory->id)->latest()->get();
            return view('frontend.news.detail-category', compact('category','detailCategory','news'));
        }
}
