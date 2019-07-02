@php
    $date = \Carbon\Carbon::today()->subDays(30);
    $report = App\Report::where('created_at', '>=', $date)->orderBy('views','desc')->first();
    $story = App\Story::orderBy('views','desc')->latest()->first();
    $users = App\User::withCount('stories')->orderBY('stories_count', 'desc')->get();
    // $featuredJ = App\User::withCount('stories')->whereHas('stories', function ($query) {
    // $query->count('views');
// })->get();

$featured = 0;
foreach ($users as $user) {
  $views = App\Story::where('user_id', $user->id)->sum('views');
  $storyCount = $user->stories_count;

  
  //add weights for views and # of stories
  $total = ($views * 0.1) + ($storyCount * 5) ;

  

  if($total > $featured){
    $featured = $total;
    $id = $user->id;
    $count = $storyCount;
  }

}
  $featuredJ = App\User::where('id', $id)->first();




    $storyDesc = $story->story;
          $len = strLen($storyDesc);
          
          if($len > 100){
            $storyDesc = substr($story->story, 0, 100).'...' ;
          }

    $reportDesc = $report->description;
      $len = strLen($reportDesc);
      
      if($len > 100){
        $reportDesc = substr($report->description, 0, 100).'...' ;
      }

      if($report->status_id == 4) {
        $statusColor = 'badge-danger';
    } else if($report->status_id == 5) {
        $statusColor = 'badge-success';
    }

@endphp

        <ul class="timeline timeline-simple">
          <li class="timeline-inverted">
            <div class="timeline-badge primary">
              <i class="material-icons">description</i>
            </div>
            <div class="timeline-panel">
              
              <div class="timeline-heading">
                <span class="badge badge-primary pull-left">Trending Report</span>
                <label class="badge {{ $statusColor }} pull-right">
                    {{ App\Status::select('name')->where('id', $report->status_id)->first()->name }}
                </label>
              </div>
              <br>
              <div class="timeline-body">
                  <h4 class="card-title text-center"><b>{{ $report->title }} </b></h4>
              <p>{!! $reportDesc !!}</p>
              <br>
              <b>Victim:</b> {{ $report->victim }}, 
              <b>Assailant:</b> {{ $report->assailant }}

              <hr>
              <h6 class="pull-left">
                  <i class="ti-time"></i> {{ $report->views }} views
                </h6>
              <div class="dropdown pull-right">
                  <button type="button" class="btn btn-round btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    <li>
                      <a href="{{ route('showReport', ['id'=>$report->id]) }}">View</a>
                    </li>
                    <li>
                      @can('update', $report)
                      <a href="{{ route('admin/report/edit', ['id'=>$report->id]) }}">Edit</a>
                      @endcan
                    </li>
                  </ul>
                </div>
              </div>
              
            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-badge info">
              <i class="material-icons">insert_comment</i>
            </div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                  <span class="badge badge-info pull-left">Trending Story</span>
                </div>
                <br>
              <div class="timeline-body">
                <h4 class="card-title"><b>{{ $story->title }} </b></h4>
                <p>{!! $storyDesc !!}</p>
                <hr>
                <h6 class="pull-left">
                    <i class="ti-time"></i> {{ $story->views }} views
                </h6>
                <div class="dropdown pull-right">
                    <button type="button" class="btn btn-round btn-info dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                      <li>
                        <a href="{{ route('showReport', ['id'=>$report->id]) }}">View</a>
                      </li>
                      <li>
                        @can('update', $report)
                        <a href="{{ route('admin/report/edit', ['id'=>$report->id]) }}">Edit</a>
                        @endcan
                      </li>
                    </ul>
                  </div>
              </div>
            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-badge danger">
              <i class="material-icons">face</i>
            </div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <span class="badge badge-danger">Trending Journalist</span>
              </div>
              <div class="timeline-body">
                  <h4 class="card-title"><b>{{ $featuredJ->name }} </b></h4> 
                  <hr>
                  <h6 class="pull-left">
                  {{ $count }} total stories
                  </h6>
              </div>
            </div>
          </li>
        </ul>