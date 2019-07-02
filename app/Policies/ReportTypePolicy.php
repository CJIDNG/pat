<?php

namespace App\Policies;

use App\User;
use App\ReportType;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportTypePolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability) {
        return $user->hasRole('administrator');
    }

    /**
     * Determine whether the user can view the report type.
     *
     * @param  \App\User  $user
     * @param  \App\ReportType  $reportType
     * @return mixed
     */
    public function view(User $user, ReportType $reportType)
    {
        return true;
    }

    /**
     * Determine whether the user can create report types.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('administrator');
    }

    /**
     * Determine whether the user can update the report type.
     *
     * @param  \App\User  $user
     * @param  \App\ReportType  $reportType
     * @return mixed
     */
    public function update(User $user, ReportType $reportType)
    {
        return $user->hasRole('administrator');
    }

    /**
     * Determine whether the user can delete the report type.
     *
     * @param  \App\User  $user
     * @param  \App\ReportType  $reportType
     * @return mixed
     */
    public function delete(User $user, ReportType $reportType)
    {
        return $user->hasRole('administrator');
    }

    /**
     * Determine whether the user can restore the report type.
     *
     * @param  \App\User  $user
     * @param  \App\ReportType  $reportType
     * @return mixed
     */
    public function restore(User $user, ReportType $reportType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the report type.
     *
     * @param  \App\User  $user
     * @param  \App\ReportType  $reportType
     * @return mixed
     */
    public function forceDelete(User $user, ReportType $reportType)
    {
        //
    }
}
