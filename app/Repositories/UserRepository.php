<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Abstract class UserRepository
 * @package App\Repositories
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    /**
     * User class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change variable $model or $this->user
     * @property User|mixed $model;
     */
    protected $user;

    /**
     * UserRepository constructor.
     * 
     * @param User $user
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * Create an user.
     *
     * @param array $attributes
     * @return User
     */
    public function create(array $attributes) : User
    {
        $this->user = parent::create($attributes);

        $this->user->roles()->sync($attributes['roles'],true);

        $this->user->permissions()->sync($attributes['permissions'],true);

        return $this->user;
    }

    /**
     * Update an user.
     *
     * @param array $attributes
     * @param int|User $id
     * @return boolean
     */
   public function update(array $attributes, $id): bool
   {

        parent::update($attributes, $id);
        
        $this->user = parent::find($id);

        $this->user->roles()->sync($attributes['roles'],false);

        $this->user->permissions()->sync($attributes['permissions']);
        
        return true;
        
   }

}
