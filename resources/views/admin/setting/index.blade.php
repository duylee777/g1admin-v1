@extends('admin.layouts.index')
 
@section('title', 'Nhóm')

@section('content')

@if(Session::has('msg'))
<div id="msgbox" class="mt-12 absolute top-4 right-4 w-[300px] border bg-green-300 px-4 py-2 rounded-lg shadow-soft-lg flex items-center justify-between" >
    <span class="text-white ">{{ Session::get('msg') }}</span>
    <button type="" onclick="closeBox();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg></button>
</div>
@endif
<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
            </a>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Cài đặt</span>
            </div>
        </li>
    </ol>
</nav>
<section class="bg-gray-50 dark:bg-gray-900 py-4 sm:py-5 mt-5">
    <div class="px-4 mx-auto max-w-screen-2xl">
        <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
            <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <div class="flex items-center flex-1 space-x-4">
                    <h2 class="text-black text-2xl font-semibold">Cài đặt sản phẩm</h2>
                </div>
            </div>
            <!-- --------- -->
            <div class="overflow-x-auto pb-20">
                <div class="mb-4 border-b border-gray-200">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="brand-tab" data-tabs-target="#brand" type="button" role="tab" aria-controls="brand" aria-selected="false">Thương hiệu</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="spec-type-tab" data-tabs-target="#spec-type" type="button" role="tab" aria-controls="spec-type" aria-selected="false">Thông số kỹ thuật</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="unit-tab" data-tabs-target="#unit" type="button" role="tab" aria-controls="unit" aria-selected="false">Đơn vị tính</button>
                        </li>
                        
                    </ul>
                </div>
                <div id="default-tab-content">
                    <div class="hidden p-4" id="brand" role="tabpanel" aria-labelledby="brand-tab">
                        
                    </div>
                    <div class="hidden p-4" id="spec-type" role="tabpanel" aria-labelledby="spec-type-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    </div>
                    <div class="hidden p-4" id="unit" role="tabpanel" aria-labelledby="unit-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection