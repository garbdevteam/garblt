@extends('backend.layout.mainLayout')

@section('main')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>تعديل وظيفة</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        @if ($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <strong>{{$error}}</strong>
                        </div>
                        @endforeach
                        @endif

                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            action="{{route('admin.auctions.update', $TendersAndAuction->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    أسم المناقصة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" value="{{ $TendersAndAuction->name }}"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    رقم المناقصة
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="number" value="{{ $TendersAndAuction->number }}"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    تاريخ الانتهاء
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="end_date[day]" placeholder="يوم"
                                    value="{{$TendersAndAuction->end_date ? date('d', strtotime($TendersAndAuction->end_date)) : ''}}" class=" col-md-3">
                                    <input type="number" name="end_date[month]" placeholder="شهر"
                                    value="{{$TendersAndAuction->end_date ? date('m', strtotime($TendersAndAuction->end_date)) : ''}}" class=" col-md-3">
                                    <input type="number" name="end_date[year]" placeholder="سنة"
                                    value="{{$TendersAndAuction->end_date ? date('Y', strtotime($TendersAndAuction->end_date)) : ''}}" class=" col-md-3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    الملف
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" name="auction_file"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    سعر كراسة الشروط                               
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="price"  value="{{ $TendersAndAuction->price }}"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    التأمين الابتدائى                               
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="primary_insurance"  value="{{ $TendersAndAuction->primary_insurance}}"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                  التفاصيل                               
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea name="description"  value="{{ $TendersAndAuction->description}}"
                                        class="form-control col-md-7 col-xs-12">{{ $TendersAndAuction->description}}</textarea>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                    <a href="{{route('admin.auctions.index')}}" class="btn btn-primary btn-sm">رجوع</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


@endsection

@section('js')
@endsection
