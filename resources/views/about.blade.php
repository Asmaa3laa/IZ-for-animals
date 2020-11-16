@extends('layouts.index')
@section('content')
@section('title')
| About
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
        <p class="centered h2" style="background: rgba(255, 255, 255, 0.5);color:navy;font-weight:bold;">All About Animal helping veterinarians to create thier online clinic</p>
      </div>
    </div>
    <div class="carousel-item" style="height:100%;width:100%;">
      <img class="d-block w-100" style="max-width: 100%;height: 100%;display: block;" src="{{url('images/bg_1.jpg')}}" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <p class="centered h2"style="background: rgba(255, 255, 255, 0.5);color:navy;font-weight:bold;">All About Animal is your way to take better care of animal health</p>
      </div>
    </div>
  </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
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
              <h2 class="mb-4">Why Choose Us?</h2>
                  </div>
                  <div class="row">
                      <div class="col-md-6 services-2 w-100 d-flex">
                          <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lightbulb-o"></span></div>
                          <div class="text pl-3">
                              <h4>OUR VISION</h4>
                              <p>Discuss topics related to animal health and facilitate access to the nearest veterinary clinic to speed up your animal rescue.</p>
                          </div>
                      </div>
                      <div class="col-md-6 services-2 w-100 d-flex">
                          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-mission-1"></span></div>
                          <div class="text pl-3">
                              <h4>OUR MISSION</h4>
                              <p>Providing assistance to the veterinarian and helping him establish and market his clinic.Helping to maintain the health of your animal from diseases and easy access to the nearest veterinarian.</p>
                          </div>
                      </div>
                      <div class="col-md-6 services-2 w-100 d-flex">
                          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-value"></span></div>
                          <div class="text pl-3">
                              <h4>OUR VALUES</h4>
                              <p>As we care about animal health in the first place, we are guided by compassion, determination and effectiveness. Based on these values and principles, we will work to provide the necessary care for your animal.</p>
                          </div>
                      </div>
                      <div class="col-md-6 services-2 w-100 d-flex">
                          <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                          <div class="text pl-3">
                              <h4>OUR COMMITMENTS</h4>
                              <p>We are committed to saving the largest number of animals possible by raising issues related to the general health of the animal and also by facilitating communication with the appropriate veterinarian.</p>
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
                  <p class="mb-4">It is a site with the largest number of veterinary clinics, through which you can search for the closest clinic to your place of residence</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">It is a mediator between the veterinarian and the educator</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">It is a site that allows veterinarians to advertise their clinic for free</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">Veterinarians are allowed to post their science articles and link these articles to the doctor's office for easy communication with the jam</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">It is a site concerned with animal science and contains articles and research of interest to the veterinarian and educator</p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap py-4">
                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                <div class="text">
                  <p class="mb-4">It allows the veterinarian to easily diagnose diseases through this free diagnostic program
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection