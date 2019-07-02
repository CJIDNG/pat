@php
    $evidences = App\Evidence::where('report_id', $report->id)->orderBy('created_at', 'desc')->get();
@endphp


<div class="row">

    @for ($i = 0; $i < count($evidences); $i++)

    @php
        $evidence = $evidences[$i];
        $date = $evidence->created_at->format('d/m/Y');
    @endphp

<div class="col-lg-3 col-sm-4">
        <div class="card card-profile card-plain">
            <div class="card-avatar">
                <img class="img" src="{{ asset('storage/'.$evidence->url) }}">
            </div>
            <div class="card-header mt-4">
                <a href="{{ asset('storage/'.$evidence->url) }}" download class="btn btn-info btn-round btn-sm">Download</a>
                <h6 class="card-category text-gray"><b>ID:</b> {{ $evidence->id }},  File Type:</b> {{ $evidence->file_format }}</h6>
                <h5 class="card-title"><b>Added:</b> {{ $date }}</h5>
            </div>
        </div>
    </div>

    @endfor
</div>




    {{--  --}}







{{-- <div class="content">
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Type</th>
            <th>Date Added</th>
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
                        <i class="fa fa-download"></i>
                    </a>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</div> --}}