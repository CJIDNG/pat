@extends('layouts.admin.app')

@section('admin-nav-title', 'My Submissions')

@section('content')

@php

$user = Auth::user();
$userReports = App\Report::where('user_id', $user->id)->get();
$userStories = App\Story::where('user_id', $user->id)->get();

@endphp

<div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">
                        description
                    </i>
                    </div>
                    <h4 class="card-title">
                    My Reports
                    </h4>
                </div>
            <div class="card-body">
                @if ($userReports->isEmpty())
                    <h4 class="text-center">You have not submit any reports yet.</h4>
                @else
                    @component('components.admin.user.reports', ['reports' => $userReports])
    
                    @endcomponent
                @endif
        
            </div>
        </div>
<br>
        <div class="card">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">
                        insert_comment
                    </i>
                    </div>
                    <h4 class="card-title">
                    My Stories
                    </h4>
                </div>
            <div class="card-body">
                @if ($userStories->isEmpty())
                    <h4 class="text-center">You have not submit any reports yet.</h4>
                @else
                    @component('components.admin.user.stories', ['stories' => $userStories])
    
                    @endcomponent
                @endif
        
            </div>
        </div>

    </div>
</div>





@endsection