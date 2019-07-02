<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">insert_comment</i>
                </div>
                <p class="card-category">R. Contents</p>
                <h3 class="card-title">{{ $report->stories()->count() }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">create</i>
                    Stories related to report
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">equalizer</i>
                </div>
                <p class="card-category">Views</p>
                <h3 class="card-title">{{ $report->views }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">local_offer</i> 
                    Tracked natively
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">folder_special</i>
                </div>
                <p class="card-category">Evidence</p>
                <h3 class="card-title">{{ $report->evidence()->count() }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">date_range</i> 
                    Files uploaded related to report
                </div>
            </div>
        </div>
    </div>
</div>