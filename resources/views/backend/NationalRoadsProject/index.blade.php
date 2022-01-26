@extends('backend.layout.mainLayout')

@section('main')
<style>
    .form-group {
        margin-bottom: 20px !important;
    }

</style>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    المشروع القومي للطرق
                    <small>
                        <a href="{{route('admin.national_roads_project.create')}}" class="btn btn-success btn-xs">أضافة</a>
                        <a href="{{route('admin.national_roads_project.order')}}" class="btn btn-primary btn-xs">ترتيب</a>
                    </small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table id="datatable-list" class="table table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th style="text-align:center; width:5%;">رقم بقاعدة البيانات</th>
                                    <th style="text-align:center; width:15%;">الاسم</th>
                                    <th style="text-align:center; width:15%;">الوصف</th>
                                    <th style="text-align:center; width:15%;">الموقع</th>
                                    <th style="text-align:center; width:15%;">الطول</th>
                                    <th style="text-align:center; width:15%;">التكلفة</th>
                                    <th style="text-align:center; width:20%;">صورة</th>
                                    <th style="text-align:center; width:5%;">ترتيب</th>
                                    <th style="text-align:center; width:5%;">تعديل</th>
                                    <th style="text-align:center; width:5%;">حذف</th>
                                </tr>
                            </thead>

                            {{-- 'name', 'location', 'length', 'cost', 'image', 'order' --}}

                            <tbody>
                                @foreach ($NationalRoadsProjects as $NationalRoadsProject)
                                <tr>
                                    <td>{{$NationalRoadsProject->id}}</td>
                                    <td>{{$NationalRoadsProject->name}}</td>
                                    <td>{{$NationalRoadsProject->description}}</td>
                                    <td>{{$NationalRoadsProject->location}}</td>
                                    <td>{{$NationalRoadsProject->length}}</td>
                                    <td>{{$NationalRoadsProject->cost}}</td>
                                    <td>
                                    <img src="{{ asset('storage/'.$NationalRoadsProject->image) }}" alt="" style="max-height:200px;">
                                    </td>
                                    <td>{{$NationalRoadsProject->order}}</td>

                                    <td><a href="{{route('admin.national_roads_project.edit', $NationalRoadsProject->id)}}" class="btn btn-warning ">تعديل</a></td>
                                    <td>
                                        <form action="{{route('admin.national_roads_project.destroy', $NationalRoadsProject->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger ">حذف</button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
<!-- /page content -->
@endsection

