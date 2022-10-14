@extends ('layouts.app')

@section('title','About Us')

@section('content')

<div class="bg-light">
  <div class="container">
    <div class="row">
        <h4 class="mb-4 p-3">About Us</h4>
      </div>

      <img class="logoPic" src="{{ URL::to('/assets/img/IMG_5912.PNG') }}" alt="logo">
      <br>
      <div class="about-text">
          <p>Haruharu_dbd was created by a young entrepreneur who got bored of the market's supply of standard nails.
            She wants to provide the newest, highest-quality press-on nails available on the market to fashion enthusiasts like you 
            at the most competitive price. Exodus press-on nails remove the concern about the time and effort commitment required for 
            lengthy nails. As a result, we provide adhesive tabs as well as glue, which may be used, removed, and applied again. 
            With our press-on nails, you may achieve your nail goals and get a flawless manicure in only a few minutes. Nothing more 
            than wishing that every woman would gain their confidence while using Haruharu dbd</p>
      </div>
      <br>
      <br>


    <footer>
      <p>@Haruharu_dbd</p>
    </footer>


    </div>
</div>


@endsection