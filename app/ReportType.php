<?php

namespace App;

use App\Report;
use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
    public function reports() {
        return $this->hasMany(Report::class);
    }
}
