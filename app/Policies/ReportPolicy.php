<?php

namespace App\Policies;

use App\User;
use App\Report;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportPolicy
{
    use HandlesAuthorization;

    private $roles;

    public function __construct()
    {
        $this->setRoles(Role::select('name')->orderBy('id','asc')->get());
    }

    private function setRoles($roles) {
        $this->roles = $roles;
    }

    public function getRoles() {
        return $this->roles;
    }

    /**
     * Determine whether the user can view the report.
     *
     * @param  \App\User  $user
     * @param  \App\Report  $report
     * @return mixed
     */
    public function view(User $user, Report $report)
    {
        return true;
    }

    /**
     * Determine whether the user can create reports.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasAnyRole($this->roles);
    }

    /**
     * Determine whether the user can update the report.
     *
     * @param  \App\User  $user
     * @param  \App\Report  $report
     * @return mixed
     */
    public function update(User $user, Report $report)
    {
        return $user->id == $report->user_id;
    }

    public function verify(User $user, Report $report) {
        return $user->hasRole('administrator');
    }

    /**
     * Determine whether the user can delete the report.
     *
     * @param  \App\User  $user
     * @param  \App\Report  $report
     * @return mixed
     */
    public function delete(User $user, Report $report)
    {
        return $user->id == $report->user_id || 
            $user->hasRole('administrator');
    }

    /**
     * Determine whether the user can restore the report.
     *
     * @param  \App\User  $user
     * @param  \App\Report  $report
     * @return mixed
     */
    public function restore(User $user, Report $report)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the report.
     *
     * @param  \App\User  $user
     * @param  \App\Report  $report
     * @return mixed
     */
    public function forceDelete(User $user, Report $report)
    {
        //
    }
}
