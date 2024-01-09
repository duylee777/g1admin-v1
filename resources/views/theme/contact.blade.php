@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/contact.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
@endpush
@section('title','Liên hệ')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="">Trang chủ</a>
        <span>&gt;</span>
        <span>Liên hệ</span>
    </div>
</section>
<section class="s-area contactpage-area">
    <div class="s-header containerx">
        <h2 class="s-header__title">Liên hệ chúng tôi</h2>
    </div>
    
    <div class="contactpage-wrap containerx">
        <div class="contactpage-info">
            <h3 class="company-name">Công ty Cổ phần Điện Tử và Công nghệ Phượng Hoàng</h3>
            <div class="company-info">
                <span><i class="fa-solid fa-location-dot"></i> Miền Bắc: Y01-19, An Phú Villa, Dương Kinh,Hà Đông, Hà Nội</span>
                <span><i class="fa-solid fa-location-dot"></i> Miền Nam: Số 10 Thống nhất, Phường Tân Thành, Quận Tân Phú, TP. HCM</span>
                <span><i class="fa-solid fa-envelope"></i>  dientuphuonghoang@gmail.com</span>
                <span><i class="fa-solid fa-phone"></i>  024 6671 1717</span>
                <span><i class="fa-solid fa-user"></i>  Mr.Quân: 0933 991 338</span>
                <span><i class="fa-solid fa-user"></i>  Mr.Vinh: 0903 468 429</span>
            </div>
        </div>
        <div class="contactpage-form-wrap">
            <form method="" action="" class="contactpage-form">
                
                <div class="contactpage-form__item">
                    <label for="name">Tên</label>
                    <input type="text" id="name" name="name" placeholder="Nhập tên ..." required>
                </div>
                <div class="contactpage-form__item">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Nhập email ..." required>
                </div>
                <div class="contactpage-form__item">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại ..." required>
                </div>
                <div class="contactpage-form__item">
                    <label for="message">Tin nhắn</label>
                    <textarea name="message" id="message" cols="30" rows="5" placeholder="Nhập thông điệp của bạn ..." required></textarea>
                </div>
                <div class="contactpage-form-btn">
                    <button type="submit" class="contactpage-btn">Gửi</button>
                </div>
            </form>
        </div>
        
    </div>
    
    <div class="contactpage-maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d931.3295967207595!2d105.76048861158327!3d20.979870758898908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjDCsDU4JzQ4LjQiTiAxMDXCsDQ1JzM5LjYiRQ!5e0!3m2!1svi!2s!4v1700991792090!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".contactpage-btn").click(function(e) {
            e.preventDefault();

            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var message = $("#message").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('theme.contact_post') }}",
                data: {
                    "name":name, 
                    "email": email, 
                    "phone": phone,
                    "message": message
                },
                success: function() {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your work has been saved",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                            location.reload();
                        });
                    
                },
                error: function() {
                    alert('Thông tin chưa được gửi đi !');
                }
            })
        });
    });
</script>
@endsection