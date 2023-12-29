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
                <a href="{{ route('product.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Sản phẩm</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Thêm sản phẩm mới</span>
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
    <h2 class=" mx-4 mb-4 text-xl font-bold text-blue-600">Thêm sản phẩm mới</h2>
    <form  method="POST" action="{{ route('product.store') }}" class="px-4" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col gap-4">
            <div class="sm:col-span-2">
                <label for="code" class="block mb-2 font-semibold text-gray-900">Mã sản phẩm</label>
                <input type="text" name="code" id="code" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Nhập mã sản phẩm ..." required="">
            </div>
            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 font-semibold text-gray-900">Tên sản phẩm</label>
                <input type="text" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Nhập tên sản phẩm ..." required="">
            </div>
            <div class="sm:col-span-2">
                <label for="slug" class="block mb-2 font-semibold text-gray-900">Slug</label>
                <input type="text" name="slug" id="slug" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Nhập slug ..." required="">
            </div>
            <div class="sm:col-span-2">
                <label for="active" class="block mb-2 font-semibold text-gray-900">Trạng thái</label>
                <div class="flex gap-4 items-center">
                    <input type="radio" name="active" value="1">Hoạt động
                    <input type="radio" name="active" value="0">Không hoạt động
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="description" class="block mb-2 font-semibold text-gray-900">Mô tả</label>
                <textarea name="description" id="description" cols="" rows="3" class="ckeditor w-full focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Nhập mô tả ..."></textarea>
            </div>
            <div class="sm:col-span-2">
                <label for="category_id" class="block mb-2 font-semibold text-gray-900">Danh mục</label>
                <select id="category_id" name="category_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option value="0" selected>-- Không có danh mục --</option>
                    @if($categories != null)
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    @else
                        <option disabled>(Chưa khởi tạo danh mục)</option>
                    @endif
                </select>
            </div>
            <div class="sm:col-span-2">
                <label for="images" class="block mb-2 font-semibold text-gray-900">Ảnh sản phẩm</label>
                <div id="list-product-image" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"></div>
                <div class="flex flex-col gap-2 mt-4">
                    <label class="block text-sm font-medium text-gray-900" for="file_input">Tải tập tin lên</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="file_input_help" name="images[]" id="file_input" type="file" multiple>
                    <p class="text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
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
                        @foreach($specTypes as $specType)
                        <tr class="bg-white border-b ">
                            <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap border-r">{{ $specType->name }}</th>
                            <td class="px-6 py-2">
                                <input type="text" name="spectype_{{ $specType->id }}" id="spectype_{{ $specType->id }}" class="bg-white border-none text-gray-900 text-sm focus:ring-blue-600 focus:border-blue-600 block w-full" placeholder="Nhập giá trị ...">
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
                        <tr class="bg-white border-b ">
                            <td class="px-6 py-2 border-r">
                                <div class="flex flex-col gap-2 mt-4">
                                    <label class="block text-sm font-medium text-gray-900" for="document_file_input">Tải tập tin lên</label>
                                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="document_file_input_help" name="document_file_input[]" id="document_file_input" type="file" multiple>
                                    <p class="text-sm text-gray-500" id="document_file_input_help">PDF</p>
                                </div>
                            </td>
                            <td class="px-6 py-2">
                                <div class="flex flex-col gap-2 mt-4">
                                    <label class="block text-sm font-medium text-gray-900" for="software_file_input">Tải tập tin lên</label>
                                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="software_file_input_help" name="software_file_input[]" id="software_file_input" type="file" multiple>
                                    <p class="text-sm text-gray-500" id="software_file_input_help">ZIP, RAR</p>
                                </div>
                            </td>
                        </tr>
                        
                </table>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-900">
                Tạo sản phẩm
            </button>
        </div>
    </form>
</section>
<script>
    const fileUpload = document.querySelector("#file_input");
    let listProductImage = document.querySelector('#list-product-image');

    fileUpload.addEventListener("change", (e) => {
        e.preventDefault();
        let data = document.querySelectorAll('#list-product-image div');
        if(data.length > 0) {
            for(let i = 0; i < data.length; i++) {
                listProductImage.removeChild(data[i]);
            }
        }
        
        const files = e.target.files;
        for(let i = 0; i < files.length; i++) {
            let imageWrap = document.createElement('div');
            imageWrap.className = 'flex items-center justify-center overflow-hidden bg-white p-4 rounded shadow h-60';
            let image = document.createElement('img');
            image.className = 'w-full rounded-lg';
            image.src = window.URL.createObjectURL(files[i]);

            imageWrap.appendChild(image);
            listProductImage.appendChild(imageWrap);
        }
    });

    

    
    
</script>
@endsection

