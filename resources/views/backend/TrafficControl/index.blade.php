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
                    وسائل التحكم المروري
                    <small>
                        <a href="{{route('admin.traffic_control.create')}}" class="btn btn-success btn-xs">أضافة</a>
                        <a href="{{route('admin.traffic_control.order')}}" class="btn btn-primary btn-xs">ترتيب</a>
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

                                    <th style="text-align:center; width:10%;">رقم بقاعدة البيانات</th>
                                    <th style="text-align:center; width:20%;">الاسم</th>
                                    <th style="text-align:center; width:20%;">الوصف</th>
                                    <th style="text-align:center; width:20%;">صورة</th>
                                    <th style="text-align:center; width:10%;">ترتيب</th>
                                    <th style="text-align:center; width:10%;">تعديل</th>
                                    <th style="text-align:center; width:10%;">حذف</th>
                                </tr>
                            </thead>

                                    {{-- 'name', 'title', 'telephone','fax','thumbnail_image','order' --}}

                            <tbody>
                                @foreach ($TrafficControls as $TrafficControl)
                                <tr>
                                    <td>{{$TrafficControl->id}}</td>
                                    <td>{{$TrafficControl->title}}</td>
                                    <td>{{$TrafficControl->description}}</td>
                                    <td>
                                    <img src="{{ asset('storage/'.$TrafficControl->image) }}" alt="" style="max-height:200px;">

                                    </td>

                                    <td>{{$TrafficControl->order}}</td>

                                    <td><a href="{{route('admin.traffic_control.edit', $TrafficControl->id)}}" class="btn btn-warning ">تعديل</a></td>
                                    <td>
                                        <form action="{{route('admin.traffic_control.destroy', $TrafficControl->id)}}" method="post">
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

