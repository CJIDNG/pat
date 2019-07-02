<div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">
                    {{ $story->views }}
                </h3>
            </div>
            <div class="card-description mx-3">
                <h4 class="card-category card-category-social text-info">
                    <i class="material-icons">equalizer</i> Views
                </h4>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">
                    {{ App\ReportType::select('name')->where('id', $story->report->report_type_id)->first()->name }}
                </h3>
            </div>
            <div class="card-description mx-3">
                <h4 class="card-category card-category-social text-primary">
                    <i class="material-icons">description</i> Related Report Type
                </h4>
            </div>
        </div>
    </div>
       