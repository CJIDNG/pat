@php
$stories = App\Story::select()->where([
  ['report_id', $report->id],
  ['status_id', '3'],
  ])->get();
@endphp
<div class="row">
@for ($i = 0; $i < count($stories); $i++)

@php
    $story = $stories[$i];
    $description = $story->story;
          $len = strLen($description);
          
          if($len > 100){
            $description = substr($story->story, 0, 100).'...' ;
          }
@endphp

<div class="col-lg-3 col-sm-4">
  <div class="card card-blog">
    <div class="card-header card-header-image">
      <a href="{{ route('story', ['id' => $story->id]) }}">
          <img class="card-img-top" 
          src="{{ asset('storage/'.$story->thumbnail) }}" alt="card image cap">
      </a>
      <div class="colored-shadow" style="background-image: url( {{ asset('/img/examples/color3.jpg') }} ); opacity: 1;"></div>
    </div>
    <div class="card-body">
      <h4 class="card-title">
        <a href="{{ route('story', ['id' => $story->id]) }}">{{ $story->title }}</a>
      </h4>
      <p class="card-description">
        {!! $description !!}
        <br>
        <a class="text-info" href="{{ route('story', ['id' => $story->id]) }}"> <b>Read More </b></a>
      </p>
    </div>
  </div>
</div>
@endfor
</div>