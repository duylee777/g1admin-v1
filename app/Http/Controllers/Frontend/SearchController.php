<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $dataView = [];
        $keyword = ($request->input('keyword')) ? $request->query('keyword') : "";
        $keyword = trim(strip_tags($keyword));
        $listProduct = [];
        if($keyword != "") {
            $listProduct = Product::where("name", "like", "%$keyword%")->get();
        }
        $dataView['listProduct'] = $listProduct;
        $dataView['key'] = $request->input('keyword');

        return view('theme.search', $dataView);
    }
}
