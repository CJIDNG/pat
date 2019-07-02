<?php

namespace App;

use App\Report;
use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    public function report() {
        return $this->belongsTo(Report::class);
    }
}
