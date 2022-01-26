@extends('frontend.layout.main')

@section('content')
    <section class="bridges-projects-page">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> الهيئه</a></li>
                    <li class="breadcrumb-item active" aria-current="page">المناطق</li>
                </ol>
            </nav>

            <h2 class="heading">المناطق</h2>

            <div class="bridges-projects">
                @foreach ($regions as $region)
                    <div class="bridges-project">
                        <div class="row">

                            <div class="col-12 col-md-8">
                                <h3>{{ $region->name}}</h3>
                                <div class="desc">
                                    <div class="location">
                                        <p> اسم المشرف</p>
                                        <p>{{$region->chief_name}}</p>
                                    </div>
                                    <div class="length">
                                        <p>تليفون المشرف</p>
                                        <p>{{$region->telephone}}</p>
                                    </div>
                                    <div class="cost">
                                        <p>الفاكس</p>
                                        <p>{{$region->fax}}</p>
                                    </div>
                                </div>


                            </div>
                             <div class="text-right">
                               <a href="{{ route('frontend.regions.details', $region->id ) }}">المزيد عن المنطقه</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

@endsection
