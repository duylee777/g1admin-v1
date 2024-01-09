@extends('admin.layouts.index')
 
@section('title', 'Đại lý')

@section('content')

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
                <a href="{{ route('agency.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Đại lý</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{ route('agency.show', $agency->id) }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">{{$agency->name}}</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Cập nhật đại lý</span>
            </div>
        </li>
    </ol>
</nav>

<section class="bg-gray-50 dark:bg-gray-900 py-4 sm:py-5 mt-5">
    <a href="{{ route('agency.index') }}" class="mx-4 mb-4 inline-flex items-center gap-1 px-4 py-2 bg-white shadow rounded hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 256 512">
            <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/>
        </svg>
        Quay lại
    </a>
    <h2 class=" mx-4 mb-4 text-xl font-bold text-yellow-300">Cập nhật đại lý</h2>
    <form  method="POST" action="{{ route('agency.update', $agency->id) }}" class="px-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-4">
            <div class="sm:col-span-2">
                <label for="id" class="block mb-2 font-semibold text-gray-900">ID</label>
                <input type="text" name="id" id="id" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $agency->id }}" disabled>
            </div>
            <div class="">
                <label for="" class="block mb-2 font-semibold text-gray-900">Hình ảnh đại lý</label>
                <div class="p-4 flex flex-col lg:flex-row items-center gap-4 bg-white border border-gray-200 rounded-lg shadow">
                    <div class="w-24 h-24 overflow-hidden flex items-center justify-center rounded-md shadow">
                        <img id="preview_brand_image" class="w-full" src="{{asset('../storage/agencies/'.$agency->id.'/'.$agency->logo)}}" alt="Extra large logo">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="block text-sm font-medium text-gray-900" for="file_brand_input">Tải tập tin lên</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="file_input_help" name="image" id="file_brand_input" type="file" onchange="document.getElementById('preview_brand_image').src = window.URL.createObjectURL(this.files[0])">
                        <p class="text-sm text-gray-500" id="file_brand_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-rows-2 lg:grid-cols-2 gap-4">
                <div class="">
                    <label for="name" class="block mb-2 font-semibold text-gray-900">Tên đại lý</label>
                    <input type="text" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $agency->name }}">
                </div>
                <div class="">
                    <label for="slug" class="block mb-2 font-semibold text-gray-900">Slug</label>
                    <input type="text" name="slug" id="slug" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $agency->slug }}">
                </div>
                <div class="">
                    <label for="email" class="block mb-2 font-semibold text-gray-900">Email</label>
                    <input type="text" name="email" id="email" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $agency->email }}">
                </div>
                <div class="">
                    <label for="phone" class="block mb-2 font-semibold text-gray-900">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $agency->phone }}">
                </div>
                <div class="">
                    <label for="address" class="block mb-2 font-semibold text-gray-900">Địa chỉ</label>
                    <input type="text" name="address" id="address" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $agency->address }}">
                </div>
                <div class="">
                    <label for="city" class="block mb-2 font-semibold text-gray-900">Tỉnh/Thành phố</label>
                    <input type="text" name="city" id="city" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ $agency->city }}">
                </div>
            </div>
            <div class="grid grid-rows-2 lg:grid-cols-2 gap-4">
                <div class="">
                    <label for="map_link" class="block mb-2 font-semibold text-gray-900">Liên kết bản đồ</label>
                    <input type="text" name="map_link" id="map_link" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ json_decode($agency->map_link) }}">
                </div>
                <div class="">
                    <label for="product_link" class="block mb-2 font-semibold text-gray-900">Liên kết sản phẩm</label>
                    <input type="text" name="product_link" id="product_link" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" value="{{ json_decode($agency->product_link) }}">
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-yellow-300 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-yellow-600">
                Cập nhật đại lý
            </button>
        </div>
    </form>
</section>

@endsection