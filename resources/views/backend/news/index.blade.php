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
                    الاخبار
                    <small>
                        <a href="{{route('admin.news.create')}}" class="btn btn-success btn-xs">أضافة</a>
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
                                    <th style="text-align:center; width:15%;">تاريخ الخبر</th>
                                    <th style="text-align:center; width:20%;">عنوان الخبر</th>
                                    <th style="text-align:center; width:40%;">موضوع الخبر</th>
                                    <th style="text-align:center; width:5%;">عرض</th>
                                    <th style="text-align:center; width:5%;">عرض بالموقع الرئيسي</th>
                                    <th style="text-align:center; width:5%;">تعديل</th>
                                    <th style="text-align:center; width:5%;">حذف</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($News as $New)
                                <tr>
                                    <td>{{$New->id}}</td>
                                    <td>{{$New->news_date}}</td>
                                    <td>{{$New->title}}</td>
                                    <td>{{$New->description}}</td>
                                    <td><a href="{{route('admin.news.show', $New->id)}}" class="btn btn-primary ">عرض</a></td>
                                    <td><a href="{{route('frontend.news.detail', $New->id)}}" class="btn btn-primary " target="_blank">عرض بالموقع الرئيسي</a></td>
                                    <td><a href="{{route('admin.news.edit', $New->id)}}" class="btn btn-warning ">تعديل</a></td>
                                    <td>
                                        <form action="{{route('admin.news.destroy', $New->id)}}" method="post">
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

