<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataView = [];
        $articles = Article::orderBy('id', 'ASC')->paginate(10);
        $dataView['articles'] = $articles;
        return view('admin.article.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataView = [];
        $isCategories = count(Category::get());
        if($isCategories != 0) {
            $categories = Category::get();
        }
        else {
            $categories = null;
        }
        $isTags = count(Tag::get());
        if($isTags != 0) {
            $tags = Tag::get();
        }
        else {
            $tags = null;
        }
        
        $dataView['categories'] = $categories;
        $dataView['tags'] = $tags;
        return view('admin.article.create', $dataView);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // var_dump($request->category_id);die;
        $getSlugArticle = [];
        foreach( Article::get() as $article) {
            $getSlugArticle[] = $article->slug;
        }
        if(!in_array($request->slug, $getSlugArticle)) {
            $newArticleData = [
                "title" => $request->title,
                "slug" => $request->slug,
                "status" => $request->status,
                "description" => $request->description,
                "detail" => $request->detail,
                "category_id" => $request->category_id,
            ];

            if($request->file('image') != null) {
                $imageName = time().'_'.$request->file('image')->getClientOriginalName();
                $linkStorage = "public/articles/".$request->category_id."/";
                $request->image->storeAs($linkStorage, $imageName);

                $newArticleData["image"] = $imageName;
            }
            
            // var_dump($newArticleData);die;
            Article::create($newArticleData);

            $article = Article::where('slug', $request->slug)->first();
            
            
            if($request->input('options') != null) {
                $options = $request->input('options');
                foreach($options as $option){
                    $article->tags()->attach((int)$option);
                }
            }

            return redirect()->route('article.index')->with(['msg' => 'Tạo mới bài viết thành công !']);

        }
        else {
            return redirect()->route('article.create')->with(['error' => 'Slug bài viết đã tồn tại !']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dataView = [];
        $article = Article::find($id);
        $dataView['article'] = $article;
        return view('admin.article.show', $dataView);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataView = [];
        $isCategories = count(Category::get());
        if($isCategories != 0) {
            $categories = Category::get();
        }
        else {
            $categories = null;
        }
        $isTags = count(Tag::get());
        if($isTags != 0) {
            $tags = Tag::get();
        }
        else {
            $tags = null;
        }
        $article = Article::find($id);
        $dataView['article'] = $article;
        $dataView['categories'] = $categories;
        $dataView['tags'] = $tags;
        return view('admin.article.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        
        // $getSlugArticle = [];
        // foreach( Article::get() as $article) {
        //     $getSlugArticle[] = $article->slug;
        // }
        $updateArticleData = [
            "title" => $request->title,
            "slug" => $request->slug,
            "status" => $request->status,
            "description" => $request->description,
            "detail" => $request->detail,
            "category_id" => $request->category_id,
        ];

        if($request->file('image') != null) {
            Storage::deleteDirectory('public/articles/'.$article->category_id);
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $linkStorage = "public/articles/".$request->category_id."/";
            $request->image->storeAs($linkStorage, $imageName);

            $updateArticleData["image"] = $imageName;
        }
        
        // var_dump($newArticleData);die;
        Article::where('id', $id)->update($updateArticleData);
        
        
        if($request->input('options') != null) {
            foreach($article->tags as $tag) {
                $article->tags()->detach($tag->id);
            };
            $options = $request->input('options');
            foreach($options as $option){
                $article->tags()->attach((int)$option);
            }
        }

        return redirect()->route('article.show', $id)->with(['msg' => 'Tạo mới bài viết thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with(['msg' => 'Xóa dữ liệu thành công !']);
    }
}
