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
                    خدمات
                    <small>
                        <a href="{{route('admin.services.create')}}" class="btn btn-success btn-xs">أضافة</a>
                        <a href="{{route('admin.services.order')}}" class="btn btn-primary btn-xs">ترتيب</a>
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
                                    <th style="text-align:center; width:15%;">أسم صفحة الخدمات</th>
                                    <th style="text-align:center; width:15%;">صوره الخدمه</th>
                                    <th style="text-align:center; width:15%;">صفحة الملفات</th>
                                    <th style="text-align:center; width:5%;">تعديل</th>
                                    <th style="text-align:center; width:5%;">حذف</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($Services as $Service)
                                <tr>
                                    <td>{{$Service->id}}</td>
                                    <td>{{$Service->services_name}}</td>
                                    <td>
                                        <img src="{{ asset('storage/'.$Service->service_image) }}" alt="" style="max-height:200px;">
                                    </td>
                                    <td><a href="{{route('admin.service_file.index', $Service->id)}}" class="btn btn-primary ">الملفات</a></td>

                                    <td><a href="{{route('admin.services.edit', $Service->id)}}" class="btn btn-warning ">تعديل</a></td>
                                    <td>
                                        <form action="{{route('admin.services.destroy', $Service->id)}}" method="post">
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

