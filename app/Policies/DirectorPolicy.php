<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Director;
use Illuminate\Auth\Access\HandlesAuthorization;

class DirectorPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Director');
    }

    public function view(AuthUser $authUser, Director $director): bool
    {
        return $authUser->can('View:Director');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Director');
    }

    public function update(AuthUser $authUser, Director $director): bool
    {
        return $authUser->can('Update:Director');
    }

    public function delete(AuthUser $authUser, Director $director): bool
    {
        return $authUser->can('Delete:Director');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Director');
    }

    public function restore(AuthUser $authUser, Director $director): bool
    {
        return $authUser->can('Restore:Director');
    }

    public function forceDelete(AuthUser $authUser, Director $director): bool
    {
        return $authUser->can('ForceDelete:Director');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Director');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Director');
    }

    public function replicate(AuthUser $authUser, Director $director): bool
    {
        return $authUser->can('Replicate:Director');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Director');
    }

}