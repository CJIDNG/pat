<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">description</i>
                </div>
                <p class="card-category">Report</p>
                <h3 class="card-title">
                    {{ substr(App\Report::select('title')->where('id', $story->report_id)->first()->title, 0, 30) }}
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">create</i>
                    Related Report
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">equalizer</i>
                </div>
                <p class="card-category">Views</p>
                <h3 class="card-title">{{ $story->views }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">local_offer</i> 
                    Tracked natively
                </div>
            </div>
        </div>
    </div>
</div>