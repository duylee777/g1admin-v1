<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Article;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ExtendProduct;

class HomeController extends Controller
{
    public function home(){
        $dataView = [];
        $products = Product::where('featured', 1)->orderBy('id', 'DESC')->get();
        $categoryProject = Category::where('slug', 'du-an')->first();
        $projects = Article::where('category_id', $categoryProject->id)->orderBy('id', 'DESC')->take(4)->get();
        $categoryNews = Category::where('slug', 'tin-tuc')->first();
        $news = Article::where('category_id', $categoryNews->id)->orderBy('id', 'DESC')->take(4)->get();
        $dataView['products'] = $products;
        $dataView['projects'] = $projects;
        $dataView['news'] = $news;
        return view('theme.home', $dataView);
    }

    public function about(){
        return view('theme.about');
    }
    public function category($slug_category) {
        $dataView = [];
        $category = Category::where('slug', $slug_category)->first();
        $listProduct = Product::where('category_id', $category->id)->get();
        $dataView['category'] = $category;
        $dataView['listProduct'] = $listProduct;
        return view('theme.category', $dataView);
    }

    public function productDetail($slug_category, $slug_product) {
        $dataView = [];
        $category = Category::where('slug', $slug_category)->first();
        $product = Product::where('slug', $slug_product)->first();
        $listImg = json_decode($product->images);
        $extendProduct = ExtendProduct::where('product_id', $product->id)->first();
        $documentProduct = json_decode($extendProduct->document);
        $softwareProduct = json_decode($extendProduct->software);
        $driverProduct = json_decode($extendProduct->driver);
        $dataView['category'] = $category;
        $dataView['product'] = $product;
        $dataView['listImg'] = $listImg;
        $dataView['documentProduct'] = $documentProduct;
        $dataView['softwareProduct'] = $softwareProduct;
        $dataView['driverProduct'] = $driverProduct;
        return view('theme.product.product-detail', $dataView);
    }

    public function project() {
        $dataView = [];
        $categoryProject = Category::where('slug', 'du-an')->first();
        $projects = Article::where('category_id', $categoryProject->id)->orderBy('id', 'ASC')->get();
        $dataView['projects'] = $projects;
        return view('theme.project.project-list', $dataView);
    }

    public function projectDetail($slug_project) {
        $dataView = [];
        $project = Article::where('slug', $slug_project)->first();
        $dataView['project'] = $project;
        return view('theme.project.project-detail', $dataView);
    }

    public function news() {
        $dataView = [];
        $categoryNews = Category::where('slug', 'tin-tuc')->first();
        $latestNews = Article::where('category_id', $categoryNews->id)->orderBy('id', 'DESC')->take(3)->get();
        $news = Article::where('category_id', $categoryNews->id)->orderBy('id', 'ASC')->get();
        $dataView['news'] = $news;
        $dataView['latestNews'] = $latestNews;
        return view('theme.news.news-list', $dataView);
    }

    public function newsDetail($slug_news) {
        $dataView = [];
        $categoryNews = Category::where('slug', 'tin-tuc')->first();
        $latestNews = Article::where('category_id', $categoryNews->id)->orderBy('id', 'DESC')->take(3)->get();
        $newsDetail = Article::where('slug', $slug_news)->first();
        $dataView['newsDetail'] = $newsDetail;
        $dataView['latestNews'] = $latestNews;
        return view('theme.news.news-detail', $dataView);
    }

    public function agency() {
        $dataView = [];
        $agencies = Agency::get();
        $dataView['agencies'] = $agencies;
        return view('theme.agency', $dataView);
    } 

    public function support() {
        $dataView = [];
        $products = Product::get();
        $dataView['products'] = $products;
        return view('theme.support', $dataView);
    }

    public function download() {
        $dataView = [];
        $products = Product::get();
        $dataView['products'] = $products;
        return view('theme.download', $dataView);
    }

    public function contact() {
        return view('theme.contact');
    }

    public function contactPost(Request $request) {
        $contact = [
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "message" => $request->message,
        ];
        Contact::create($contact);
        
        return response()->json();
    }

}
