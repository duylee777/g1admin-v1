@extends('admin.layouts.index')
 
@section('title', 'Người dùng')

@section('content')
<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
                <a href="{{ route('user.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Người dùng</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Thêm người dùng mới</span>
            </div>
        </li>
    </ol>
</nav>
<section class="bg-gray-50 dark:bg-gray-900 py-4 sm:py-5 mt-5">
    <a href="{{ route('user.index') }}" class="mx-4 mb-4 inline-flex items-center gap-1 px-4 py-2 bg-white shadow rounded hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="8" viewBox="0 0 256 512">
            <path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/>
        </svg>
        Quay lại
    </a>
    <h2 class="mx-4 mb-4 text-xl font-bold text-blue-600">Thêm người dùng mới</h2>
    <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="p-4 mx-4 flex items-center gap-4 bg-white border border-gray-200 rounded shadow">
            <div class="w-24 h-24 overflow-hidden flex items-center justify-center rounded-lg shadow">
                <img id="preview_avatar" class="w-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Extra large avatar">
            </div>
            <div class="flex flex-col gap-2">
                <label class="block text-sm font-medium text-gray-900" for="file_input">Tải tập tin lên</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="file_input_help" name="avatar" id="file_input" type="file" onchange="document.getElementById('preview_avatar').src = window.URL.createObjectURL(this.files[0])">
                <p class="text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 mx-4">
            <div class="p-4 items-center bg-white border border-gray-200 rounded shadow">
                <h4 class="block pb-2 mb-4 font-semibold border-b border-gray-200">Thông tin liên hệ</h4>
                <div class="flex flex-col gap-4">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 font-semibold text-gray-900">Họ và tên</label>
                        <input type="text" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full px-4 py-3" placeholder="Nhập họ và tên ..." required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 font-semibold text-gray-900">Email</label>
                        <input type="text" name="email" id="email" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full px-4 py-3" placeholder="Nhập email ..." required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone" class="block mb-2 font-semibold text-gray-900">Số điện thoại</label>
                        <input type="text" name="phone" id="phone" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full px-4 py-3" placeholder="Nhập số điện thoại ..." required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 font-semibold text-gray-900">Địa chỉ</label>
                        <input type="text" name="address" id="address" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full px-4 py-3" placeholder="Nhập địa chỉ ..." required="">
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <div class="p-4 items-center bg-white border border-gray-200 rounded shadow">
                    <h4 class="block pb-2 mb-4 font-semibold border-b border-gray-200">Thông tin đăng nhập</h4>
                    <div class="flex flex-col gap-4">
                        <div class="sm:col-span-2">
                            <label for="username" class="block mb-2 font-semibold text-gray-900">Tên đăng nhập</label>
                            <input type="text" name="username" id="username" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Nhập tên đăng nhập ..." required="">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="password" class="block mb-2 font-semibold text-gray-900">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Nhập mật khẩu ..." required="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right p-4 mt-4">
            <button type="submit" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-900">
                Tạo người dùng
            </button>
        </div>
    </form>
</section>
@endsection

