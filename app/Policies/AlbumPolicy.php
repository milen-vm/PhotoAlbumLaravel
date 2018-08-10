<?php

namespace App\Policies;

use App\User;
use App\Album;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlbumPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param $ability
     * @return bool|null
     */
    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can view the album.
     *
     * @param  \App\User  $user
     * @param  \App\Album  $album
     * @return bool
     */
    public function view(User $user, Album $album)
    {
        if ($user->id === $album->user_id) {
            return true;
        } elseif (!$album->is_private) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create albums.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the album.
     *
     * @param  \App\User  $user
     * @param  \App\Album  $album
     * @return bool
     */
    public function update(User $user, Album $album)
    {
        return $user->id === $album->user_id;
    }

    /**
     * Determine whether the user can delete the album.
     *
     * @param  \App\User  $user
     * @param  \App\Album  $album
     * @return bool
     */
    public function delete(User $user, Album $album)
    {
        return $user->id === $album->user_id;
    }
}
