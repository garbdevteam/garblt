@extends('frontend.layout.main')

@section('content')
<section class="contact-page">

    <div class="container">
      
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissable fade show" role="alert">
                  <strong>{{session()->get('success')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif
     
        <h2 class="heading">قم بمراسلتنا</h2>
        <div class="contact-form">
            <form action="{{ route('frontend.store.contact-us')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label for="name">الإسم</label>
                            <input type="text" placeholder="أدخل إسمك" class="form-control form-control-lg" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" placeholder="ادخل بريدك الإلكتروني" class="form-control form-control-lg" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="phone">رقم الموبايل</label>
                            <input type="tel" placeholder="ادخل رقم موبايلك" class="form-control form-control-lg" id="phone" name="phone">
                        </div>

                    </div>
                    <div class="col-12 col-md-7">
                        <div class="form-group">
                            <label for="message">الرسالة</label>
                            <textarea id="message" placeholder="ضع رسالتك هنا" rows="8" class="form-control form-control-lg" name="message"></textarea>
                          </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="send-btn">
                      <button class="btn">أرسل الرسالة</button>
                  </div>
                  </div>
                </div>
            </form>
        </div>
    </div>

</section>


@endsection
