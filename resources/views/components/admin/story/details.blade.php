<div class="card">
    <div class="card-header card-header-info card-header-icon">
        <div class="card-icon">
            <i class="material-icons">
                list_alt
            </i>
        </div>
        <h4 class="card-title">
            Story Details
        </h4>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <b>Status: </b>
                    </td>
                    <td>
                        {{ 
                            App\Status::select('name')->where(
                                'id', 
                                $story->status_id
                            )->first()->name 
                        }}

                        @can('approve', $story)
                        @if ($story->status_id == 2)
                        <a href="{{ route('adminApproveStory', ['id'=>$story->id]) }}" 
                            class="btn btn-info btn-sm">
                            Approve
                        </a> 
                        @endif
                        @endcan
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Tags: </b>
                    </td>
                    <td>
                        <input type="text" value="{{ $story->tags }}" name="tags" class="form-control tagsinput" 
                            data-role="tagsinput" data-color="danger" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Related Report: </b>
                    </td>
                    <td>
                        <a href="{{ route('showReport', ['id'=>$story->report_id]) }}">
                            {{ App\Report::select('title')->where('id', $story->report_id)->first()->title }}
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>