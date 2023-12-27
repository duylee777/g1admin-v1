@extends('admin.layouts.index')
 
@section('title', 'Vai trò')

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
                <a href="{{ route('role.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Vai trò</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Cập nhật vai trò: {{ $role->name }}</span>
            </div>
        </li>
    </ol>
</nav>

<section class="bg-gray-50 dark:bg-gray-900 py-4 sm:py-5 mt-5">
    <h2 class=" mx-4 mb-4 text-xl font-bold text-yellow-300">Cập nhật vai trò: <span class="text-gray-900">{{ $role->name }}</span></h2>
    <form  method="POST" action="{{ route('role.update', $role->id) }}" class="px-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="flex flex-col gap-4">
                <div class="sm:col-span-2">
                    <label for="role_id" class="block mb-4 font-semibold text-gray-900 dark:text-white">ID</label>
                    <input type="text" name="role_id" id="role_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="" required="" value="{{ $role->id }}" disabled>
                </div>
                <div class="sm:col-span-2">
                    <label for="type" class="block mb-4 font-semibold text-gray-900 dark:text-white">Loại</label>
                    <input type="text" name="type" id="type" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="" required="" value="{{ $role->type }}">
                </div>
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-4 font-semibold text-gray-900 dark:text-white">Tên vai trò</label>
                    <input type="text" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="" required="" value="{{ $role->name }}">
                </div>
            </div>
            <div class="">
                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Quyền</h3>
                <ul class="p-4 items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg grid gap-4 grid-cols-1 lg:grid-cols-2">
                    @foreach($permissions as $permission)
                        <li class="flex items-center p-2 border rounded-lg">
                            @if($role->permissions->where('id', $permission->id)->first() == null)
                                <input id="checkbox-{{ $permission->id }}" type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                            @else
                                <input id="checkbox-{{ $permission->id }}" type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 " checked>
                            @endif
                            <label for="checkbox-{{ $permission->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $permission->name }}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-yellow-300 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-yellow-400">
            Cập nhật
            </button>
        </div>
    </form>
</section>
@endsection
