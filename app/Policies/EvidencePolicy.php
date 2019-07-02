<?php

namespace App\Policies;

use App\User;
use App\Evidence;
use App\Role;
use App\Report;
use Illuminate\Auth\Access\HandlesAuthorization;

class EvidencePolicy
{
    use HandlesAuthorization;

    private $roles;

    public function __construct()
    {
        $this->setRoles(Role::select('name')->get());
    }

    private function setRoles($roles) {
        $this->roles = $roles;
    }

    public function getRoles() {
        return $this->roles;
    }

    /**
     * Determine whether the user can view the evidence.
     *
     * @param  \App\User  $user
     * @param  \App\Evidence  $evidence
     * @return mixed
     */
    public function view(User $user, Evidence $evidence)
    {
        return true;
    }

    /**
     * Determine whether the user can create evidence.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Report $report)
    {
        return $user->id == $report->user_id;
    }

    /**
     * Determine whether the user can update the evidence.
     *
     * @param  \App\User  $user
     * @param  \App\Evidence  $evidence
     * @return mixed
     */
    public function update(User $user, Evidence $evidence)
    {
        return $user->id === $evidence->report()->user_id;
    }

    /**
     * Determine whether the user can delete the evidence.
     *
     * @param  \App\User  $user
     * @param  \App\Evidence  $evidence
     * @return mixed
     */
    public function delete(User $user, Evidence $evidence)
    {
        return $user->id == $evidence->report->user_id;
    }

    /**
     * Determine whether the user can restore the evidence.
     *
     * @param  \App\User  $user
     * @param  \App\Evidence  $evidence
     * @return mixed
     */
    public function restore(User $user, Evidence $evidence)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the evidence.
     *
     * @param  \App\User  $user
     * @param  \App\Evidence  $evidence
     * @return mixed
     */
    public function forceDelete(User $user, Evidence $evidence)
    {
        //
    }
}
