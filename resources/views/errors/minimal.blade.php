@extends('frontend.layout.main')

@section('content')
<section class="error-page">
    <div class="container">
        <div class="error-desc">
            <img src="{{ url('frontend\images\icons/error-404.svg')}}"  alt="">
            <h3>عفوا لقد حصل خطأ ما</h3>
            <h4>@yield('code','لا يوجد كود')</h4>
            <p>@yield('message','لا يوجد رسالة خطأ')</p>
        </div>
    </div>
</section>


@endsection
