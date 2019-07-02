@php
    $evidences = App\Evidence::where('report_id', $report->id)->orderBy('created_at', 'desc')->get();
@endphp
<div class="content">
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Type</th>
            <th>Created At</th>
            <th>Action</th>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($evidences); $i++)
            @php
                $evidence = $evidences[$i];
            @endphp
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>
                    {{ $evidence->file_format }}
                </td>
                <td>{{ $evidence->created_at }}</td>
                <td>
                    <a href="{{ asset('storage/'.$evidence->url) }}" download>
                        <i class="fa fa-download text-warning"></i>
                    </a>
                    @can('delete', $evidence)
                    <a href="{{ route('adminDeleteEvidence', ['id'=>$evidence->id]) }}" >
                        <i class="fa fa-times text-warning"></i>
                    </a>
                    @endcan
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>