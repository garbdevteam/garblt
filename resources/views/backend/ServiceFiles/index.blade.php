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
                    ملفات صفحة الخدمة
                    <small>
                        <a href="{{route('admin.service_file.create', $service_id)}}" class="btn btn-success btn-xs">أضافة</a>
                        <a href="{{route('admin.service_file.order', $service_id)}}" class="btn btn-primary btn-xs">ترتيب</a>
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
                                    <th style="text-align:center; width:15%;">أسم الملف</th>
                                    <th style="text-align:center; width:15%;">صفحة الخدمة</th>
                                    <th style="text-align:center; width:15%;">الملف</th>
                                    <th style="text-align:center; width:5%;">حذف</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($ServiceFile as $ServiceFile)
                                <tr>
                                    <td>{{$ServiceFile->id}}</td>
                                    <td>{{$ServiceFile->services_name}}</td>

                                    <td><a href="{{route('admin.service_file.edit', [$service_id, $ServiceFile->id])}}" class="btn btn-warning ">تعديل</a></td>
                                    <td>
                                        <form action="{{route('admin.service_file.destroy', [$service_id, $ServiceFile->id])}}" method="post">
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

