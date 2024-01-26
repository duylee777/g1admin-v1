<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct() {
        // $this->middleware('superadmin');
        var_dump(Auth::check());die;
    }
    
    public function index()
    {
        $dataView = [];
        $tags = Tag::orderBy('id', 'ASC')->paginate(10);
        $dataView['tags'] = $tags;
        return view('admin.tag.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tagName = [];
        $slugTag = [];
        foreach(Tag::get() as $tag) {
            $tagName[] = $tag->name;
            $slugTag[] = $tag->slug;
        }
        if(!in_array($request->name, $tagName) && !in_array($request->slug, $slugTag)) {
            $newTagData = [
                "name" => $request->name,
                "slug" => $request->slug,
            ];

            Tag::create($newTagData);
            return redirect()->route('tag.index')->with(['msg' => 'Tạo mới tag thành công !']);
        }
        else {
            return redirect()->route('tag.create')->with(['error' => 'Tag đã tồn tại !']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('tag.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataView = [];
        $tag = Tag::find($id);
        $dataView['tag'] = $tag;
        return view('admin.tag.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tagName = [];
        $slugTag = [];
        foreach(Tag::get() as $tag) {
            $tagName[] = $tag->name;
            $slugTag[] = $tag->slug;
        }
        if(!in_array($request->name, $tagName) && !in_array($request->slug, $slugTag)) {
            $updateTagData = [
                "name" => $request->name,
                "slug" => $request->slug,
            ];

            Tag::where('id', $id)->update($updateTagData);
            return redirect()->route('tag.index')->with(['msg' => 'Cập nhật tag thành công !']);
        }
        else {
            return redirect()->route('tag.edit', $id)->with(['error' => 'Tên Tag hoặc Tag slug đã tồn tại !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index')->with(['msg' => 'Xóa dữ liệu thành công']);
    }
}
