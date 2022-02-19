<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

//    public function before(User $user): bool
//    {
//        return  //$user->isAdmin();
//    }

    public function viewAny(User $user): bool
    {
        return $user->getRelationValue('role')->permissions()->where('name', 'viewAny-product')->exists();
    }

    public function view(User $user, Product $product): bool
    {
        return $user->getRelationValue('role')->permissions()->where('name', 'view-product')->exists();
    }

    public function create(User $user): bool
    {
        return $user->getRelationValue('role')->permissions()->where('name', 'create-product')->exists();
    }

    public function update(User $user, Product $product): bool
    {
        return $product->getAttribute('user_id') == $user->getAttribute('id');
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->getRelationValue('role')->permissions()->where('name', 'delete-product')->exists();
    }
}
