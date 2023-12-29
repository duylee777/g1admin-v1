@extends('admin.layouts.index')
 
@section('title', 'Sản phẩm')

@section('content')

@if(Session::has('msg'))
<div id="msgbox" class="mt-12 absolute top-4 right-4 w-[300px] border bg-green-300 px-4 py-2 rounded-lg shadow-soft-lg flex items-center justify-between" >
    <span class="text-white ">{{ Session::get('msg') }}</span>
    <button type="" onclick="closeBox();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg></button>
</div>
@endif
@if(Session::has('error'))
<div id="msgbox" class="mt-12 absolute top-4 right-4 w-[300px] border bg-red-300 px-4 py-2 rounded-lg shadow-soft-lg flex items-center justify-between" >
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
                <a href="{{ route('product.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Sản phẩm</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $product->code }}</span>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Chi tiết sản phẩm</span>
            </div>
        </li>
    </ol>
</nav>

<section class="bg-gray-50 dark:bg-gray-900 py-4 sm:py-5 mt-5">
    <a href="{{ route('product.index') }}" class="mx-4 mb-4 inline-flex items-center gap-1 px-4 py-2 bg-white shadow rounded hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 256 512">
            <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/>
        </svg>
        Quay lại
    </a>
    <h1 class="mx-4 mb-4 text-2xl font-semibold text-blue-600">Chi tiết sản phẩm</h1>
    <div class="px-4">
        <div class="flex flex-col gap-4">
            <div class="sm:col-span-2">
                <label for="id" class="block mb-2 font-semibold text-gray-900">ID sản phẩm</label>
                <input type="text" name="id" id="id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $product->id }}" required="" disabled>
            </div>
            <div class="sm:col-span-2">
                <label for="code" class="block mb-2 font-semibold text-gray-900">Mã sản phẩm</label>
                <input type="text" name="code" id="code" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $product->code }}" required="" disabled>
            </div>
            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 font-semibold text-gray-900">Tên sản phẩm</label>
                <input type="text" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $product->name }}" required="" disabled>
            </div>
            <div class="sm:col-span-2">
                <label for="slug" class="block mb-2 font-semibold text-gray-900">Slug</label>
                <input type="text" name="slug" id="slug" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $product->slug }}" required="" disabled>
            </div>
            <div class="sm:col-span-2">
                <label for="active" class="block mb-2 font-semibold text-gray-900">Trạng thái</label>
                <div class="flex gap-4 items-center">
                    @if($product->active == 1)
                        <input type="radio" name="active" value="1" checked disabled>Hoạt động
                    @else
                        <input type="radio" name="active" value="0" checked disabled>Không hoạt động
                    @endif
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 font-semibold text-gray-900">Mô tả</label>
                <textarea name="description" id="description" cols="" rows="3" class="ckeditor w-full focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" disabled>{{ $product->description }}</textarea>
            </div>
            <div class="sm:col-span-2">
                <label for="category_id" class="block mb-2 font-semibold text-gray-900">Danh mục</label>
                @if($product->category_id != null)
                    <span name="category_id">{{ $product->category()->first()->name }}</span>
                @else
                    <span>(Không thuộc danh mục nào)</span>
                @endif
            </div>
            <div class="sm:col-span-2">
                <label for="images" class="block mb-2 font-semibold text-gray-900">Ảnh sản phẩm</label>
                <div id="list-product-image" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php 
                        $listProductImage = json_decode($product->images);
                        $countImage = count($listProductImage);
                    ?>
                    @for($i = 0; $i < $countImage; $i++)
                        <div class="flex items-center justify-center overflow-hidden bg-white p-4 rounded shadow h-60">
                            <img src="{{asset('../storage/products/'.$product->code.'/'.$listProductImage[$i])}}" alt="ảnh sản phẩm" class="w-full rounded-lg">
                        </div>
                    @endfor
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="category_id" class="block mb-2 font-semibold text-gray-900">Thông số kỹ thuật</label>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-4 border-r border-gray-300">Loại thông số kỹ thuật</th>
                            <th scope="col" class="px-6 py-4">Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product->specTypes as $spec)
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap border-r">
                                {{ $spec->name }}
                            </th>
                            <td class="px-6 py-2">
                                <input type="text" name="spectype_{{ $spec->id }}" id="spectype_{{ $spec->id }}" class="bg-white border-none text-gray-900 text-sm focus:ring-blue-600 focus:border-blue-600 block w-full" value="{{ $spec->pivot->value }}" disabled>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="sm:col-span-2">
                <label for="category_id" class="block mb-2 font-semibold text-gray-900">Tài liệu và Phần mềm</label>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-4 border-r border-gray-300">Tài liệu</th>
                            <th scope="col" class="px-6 py-4">Phần mềm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $listDocument = json_decode($extendProduct['document']);
                            $listSoftware = json_decode($extendProduct['software']);
                        ?>
                        <tr class="bg-white border-b ">
                            <td class="px-6 py-2 border-r">
                                <div class="flex flex-col gap-2 mt-4">
                                    @foreach($listDocument as $key => $value)
                                        <a target="_blank" href="{{asset('../storage/documents/'.$product->code.'/'.$value)}}">{{ $value }}</a>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-2">
                                <div class="flex flex-col gap-2 mt-4">
                                    @foreach($listSoftware as $key => $value)
                                        <a target="_blank" href="{{asset('../storage/softwares/'.$product->code.'/'.$value)}}">{{ $value }}</a>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                        
                </table>
            </div>
        </div>
    </div>
    <div class="text-right p-4 mt-4">
        <a href="{{ route('product.edit', $product->id) }}" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-yellow-300 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-yellow-400">
        Chỉnh sửa sản phẩm
        </a>
    </div>
</section>

@endsection

