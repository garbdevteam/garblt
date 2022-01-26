@extends('frontend.layout.main')

@section('content')
<section class="tenders-page">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">المناقصات و الوظائف</a></li>
                <li class="breadcrumb-item active" aria-current="page">الوظائف</li>
            </ol>
        </nav>
        <h2 class="heading">الوظائف</h2>
        @foreach ($jobs as $job)
        <div class="tender">
            <div class="head">
                <h3>{{$job->name}}</h3>
                <div class="time">
                    <img src="{{ url('frontend\images\icons\clock.svg')}}" alt="">
                    <span>{{$job->end_date}}</span>
                </div>
            </div>
            <p>{{$job->	description	}}</p>
            <div class="text-right">
                <a href="{{route('frontend.jobs.show', $job->id)}}">المزيد عن الوظيفة</a>
            </div>

        </div>

        @endforeach

    </div>
</section>

@endsection
