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
                    مناقصات ومزايدات
                    <small>
                        <a href="{{route('admin.auctions.create')}}" class="btn btn-success btn-xs">أضافة</a>
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
                                    <th style="text-align:center; width:15%;">أسم المناقصة</th>
                                    <th style="text-align:center; width:15%;">رقم المناقصة</th>
                                    <th style="text-align:center; width:15%;">تاريخ الانتهاء</th>
                                    <th style="text-align:center; width:20%;">الملف</th>
                                    <th style="text-align:center; width:20%;">سعر كراسة الشروط</th>
                                    <th style="text-align:center; width:20%;">التأمين الابتدائى</th>
                                    <th style="text-align:center; width:20%;">التفاصيل</th>
                                    <th style="text-align:center; width:5%;">تعديل</th>
                                    <th style="text-align:center; width:5%;">حذف</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($TendersAndAuctions as $TendersAndAuction)
                                <tr>
                                    <td>{{$TendersAndAuction->id}}</td>
                                    <td>{{$TendersAndAuction->name}}</td>
                                    <td>{{$TendersAndAuction->number}}</td>
                                    <td>{{$TendersAndAuction->end_date}}</td>
                                    <td>
                                        <a href="{{$TendersAndAuction->FullPathFile}}" target="_blank">الملف</a>
                                    </td>
                                    <td>{{$TendersAndAuction->price}}</td>
                                    <td>{{$TendersAndAuction->primary_insurance}}</td>
                                    <td>{{$TendersAndAuction->description}}</td>
                                    
                                    <td><a href="{{route('admin.auctions.edit', $TendersAndAuction->id)}}" class="btn btn-warning ">تعديل</a></td>
                                    <td>
                                        <form action="{{route('admin.auctions.destroy', $TendersAndAuction->id)}}" method="post">
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

