@extends('frontend.layout.main')

@section('content')
<section class="tenders-page road-safety">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">المناقصات و الوظائف</a></li>
                <li class="breadcrumb-item active" aria-current="page">المناقصات</li>
            </ol>
        </nav>
        <h2 class="heading">المناقصات</h2>

        @foreach ($tenders as $tender)
        <div class="tender">
            <div class="head">
                <h3>{{$tender->name}}</h3>
                <div class="time">
                    <img src="{{ url('frontend\images\icons\clock.svg')}}" alt="">
                    <span>{{$tender->end_date}}</span>
                </div>
            </div>
            <p>{{$tender->description}}</p>
                <div class="text-right">
                    <a href="{{route('frontend.tender.show', $tender->id)}}">المزيد عن المناقصة</a>
                </div>
        </div>

        @endforeach

    </div>
</section>

@endsection
