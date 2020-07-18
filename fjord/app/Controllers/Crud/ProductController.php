<?php

namespace FjordApp\Controllers\Crud;

use Fjord\Crud\Controllers\CrudController;
use Fjord\User\Models\FjordUser;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends CrudController
{
    /**
     * Crud model class name.
     *
     * @var string
     */
    protected $model = \App\Models\Product::class;

    /**
     * Authorize request for authenticated fjord-user and permission operation.
     * Operations: create, read, update, delete
     *
     * @param FjordUser $user
     * @param string $operation
     * @param integer $id
     * @return boolean
     */
    public function authorize(FjordUser $user, string $operation, $id = null): bool
    {
        return $user->can("{$operation} products");
    }

    /**
     * Initial query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(): Builder
    {
        return $this->model::query();
    }
}
