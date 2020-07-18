<?php

namespace FjordApp\Controllers\Form\Collections;

use Fjord\Crud\Controllers\FormController;
use Fjord\User\Models\FjordUser;
use FjordApp\Config\Form\Collections\SettingsConfig;

class SettingsController extends FormController
{
    /**
     * Form config class.
     *
     * @var string
     */
    protected $config = SettingsConfig::class;

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
        return $user->can("{$operation} settings");
    }
}
