<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" /> -->
    <title>G1 Admin</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    

<header>
    @include('admin.layouts.header')
</header>

<main>
    @include('admin.layouts.sidebar')
    <div class="p-4 sm:ml-64 mt-14">
        @yield('content')
    </div>
</main>
<footer class="sm:ml-64 bg-white rounded-lg shadow dark:bg-gray-800">
    @include('admin.layouts.footer')
</footer>    
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="{{asset('../assets/admin/ckeditor/ckeditor.js')}}"></script>
<script>
    function closeBox() {
        var box = document.getElementById('msgbox');
        box.classList.remove('flex');
        box.classList.add('hidden');
    }
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
</html>