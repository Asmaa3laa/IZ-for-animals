    @foreach($clinics as $clinic)
    <div class="col-md-6 col-lg-4  ftco-animate fadeInUp ftco-animated">
      <div class="blog-entry">
        <a href="{{ route('clinic.show',$clinic->id) }}" class="block-20  rounded" ><img class="mx-auto d-block mt-3" style="height:100%" 
          src="{{asset ('storage/'.$clinic->image)}}"/>
        </a>
        <div class="text p-4">
            <div class="meta mb-2">
            <div><a class="h6" href="{{ route('clinic.show',$clinic->id) }}">{{$clinic->user_name}}</a></div>
            <p>{{$clinic->address}}</p>
            <p>{{$clinic->state->name}}</p>
            <p>{{$clinic->country->name}}</p>
            <div><span class="fa fa-phone"></span>  {{$clinic->phone}}</div>
          </div>
          <a class="btn-link" href="{{$clinic->location}}"><i class="fa fa-map-marker"></i>@lang('trans.users.location')</a></h6>
        </div>
      </div>
      </div>
    </div>
    @endforeach
