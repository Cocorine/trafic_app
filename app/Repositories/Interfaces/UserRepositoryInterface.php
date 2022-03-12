<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface UserRepositoryInterface
{
      /**
       * Return all items.
       *
       * @return Collection
       */
    public function all(): Collection;
 
     /**
      * Create an item
      *
      * @param array $attributes
      * @return User
      */
    public function create(array $attributes): User;

     /**
      * Update an item by id
      *
      * @param array $attributes
      * @param int|User $id
      * @return boolean
      */
    public function update(array $attributes, $id): bool;

}
