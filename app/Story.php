<?php

namespace App;

use App\User;
use App\Status;
use App\Report;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function report() {
        return $this->belongsTo(Report::class);
    }
}
