@extends('layouts.index')
@section('content')
@section('title')
| @lang('trans.home.about')
@endsection
<style>
  @media (max-width:768px) {
  div#doctorimg {
    display: none;
  }
}
</style>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:100%;height:400px;">
  <div class="carousel-inner" style="height:100%;width:100%;">
    <div class="carousel-item active"style="height:100%;width:100%;">
      <img class="d-block w-100" style="max-width: 100%;height: 100%;display: block;" src="{{url('images/main.jpg')}}" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <p class="centered h2" style="background: rgba(255, 255, 255, 0.5);color:navy;font-weight:bold;">@lang('trans.home.first_slide_sentance')</p>
      </div>
    </div>
    <div class="carousel-item" style="height:100%;width:100%;">
      <img class="d-block w-100" style="max-width: 100%;height: 100%;display: block;" src="{{url('images/bg_1.jpg')}}" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <p class="centered h2"style="background: rgba(255, 255, 255, 0.5);color:navy;font-weight:bold;">@lang('trans.home.second_slide_sentance')</p>
      </div>
    </div>
  </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">@lang('trans.previous')</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">@lang('trans.next')</span>
    </a>
</div>     
    <section class="ftco-section ftco-no-pt ftco-no-pb">
      <div class="container">
          <div class="row d-flex no-gutters">
              <div class="col-md-5 d-flex">
                  <div id="doctorimg" class="img img-video align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style=" width: 100%;
                  vertical-align: middle;
                  background-size: 100%;
                  background-position: 50% 50%;
                  background-repeat: no-repeat;background-image:url(images/image_why.jpg);">
                  </div>
              </div>
              <div class="col-md-7 pl-md-5 py-md-5">
                  <div class="heading-section pt-md-5">
              <h2 class="mb-4">@lang('trans.home.why_choose_us')</h2>
                  </div>
                  <div class="row">
                      <div class="col-md-6 services-2 w-100 d-flex">
                          <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lightbulb-o"></span></div>
                          <div class="text pl-3">
                              <h4>@lang('trans.home.vision')</h4>
                              <p>@lang('trans.home.vission_statment')</p>
                          </div>
                      </div>
                      <div class="col-md-6 services-2 w-100 d-flex">
                          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-mission-1"></span></div>
                          <div class="text pl-3">
                              <h4>@lang('trans.home.mission')</h4>
                              <p>@lang('trans.home.mission_statment')</p>
                          </div>
                      </div>
                      <div class="col-md-6 services-2 w-100 d-flex">
                          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-value"></span></div>
                          <div class="text pl-3">
                              <h4>@lang('trans.home.values')</h4>
                              <p>@lang('trans.home.values_statment')</p>
                          </div>
                      </div>
                      <div class="col-md-6 services-2 w-100 d-flex">
                          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                          <div class="text pl-3">
                              <h4>@lang('trans.home.commitments')</h4>
                              <p>@lang('trans.home.commitments_statment')</p>
                          </div>
                      </div>
                  </div>
          </div>
      </div>
      </div>
  </section>
  <section class="ftco-section testimony-section" style="background-image: url('images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center pb-5 mb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <h2>All About Animals</h2>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel ftco-owl">
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">@lang('trans.about.card1')</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">@lang('trans.about.card2')</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">@lang('trans.about.card3')</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">@lang('trans.about.card4')</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">@lang('trans.about.card5')</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">@lang('trans.about.card6')</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection