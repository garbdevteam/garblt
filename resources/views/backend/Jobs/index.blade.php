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
                    الوظائف
                    <small>
                        <a href="{{route('admin.jobs.create')}}" class="btn btn-success btn-xs">أضافة</a>
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
                                    <th style="text-align:center; width:15%;">تاريخ الانتهاء</th>
                                    <th style="text-align:center; width:15%;">الوصف</th>
                                    <th style="text-align:center; width:20%;">الملف</th>
                                    <th style="text-align:center; width:5%;">تعديل</th>
                                    <th style="text-align:center; width:5%;">حذف</th>
                                </tr>
                            </thead>

                            {{-- 'name', 'end_date', 'description', 'file' --}}

                            <tbody>
                                @foreach ($Jobses as $Job)
                                <tr>
                                    <td>{{$Job->id}}</td>
                                    <td>{{$Job->name}}</td>
                                    <td>{{$Job->end_date}}</td>
                                    <td>{{$Job->description}}</td>
                                    <td>
                                        <a href="{{$Job->FullPathFile}}" target="_blank">الملف</a>
                                    </td>

                                    <td><a href="{{route('admin.jobs.edit', $Job->id)}}" class="btn btn-warning ">تعديل</a></td>
                                    <td>
                                        <form action="{{route('admin.jobs.destroy', $Job->id)}}" method="post">
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

