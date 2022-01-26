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
                    مشروعات كباري بالمنطقة
                    <small>
                        <a href="{{route('admin.regions_bridges.create', $regions_id)}}" class="btn btn-success btn-xs">أضافة</a>
                        <a href="{{route('admin.regions_bridges.order', $regions_id)}}" class="btn btn-primary btn-xs">ترتيب</a>
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
                                    <th style="text-align:center; width:15%;">الحمولة</th>
                                    <th style="text-align:center; width:15%;">تكلفة</th>
                                    <th style="text-align:center; width:20%;">صورة</th>
                                    <th style="text-align:center; width:5%;">ترتيب</th>
                                    <th style="text-align:center; width:5%;">تعديل</th>
                                    <th style="text-align:center; width:5%;">حذف</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($RegionsBridgesProjects as $RegionsBridgesProject)
                                <tr>
                                    <td>{{$RegionsBridgesProject->id}}</td>
                                    <td>{{$RegionsBridgesProject->name}}</td>
                                    <td>{{$RegionsBridgesProject->location}}</td>
                                    <td>{{$RegionsBridgesProject->length}}</td>
                                    <td>{{$RegionsBridgesProject->bridge_load}}</td>
                                    <td>{{$RegionsBridgesProject->cost}}</td>
                                    <td>
                                    <img src="{{ asset('storage/'.$RegionsBridgesProject->image) }}" alt="" style="max-height:200px;">

                                    </td>

                                    <td>{{$RegionsBridgesProject->order}}</td>

                                    <td><a href="{{route('admin.regions_bridges.edit', [$regions_id, $RegionsBridgesProject->id])}}" class="btn btn-warning ">تعديل</a></td>
                                    <td>
                                        <form action="{{route('admin.regions_bridges.destroy', [$regions_id, $RegionsBridgesProject->id])}}" method="post">
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

