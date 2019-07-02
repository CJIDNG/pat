<?php

namespace App;

use App\Story;
use App\Report;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function reports() {
        return $this->hasMany(Report::class);
    }

    public function stories() {
        return $this->hasMany(Story::class);
    }
}
