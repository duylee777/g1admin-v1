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
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">admin</span>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Chi tiết hồ sơ</span>
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
    <h1 class="mx-4 mb-4 text-2xl font-semibold text-blue-600">Chi tiết hồ sơ</h1>
    <div class="p-4 mx-4 flex items-center gap-4 bg-white border border-gray-200 rounded shadow">
        <div class="w-24 h-24 overflow-hidden flex items-center justify-center rounded-lg shadow">
            <img class="w-full" src="{{asset('../storage/users/'.$user->username.'/'.$user->avatar)}}" alt="Extra large avatar">
        </div>
        <div class="flex flex-col gap-2">
            <h3 class="capitalize font-semibold text-xl">{{ $user->name }} <span class="text-xs">({{ $user->username }})</span></h3>
            @if($user->roles()->first() == NULL)
                <span class="italic text-xs">(Chưa thiết lập vai trò)</span>
            @else
                <span>{{ $user->roles()->first()->name }}</span>
            @endif
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 mx-4">
        <div class="p-4 items-center bg-white border border-gray-200 rounded shadow">
            <h4 class="block pb-2 mb-4 font-semibold border-b border-gray-200">Thông tin liên hệ</h4>
            <div class="flex flex-col gap-4">
                <div class="">
                    <span class="font-semibold">Họ và tên: </span>
                    <span>{{ $user->name }}</span>
                </div>
                <div class="">
                    <span class="font-semibold">Email: </span>
                    <span>{{ $user->email }}</span>
                </div>
                <div class="">
                    <span class="font-semibold">Số điện thoại: </span>
                    <span>{{ $user->phone }}</span>
                </div>
                <div class="">
                    <span class="font-semibold">Địa chỉ: </span>
                    <span>{{ $user->address }}</span>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-4">
            <div class="p-4 items-center bg-white border border-gray-200 rounded shadow">
                <h4 class="block pb-2 mb-4 font-semibold border-b border-gray-200">Nhóm/Phòng ban</h4>
                <div class="flex flex-col gap-4">
                    @if($user->roles()->first() == NULL)
                        <span class="italic text-xs">(Chưa thiết lập nhóm/phòng ban)</span>
                    @else
                        @if($user->roles()->first()->type == 'super_admin')
                            <span class="italic text-xs">(Không có nhóm/phòng ban)</span>
                        @else
                            @if($user->groups != 'None')
                                <span>{{$user->groups}}</span>
                            @else
                                <span class="italic text-xs">(Chưa thuộc nhóm/phòng ban nào)</span>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
            <div class="p-4 items-center bg-white border border-gray-200 rounded shadow">
                <h4 class="block pb-2 mb-4 font-semibold border-b border-gray-200">Quyền được cấp</h4>
                <div class="flex flex-col gap-4">
                    @if($user->roles()->first() == NULL)
                        <span class="italic text-xs">(Chưa thiết lập quyền)</span>
                    @else
                        @foreach($user->roles()->first()->permissions()->get() as $permission)
                            <span class="italic text-xs inline-block px-2 py-1 rounded-sm text-white bg-green-400">{{ $permission->name }}</span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="text-right p-4 mt-4">
        <a href="{{ route('user.edit', $user->id) }}" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-yellow-300 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-yellow-400">
        Chỉnh sửa hồ sơ
        </a>
    </div>
</section>
@endsection
