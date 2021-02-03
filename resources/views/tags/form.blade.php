  {{--  <label for="name">Name</label>
     <input type="text" name="name" placeholder="name" value="{{ old('name') ?? $tag->name}}" class="form-control">
 --}}
 <div class="row">
    <div class="col-12">
       <div class="form-group">
           <label for="name:en">@lang('trans.tags.name_in_english')</label>
           <input type="text" class="form-control  @error('name:en') is-invalid @enderror" name="name:en" value="{{ old('name:en') }}">
           @error('name:en')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
       </div>
    </div>
</div>

<div class="row">
  <div class="col-12">
     <div class="form-group">
         <label for="name:ar">@lang('trans.tags.name_in_arabic')</label>
         <input type="text" class="form-control @error('name:ar') is-invalid @enderror" name="name:ar" value="{{ old('name:ar') }}">

         @error('name:ar')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
     </div>
  </div>
</div>
@csrf