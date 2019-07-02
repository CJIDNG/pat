@php
    $relatedStories = App\Story::inRandomOrder()->whereNotIn('id', [$story->id])->where('status_id', '3')->offset(0)->limit(3)->get();
@endphp

@for ($i = 0; $i < count($relatedStories); $i++)
    @php
        $relatedStory = $relatedStories[$i];

        $description = $relatedStory->story;
          $len = strLen($description);
          
          if($len > 100){
            $description = substr($relatedStory->story, 0, 100).'...' ;
          }
    @endphp
<div class="col-md-4">
    <div class="card card-blog">
        <div class="card-header card-header-image">
        <a href="{{ route('story', [$relatedStory->id]) }}">
            <img class="img img-raised" src="{{ asset('storage/'.$relatedStory->thumbnail) }}">
        </a>
        </div>
        <div class="card-body">
        <h4 class="card-title">
            <a href="{{ route('story', [$relatedStory->id]) }}">{{ $relatedStory->title }}</a>
        </h4>
        <p class="card-description">
            {!! $description !!}
            <br>
            <a class="text-info" href="{{ route('story', [$relatedStory->id]) }}"> Read More </a>
        </p>
        </div>
    </div>
</div>
@endfor