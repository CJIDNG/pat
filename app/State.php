<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Report;

class State extends Model
{
    //
    public function reports() {
        return $this->hasMany(Report::class);
    }
}
