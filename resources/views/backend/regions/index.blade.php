{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body dir="rtl">
    <table border="1">
        <thead>
            <tr>
            </tr>
        </thead>
        <tbody>
            @foreach ($Regions as $Region)
            <tr>
                <th><a href="{{route('admin.regions.edit', $Region->id)}}">تعديل</a></th>
<th>
    <form action="{{route('admin.regions.destroy', $Region->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit">حذف</button>
    </form>
</th>
</tr>

@endforeach
</tbody>
</table>
</body>

</html> --}}
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
                    المناطق
                    <small>
                        <a href="{{route('admin.regions.create')}}" class="btn btn-success btn-xs">أضافة</a>
                        <a href="{{route('admin.regions.order')}}" class="btn btn-primary btn-xs">ترتيب</a>
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
                                    <th style="text-align:center; width:25%;">أسم المنطقة</th>
                                    <th style="text-align:center; width:25%;">أسم قائد المنطقة</th>
                                    <th style="text-align:center; width:15%;">رقم الهاتف</th>
                                    <th style="text-align:center; width:15%;">رقم الفاكس</th>
                                    <th style="text-align:center; width:5%;">الترتيب</th>

                                    <th style="text-align:center; width:5%;">مشروعات الطرق</th>
                                    <th style="text-align:center; width:5%;">مشروعات الكباري</th>
                                    <th style="text-align:center; width:5%;">تعديل</th>
                                    <th style="text-align:center; width:5%;">حذف</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($Regions as $Region)
                                <tr>
                                    <td>{{$Region->id}}</td>
                                    <td>{{$Region->name}}</td>
                                    <td>{{$Region->chief_name}}</td>
                                    <td>{{$Region->telephone}}</td>
                                    <td>{{$Region->fax}}</td>
                                    <td>{{$Region->order}}</td>
                                    <td style="text-align:center; width:10%;"><a
                                        href="{{route('admin.regions_roads.index', $Region->id)}}"
                                        class="btn btn-primary ">مشروعات الطرق</a></td>
                                    <td style="text-align:center; width:10%;"><a
                                            href="{{route('admin.regions_bridges.index', $Region->id)}}"
                                            class="btn btn-primary ">مشروعات الكباري</a></td>
                                            <td style="text-align:center; width:10%;"><a
                                                href="{{route('admin.regions.edit', $Region->id)}}"
                                                class="btn btn-warning ">تعديل</a></td>
                                    <td style="text-align:center; width:10%;">
                                        <form action="{{route('admin.regions.destroy', $Region->id)}}" method="post"
                                            style="display:inline;">
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
