@extends('frontend.layout.main')

@section('content')
<section class="faq-page">
    <div class="container">
        <h2 class="heading">الأسئلة الشائعة</h2>

        <div class="accordion" id="accordionExample">
            <div class="question">
              <div class="head" id="headingOne">
                <!-- <h2 class="mb-0"> -->
                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <span>ماهي مشاريع الهيئة العامة للطرق والكباري</span>
                    <img src="{{ url('frontend\images\icons/dropdown.svg')}}" alt="">
                  </button>
                <!-- </h2> -->
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="content">
                    توضع هنا اجابة السؤال وقد تتكون من سطرين او اكثر. توضع هنا اجابة السؤال وقد تتكون من سطرين او اكثر.توضع هنا اجابة السؤال وقد تتكون من سطرين او اكثر.توضع هنا اجابة السؤال وقد تتكون من سطرين او اكثر.
                </div>
              </div>
            </div>
            <div class="question">
              <div class="head" id="headingTwo">
                <!-- <h2 class="mb-0"> -->
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span>ماهي مشاريع الهيئة العامة للطرق والكباري</span>
                    <img src="{{ url('frontend\images\icons/dropdown.svg')}}" alt="">
                  </button>
                <!-- </h2> -->
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="content">
                    توضع هنا اجابة السؤال وقد تتكون من سطرين او اكثر. توضع هنا اجابة السؤال وقد تتكون من سطرين او اكثر.توضع هنا اجابة السؤال وقد تتكون من سطرين او اكثر.توضع هنا اجابة السؤال وقد تتكون من سطرين او اكثر.
                </div>
              </div>
            </div>
            <div class="question">
              <div class="head" id="headingThree">
                <!-- <h2 class="mb-0"> -->
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <span>ماهي مشاريع الهيئة العامة للطرق والكباري</span>
                    <img src="{{ url('frontend\images\icons/dropdown.svg')}}"  alt="">
                  </button>
                <!-- </h2> -->
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="content">
                    توضع هنا اجابة السؤال وقد تتكون من سطرين او اكثر. توضع هنا اجابة السؤال وقد تتكون من سطرين او اكثر.توضع هنا اجابة السؤال وقد تتكون من سطرين او اكثر.توضع هنا اجابة السؤال وقد تتكون من سطرين او اكثر.
                </div>
              </div>
            </div>
          </div>

    </div>
</section>


@endsection
