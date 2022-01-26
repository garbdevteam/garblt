
@extends('layouts.mainLayout')

@section('main')
<style>
    .form-group {
        margin-bottom: 20px !important;
    }

    td {
        font-size: 18px;
    }

</style>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    الخطابات الصادرة
                    <small>
                        <a href="{{route('incoming.edit', $IssuedLetter->id)}}" class="btn btn-warning btn-xs">تعديل</a>
                        <form action="{{route('incoming.destroy', $IssuedLetter->id)}}" method="post"
                            style="display:inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-xs">حذف</button>
                        </form>

                    </small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>

        @if ($errors->any())
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <strong>{{$error}}</strong>
                        </div>
                        @endforeach
                        <br />
                    </div>
                </div>
            </div>
        </div>

        @endif
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>المعلومات الرئيسية</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <table id="datatable-list" class="table table-striped table-bordered">
                            <tr>
                                <td style="width:20%">رقم تعريفي</td>
                                <td>{{ $IssuedLetter->id }}</td>
                            </tr>
                            <tr>
                                <td style="width:20%">رقم الخطاب</td>
                                <td>{{ $IssuedLetter->LetterNumber }}</td>
                            </tr>
                            <tr>
                                <td style="width:20%">تاريخ الخطاب</td>
                                <td>{{ $IssuedLetter->LetterDate }}</td>
                            </tr>
                            <tr>
                                <td style="width:20%">تاريخ المتابعة</td>
                                <td>{{ $IssuedLetter->FollowDate }}</td>
                            </tr>
                            <tr>
                                <td style="width:20%">المختص</td>
                                <td>{{ $IssuedLetter->ResponsibleBy }}</td>
                            </tr>
                            <tr>
                                <td style="width:20%">الموضوع</td>
                                <td>{{ $IssuedLetter->LetterSubject }}</td>
                            </tr>
                            <tr>
                                <td style="width:20%">محتوي الخطاب</td>
                                <td>{{ $IssuedLetter->LetterContent }}</td>
                            </tr>
                            <tr>
                                <td style="width:20%">قرار رئيس الهيئة</td>
                                <td>{{ $IssuedLetter->PresdenitDecision }}</td>
                            </tr>
                            <tr>
                                <td style="width:20%">رأي نائب رئيس الهيئة</td>
                                <td>{{ $IssuedLetter->VPOpinion }}</td>
                            </tr>
                            <tr>
                                <td style="width:20%">هل تم اتخاذ اجراء</td>
                                <td>{{$IssuedLetter->ActionTakenBoolean == 1 ? 'نعم' : 'لا'}}</td>
                            </tr>
                            <tr>
                                <td style="width:20%">الاجراءات المتخذة</td>
                                <td>{{ $IssuedLetter->ActionsTakenText }}</td>
                            </tr>
                            <tr>
                                <td style="width:20%">عرض الخطاب</td>
                                <td>{{ $IssuedLetter->LetterPresenting }}</td>
                            </tr>
                            <tr>
                                <td style="width:20%">الارتباط بخطاب صادر</td>
                                <td>{{$IssuedLetter->RelateWithOutbound == 1 ? 'نعم' : 'لا'}}</td>
                            </tr>
                            <tr>
                                <td style="width:20%">عرض الخطابات الصادرة المرتبطة</td>
                                <td>{{ $IssuedLetter->LetterOutboundPresenting }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>الملفات</h2>

                        <div class="clearfix"></div>
                         </div>

                    <div class="x_content">
                        <table id="datatable-list" class="table table-striped table-bordered">
                            <tr>
                                <td style="width:150px">رقم تعريف الملف</td>
                                <td>اسم الملف</td>
                                <td style="width:100px; text-align:center;">عرض</td>
                            </tr>
                            @foreach ($IssuedLettersFiles as $IssuedLettersFile)
                            <tr>
                                <td>{{$IssuedLettersFile->id}}</td>
                                <td style="direction:ltr; text-align:right;">{{$IssuedLettersFile->ShortFileName}}</td>
                                <td style="width:100px; text-align:center;"><a href="{{route('files.incoming_letters',$IssuedLettersFile->id )}}" target="_blank" class="btn btn-primary">عرض</a>
                                </td>
                            </tr>

                            @endforeach
                        </table>

                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
<!-- /page content -->
@endsection

@section('js')
<script>
    $('.select2box').select2();
    $('.select2box2').select2();

</script>

@endsection
