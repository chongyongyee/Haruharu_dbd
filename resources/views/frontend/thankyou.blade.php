@extends ('layouts.app')

@section('title', 'Thank You for Shopping')

@section('content')

  <div class="py-3 md-4 pt-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
              @if(session('message'))
                <h5 class="alert alert-success">{{ session('message' )}}</h5>
              @endif

                <div class="p-4 shadow bg-white">
                    <img src="{{ URL::to('/assets/img/IMG_5912.PNG') }}" alt="logo" width="250px" height="250px">
                    <h4>Thank You for Shopping with Haruharu_dbd</h4>
                    <a href="{{ url('collections') }}" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
  </div>
  
      
@endsection