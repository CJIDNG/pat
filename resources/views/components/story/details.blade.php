<div class="row">
        <div class="col">
            <div class="card">
            <div class="card-header text-center">
                <h4 class="card-title">Story Details</h4>
                <p class="category">
                   Created: {{ $story->created_at->format('d/m/Y') }}
                </p>
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
                                <b>Author: </b>
                            </td>
                            <td>
                                {{ $story->author }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Related Report: </b>
                            </td>
                            <td>
                                <a href="{{ route('report', ['id' => $story->report_id]) }}">{{ App\Report::select('title')->where('id', $story->report_id)->first()->title }}</a>
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
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
