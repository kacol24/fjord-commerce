<?php

namespace FjordApp\Controllers\User;

use Fjord\Crud\Controllers\CrudController;
use Fjord\User\Models\FjordUser;
use Illuminate\Database\Eloquent\Builder;

class ProfileSettingsController extends CrudController
{
    /**
     * Crud model class name.
     *
     * @var string
     */
    protected $model = FjordUser::class;

    /**
     * Authorize request for authenticated fjord-user and permission operation.
     * Operations: read, update.
     *
     * @param FjordUser $user
     * @param string    $operation
     *
     * @return bool
     */
    public function authorize(FjordUser $user, string $operation): bool
    {
        return $user->id == fjord_user()->id;
    }

    /**
     * Initial query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(): Builder
    {
        return $this->model::where('id', fjord_user()->id);
    }
}
