@extends('admin.layouts.index')
 
@section('title', 'Sản phẩm')

@section('content')

@if(Session::has('error'))
<div id="msgbox" class="mt-12 absolute top-4 right-4 w-[300px] border bg-red-600 px-4 py-2 rounded-lg shadow-soft-lg flex items-center justify-between" >
    <span class="text-white ">{{ Session::get('error') }}</span>
    <button type="" onclick="closeBox();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg></button>
</div>
@endif

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{ route('article.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Bài viết</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $article->id }}</span>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Chi tiết bài viết</span>
            </div>
        </li>
    </ol>
</nav>

<section class="bg-gray-50 dark:bg-gray-900 py-4 sm:py-5 mt-5">
    <a href="{{ route('article.index') }}" class="mx-4 mb-4 inline-flex items-center gap-1 px-4 py-2 bg-white shadow rounded hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 256 512">
            <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/>
        </svg>
        Quay lại
    </a>
    <h2 class=" mx-4 mb-4 text-xl font-bold text-blue-600">Chi tiết bài viết</h2>
    <div class="px-4">
        <div class="flex flex-col gap-4">
            <div class="sm:col-span-2">
                <label for="id" class="block mb-2 font-semibold text-gray-900">ID</label>
                <input type="text" name="id" id="id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $article->id }}" disabled>
            </div>
            <div class="sm:col-span-2">
                <label for="title" class="block mb-2 font-semibold text-gray-900">Tiêu đề bài viết</label>
                <input type="text" name="title" id="title" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $article->title }}" disabled>
            </div>
            <div class="sm:col-span-2">
                <label for="slug" class="block mb-2 font-semibold text-gray-900">Slug</label>
                <input type="text" name="slug" id="slug" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $article->slug }}" disabled>
            </div>
            <div class="sm:col-span-2">
                <label for="status" class="block mb-2 font-semibold text-gray-900">Trạng thái</label>
                <div class="flex gap-4 items-center">
                    @if($article->status == 1)
                        <input type="radio" name="status" value="1" checked>Hoạt động
                    @else
                        <input type="radio" name="status" value="0" checked>Không hoạt động
                    @endif
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="category_id" class="block mb-2 font-semibold text-gray-900">Danh mục</label>
                @if($article->category_id != 0)
                    <span>{{ $article->category->name }}</span>
                @else
                    <span>(Chưa thuộc danh mục nào)</span>
                @endif
            </div>
            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 font-semibold text-gray-900">Mô tả bài viết</label>
                <textarea name="description" id="description" cols="" rows="3" class="ckeditor w-full focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" disabled>{{ $article->description }}</textarea>
            </div>
            <div class="sm:col-span-2">
                <label for="detail" class="block mb-2 font-semibold text-gray-900">Nội dung chi tiết</label>
                <textarea name="detail" id="detail" cols="" rows="3" class="ckeditor w-full focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" disabled>{{ $article->detail }}</textarea>
            </div>
            <div class="sm:col-span-2">
                <label for="image" class="block mb-2 font-semibold text-gray-900">Ảnh bìa của bài viết</label>
                <div id="list-product-image" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="flex items-center justify-center overflow-hidden bg-white p-4 rounded shadow h-60">
                        <img class="w-full rounded-lg" src="{{asset('../storage/articles/'.$article->category_id.'/'.$article->image) }}" alt="Extra large avatar">
                    </div>
                </div>
                
            </div>
            <div class="sm:col-span-2">
                <label for="category_id" class="block mb-2 font-semibold text-gray-900">Tag</label>
                <ul class="flex w-full gap-4 flex-wrap">
                    @if($article->tags != null)
                        @foreach($article->tags as $tag)
                            <li>
                                <label for="option_{{ $tag->id }}" class="text-sm inline-flex items-center justify-between w-full px-4 py-2 text-gray-500 bg-white border-2 border-green-300 rounded-lg cursor-pointer ">                           
                                    <span>{{ $tag->name }}</span>
                                </label>
                            </li>
                        @endforeach
                    @else
                        <li>(Chưa tạo thẻ tag)</li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="text-right p-4 mt-4">
            <a href="{{ route('article.edit', $article->id) }}" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-yellow-300 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-yellow-400">
                Chỉnh sửa bài viết
            </a>
        </div>
    </div>
</section>

@endsection

