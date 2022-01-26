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
                    مشروعات طرق بالمنطقة
                    <small>
                        <a href="{{route('admin.regions_roads.create', $regions_id)}}" class="btn btn-success btn-xs">أضافة</a>
                        <a href="{{route('admin.regions_roads.order', $regions_id)}}" class="btn btn-primary btn-xs">ترتيب</a>
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
                                    <th style="text-align:center; width:15%;">الموقع</th>
                                    <th style="text-align:center; width:15%;">طول</th>
                                    <th style="text-align:center; width:20%;">صورة</th>
                                    <th style="text-align:center; width:5%;">ترتيب</th>
                                    <th style="text-align:center; width:5%;">تعديل</th>
                                    <th style="text-align:center; width:5%;">حذف</th>
                                </tr>
                            </thead>

                            {{-- 'regionsr_id', 'name', 'location','length','image','order' --}}

                            <tbody>
                                @foreach ($RegionsRoadsProjects as $RegionsRoadsProject)
                                <tr>
                                    <td>{{$RegionsRoadsProject->id}}</td>
                                    <td>{{$RegionsRoadsProject->name}}</td>
                                    <td>{{$RegionsRoadsProject->location}}</td>
                                    <td>{{$RegionsRoadsProject->length}}</td>
                                    <td>
                                    <img src="{{ asset('storage/'.$RegionsRoadsProject->image) }}" alt="" style="max-height:200px;">

                                    </td>

                                    <td>{{$RegionsRoadsProject->order}}</td>

                                    <td><a href="{{route('admin.regions_roads.edit', [$regions_id, $RegionsRoadsProject->id])}}" class="btn btn-warning ">تعديل</a></td>
                                    <td>
                                        <form action="{{route('admin.regions_roads.destroy', [$regions_id, $RegionsRoadsProject->id])}}" method="post">
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

