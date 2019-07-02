@php
    $relatedStories = App\Story::inRandomOrder()->offset(0)->limit(3)->get();
@endphp

<h3 class="title">Related Posts</h3>

<div class="row">
    @for ($i = 0; $i < count($relatedStories); $i++)
    @php
        $relatedStory = $relatedStories[$i];
    @endphp
    <div class="col-md-4">
        <div class="card card-product" data-count="15">
            <div class="card-header card-header-image" data-header-animation="true">
                <a href="#pablo">
                    <img class="img" src="{{ asset('storage/'.$relatedStory->thumbnail) }}">
                </a>
            </div>
            <div class="card-body">
                <div class="card-actions text-center">
                    <button type="button" class="btn btn-danger btn-link fix-broken-card">
                        <i class="material-icons">build</i> Fix Header!
                    </button>
                    <button type="button" class="btn btn-default btn-link" rel="tooltip" 
                        data-placement="bottom" title="" data-original-title="View">
                        <i class="material-icons">art_track</i>
                    </button>
                    <button type="button" class="btn btn-success btn-link" rel="tooltip" 
                        data-placement="bottom" title="" data-original-title="Edit">
                        <i class="material-icons">edit</i>
                    </button>
                    <button type="button" class="btn btn-danger btn-link" rel="tooltip" 
                        data-placement="bottom" title="" data-original-title="Remove">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <h4 class="card-title">
                    <a href="#pablo">
                        {{ $relatedStory->title }}
                    </a>
                </h4>
            </div>
            <div class="card-footer">
                <div class="price">
                    <h4>$899/night</h4>
                </div>
                <div class="stats">
                    <p class="card-category">
                        <i class="material-icons">place</i> 
                        Barcelona, Spain
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endfor
</div>