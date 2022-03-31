@extends('frontlayout'); 
@section('content')
      
      {{-- Silder --}}
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          @foreach ($banner as $index=>$banners)
          <div class="carousel-item @if($index==0) active @endif">
            <img src="{{Storage::url($banners->banner_src)}}" class="d-block w-100" alt="{{$banners->alt_text}}">
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      {{-- End Silder --}}
      {{-- Start Service section --}}
      <div class="container my-3">
        <h1 class="text-center border-bottom">Services</h1>
        @foreach ($service as $services)
        <div class="row mt-4">
          <div class="col-md-3">
            <a href="{{url('service/'.$services->id.'')}}"><img src="{{Storage::url($services->photo)}}" class="img-thumbnail" style="width:100%"></a>
          </div>
          <div class="col-md-9">
            <h3>{{$services->title}}</h3>
            <p>{{$services->small_desc}}</p>
            <p>
              <a href="{{url('service/'.$services->id.'')}}" class="btn btn-sm btn-primary">Read more</a>
            </p>
          </div>
        </div>
        @endforeach
      </div>
      {{-- End Service section --}}
      {{-- start Gallery section --}}
      <div class="container my-4">
        <h1 class="text-center border-bottom">Gallery</h1>
        <div class="row my-4">
          @foreach ($roomtype as $rtimg)
          <div class="col-md-3">
            <div class="card">
              <h5 class="card-header">{{$rtimg->title}}</h5>
              <div class="card-body">
                <p class="card-title">
                  @foreach ($rtimg->roomtypeimgs as $index => $img)
                    <a href="{{Storage::url($img->img_scr)}}" data-lightbox="rgallery {{$rtimg->id}}">
                      @if($index > 0)
                      <img class="img-fluid hide" src="{{Storage::url($img->img_scr)}}" />
                      @else
                      <img class="img-fluid" src="{{Storage::url($img->img_scr)}}" />
                      @endif
                    </a>                      
                  @endforeach
                </p>
              </div>
            </div>
          </div>
          @endforeach            
        </div>
      </div>  
      {{-- End Gallery section --}}
      <h1 class="text-center mt-4 border-bottom">Testimonials</h1>
      <div id="testimonials" class="carousel slide bg-dark text-white mb-5 p-5 border" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          @foreach ($testimonial as $index=>$testi)
          <div class="carousel-item @if($index==0) active @endif">
            <figure class="text-center">
              <blockquote class="blockquote">
                <p>{{$testi->testi_cont}}</p>
              </blockquote>
              <figcaption class="blockquote-footer text-white">
                {{$testi->customer->name}}
              </figcaption>
            </figure>
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonials" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonials" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
<!-- LightBox css -->
<link rel="stylesheet" type="text/css" href="{{asset('../vendor')}}/lightbox2-2.11.3/dist/css/lightbox.min.css" />
<!-- LightBox Js -->
<script type="text/javascript" src="{{asset('../vendor')}}/lightbox2-2.11.3/dist/js/lightbox.min.js"></script>
<style type="text/css">
	.hide{
		display: none;
	}
</style>
@endsection
