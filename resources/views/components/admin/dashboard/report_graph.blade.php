@if(Auth::user()->hasRole('administrator'))
<div class="row">
  <div class="card">
    <div class="card-header card-header-icon card-header-success">
      <div class="card-icon">
        <i class="material-icons">timeline</i>
      </div>
      <h4 class="card-title">Reports Submitted
        <small> - by month</small>
      </h4>
    </div>
    <div class="card-body">
      <div id="colouredRoundedLineChart" class="ct-chart"></div>
  </div>
</div>
</div>
@endif

<div class="row">
  <div class="card">
    <div class="card-header card-header-icon card-header-success">
      <div class="card-icon">
        <i class="material-icons">insert_chart</i>
      </div>
      <h4 class="card-title">Types of Reports
        <small> - Total Submitted</small>
      </h4>
    </div>
    <div class="card-body my-2 ">
        <div id="multipleBarsChart" class="ct-chart"></div>
        <ul class="list-inline">
          <li class="list-inline-item"><span class="badge badge-info"> </span> Verified</li>
          <li class="list-inline-item"><span class="badge badge-danger"> </span> Unverified</li>
        </ul>
  </div>
</div>
</div>


