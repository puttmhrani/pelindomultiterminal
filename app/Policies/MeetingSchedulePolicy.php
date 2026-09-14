<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MeetingSchedule;
use Illuminate\Auth\Access\HandlesAuthorization;

class MeetingSchedulePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MeetingSchedule');
    }

    public function view(AuthUser $authUser, MeetingSchedule $meetingSchedule): bool
    {
        return $authUser->can('View:MeetingSchedule');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MeetingSchedule');
    }

    public function update(AuthUser $authUser, MeetingSchedule $meetingSchedule): bool
    {
        return $authUser->can('Update:MeetingSchedule');
    }

    public function delete(AuthUser $authUser, MeetingSchedule $meetingSchedule): bool
    {
        return $authUser->can('Delete:MeetingSchedule');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:MeetingSchedule');
    }

    public function restore(AuthUser $authUser, MeetingSchedule $meetingSchedule): bool
    {
        return $authUser->can('Restore:MeetingSchedule');
    }

    public function forceDelete(AuthUser $authUser, MeetingSchedule $meetingSchedule): bool
    {
        return $authUser->can('ForceDelete:MeetingSchedule');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MeetingSchedule');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MeetingSchedule');
    }

    public function replicate(AuthUser $authUser, MeetingSchedule $meetingSchedule): bool
    {
        return $authUser->can('Replicate:MeetingSchedule');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MeetingSchedule');
    }

}