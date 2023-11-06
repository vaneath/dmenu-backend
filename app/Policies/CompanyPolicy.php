<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\Owner;

class CompanyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Owner $owner): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Owner $owner, Company $company): bool
    {
        return $owner->companies->contains($company) ? true : false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Owner $owner): bool
    {
        return $owner->id ? true : false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Owner $owner, Company $company): bool
    {
        return $company->owners->contains($owner) ? true : false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Owner $owner, Company $company): bool
    {
        return $company->owners->contains($owner) ? true : false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Company $company): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Company $company): bool
    {
        //
    }
}
