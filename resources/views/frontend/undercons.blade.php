@extends('frontend.layout.main')

@section('content')
<section class="error-page">
    <div class="container">
        <div class="error-desc">
            <h3>
                الصفحة تحت الانشاء
            </h3>
            <img src="{{ url('frontend\images\underconstruction.png')}}" alt="">
        </div>
    </div>
</section>

@endsection
