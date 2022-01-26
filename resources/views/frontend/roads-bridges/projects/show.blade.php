@extends('frontend.layout.main')

@section('content')
<section class="bridges-projects-page">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">الطرق والكباري</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('frontend.projects') }}" style="color: #016599">المشاريع</a></li>
            </ol>
        </nav>

        <h2 class="heading">تفاصيل المشروع</h2>
        <div class="single-tender">
            <h2 class="heading"> {{$project->name}}</h2>
            <div class="time">
                <img src="{{ url('frontend\images\icons\clock.svg')}}" alt="">
                <span>
                   {{ $project->created_at}}
                </span>
            </div>

            <div class="conditions text-center">
                <div class="row">
                    <div class="col">
                        <h4>{{$project->name}}</h4>
                        <br>
                        <img src="{{ asset('storage/'.$project->image) }}" alt="" width="700" height="500">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <h4>الموقع</h4>
                        <p>{{ $project->location}}</p>
                    </div>
                    <div class="col">
                        <h4>تكلفه المشروع</h4>
                        <p>{{ $project->cost}}</p>
                    </div>
                    <div class="col">
                        <h4>مده انشاء المشروع</h4>
                        <p>{{ $project->length}}</p>
                    </div>
                </div>
            </div>

            <div class="desc">
                <p style="text-align:center">{{$project->description}}</p>

            </div>

        </div>



    </div>
</section>


@endsection
