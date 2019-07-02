@php
    if($report->status_id == 4) {
        $statusColor = 'badge-danger';
    } else if($report->status_id == 5) {
        $statusColor = 'badge-success';
    }
@endphp
<div class="card">
    <div class="card-header card-header-primary card-header-icon">
        <div class="card-icon">
            <i class="material-icons">
                list_alt
            </i>
        </div>
        <h4 class="card-title">
            Report Details
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
                        <b>Report Type: </b>
                    </td>
                    <td>{{ App\ReportType::select('name')->where('id', $report->report_type_id)->first()->name }}</td>
                </tr>
                <tr>
                    <td>
                        <b>Location: </b>
                    </td>
                    <td>{{ App\State::select('name')->where('id', $report->state_id)->first()->name }}</td>
                </tr>
                <tr>
                    <td>
                        <b>Victim: </b>
                    </td>
                    <td>{{ $report->victim }}</td>
                </tr>
                <tr>
                    <td>
                        <b>Affiliation: </b>
                    </td>
                    <td>{{ $report->affiliation }}</td>
                </tr>
                <tr>
                    <td>
                        <b>Assailant: </b>
                    </td>
                    <td>{{ $report->assailant }}</td>
                </tr>
                <tr>
                    <td>
                        <b>Status: </b>
                    </td>
                    <td>
                        <label class="badge {{ $statusColor }}">
                            {{ App\Status::select('name')->where('id', $report->status_id)->first()->name }}
                        </label>

                        @can('verify', $report)
                        @if ($report->status_id == 4)
                        <a href="{{ route('adminVerifyReport', ['id'=>$report->id]) }}" 
                            class="btn btn-info btn-sm">
                            Verify
                        </a>
                        @endif
                        @endcan
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>