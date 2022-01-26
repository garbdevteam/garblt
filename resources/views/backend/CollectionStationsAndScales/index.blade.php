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
                    محطات التحصيل والموازين
                    <small>
                        <a href="{{route('admin.collection_stations_and_scales.create')}}" class="btn btn-success btn-xs">أضافة</a>
                        <a href="{{route('admin.collection_stations_and_scales.order')}}" class="btn btn-primary btn-xs">ترتيب</a>
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
                                    <th style="text-align:center; width:20%;">الاسم</th>
                                    <th style="text-align:center; width:20%;">الموقع</th>
                                    <th style="text-align:center; width:20%;">الاشتراك</th>
                                    <th style="text-align:center; width:20%;">التعريفة</th>
                                    <th style="text-align:center; width:5%;">الترتيب</th>
                                    <th style="text-align:center; width:5%;">تعديل</th>
                                    <th style="text-align:center; width:5%;">حذف</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($CollectionStationsAndScales as $CollectionStationsAndScale)
                                <tr>
                                    <td>{{$CollectionStationsAndScale->id}}</td>
                                    <td>{{$CollectionStationsAndScale->title}}</td>
                                    <td>{{$CollectionStationsAndScale->location}}</td>
                                    <td>{{$CollectionStationsAndScale->subscription}}</td>
                                    <td>{{$CollectionStationsAndScale->tariff}}</td>

                                    <td>{{$CollectionStationsAndScale->order}}</td>

                                    <td><a href="{{route('admin.collection_stations_and_scales.edit', $CollectionStationsAndScale->id)}}" class="btn btn-warning ">تعديل</a></td>
                                    <td>
                                        <form action="{{route('admin.collection_stations_and_scales.destroy', $CollectionStationsAndScale->id)}}" method="post">
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

