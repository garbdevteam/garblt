@extends('frontend.layout.main')

@section('content')
    <section class="bridges-projects-page">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">الطرق والكباري</a></li>
                    <li class="breadcrumb-item active" aria-current="page">المشاريع</li>
                </ol>
            </nav>

            <h2 class="heading">المشاريع</h2>

            <div class="bridges-projects">
                @foreach ($projects as $project)
                    <div class="bridges-project">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <img src="{{ asset('storage/'.$project->image) }}" alt="">
                            </div>
                            <div class="col-12 col-md-8">
                                <h3><a class="more-link" href="{{ route('frontend.roads.national_roads_project.show', $project->id)}}">{{$project->name}}</a></h3>
                                <div class="desc">
                                    <div class="location">
                                        <p>موقع المشروع</p>
                                        <p>{{$project->location}}</p>
                                    </div>
                                    <div class="length">
                                        <p>الطول</p>
                                        <p>{{$project->length}}</p>
                                    </div>
                                    <div class="cost">
                                        <p>التكلفة</p>
                                        <p>{{$project->cost}}</p>
                                    </div>
                                </div>
                                <div class="info">
                                    <p>نبذة عن المشروع</p>
                                    <p>{{$project->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

@endsection
