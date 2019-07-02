<?php

namespace App;

use App\User;
use App\Status;
use App\ReportType;
use App\Evidence;
use App\Story;
use App\State;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function reportType() {
        return $this->belongsTo(ReportType::class);
    }

    public function evidence() {
        return $this->hasMany(Evidence::class);
    }

    public function stories() {
        return $this->hasMany(Story::class);
    }

    public function state() {
        return $this->belongsTo(State::class);
    }
}
