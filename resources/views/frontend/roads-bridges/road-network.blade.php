@extends('frontend.layout.main')

@section('content')
<section class="error-page">
    <div class="container">
        <div class="error-desc">
            <h3>خريطة شبكة
                الطرق بمصر</h3>
                <p>{!! $contents !!}</p>
           
        </div>
    </div>
</section>

@endsection
