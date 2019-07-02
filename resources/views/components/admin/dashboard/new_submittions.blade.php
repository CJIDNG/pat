@php
    $date = \Carbon\Carbon::today()->subDays(7);
    $report = App\Report::where('created_at', '>=', $date)->count();
    $story = App\Story::where('created_at', '>=', $date)->count();

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
            <h4 class="card-title">New Reports</h4>
                    Since:  {{ $date->format('d/m/Y') }}
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
            <h4 class="card-title">New Stories</h4>
                    Since: {{ $date->format('d/m/Y') }}
            </div>
        </div>
    </div>
</div>