@php
    $date = \Carbon\Carbon::today()->subDays(7);
    $report = App\Report::with('status')->where([['created_at', '>=', $date], ['status_id', 4]])->count();
    $story = App\Story::with('status')->where([['created_at', '>=', $date], ['status_id', 2]])->count();

@endphp

<div class="row">
    <div class="col-lg-6">
        <div class="card text-center">
            <div class="card-header card-header-icon card-header-primary">
                <div class="card-text">
                    <h3 class="card-title"><b>{{ $report }}</b></h3>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Unverified Reports</h4>
                Since: {{ $date->format('d/m/Y') }}
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card text-center">
            <div class="card-header card-header-icon card-header-info">
                <div class="card-text">
                    <h3 class="card-title"><b>{{ $story }}</b></h3>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Unapproved Stories</h4>
                Since: {{ $date->format('d/m/Y') }}
            </div>
        </div>
    </div>
    
</div>