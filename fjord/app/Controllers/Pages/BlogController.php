<?php

namespace FjordApp\Controllers\Pages;

use FjordPages\FjordPagesController;
use Fjord\User\Models\FjordUser;

class BlogController extends FjordPagesController
{
    /**
     * Authorize request for authenticated fjord-user and permission operation.
     * Operations: read, update
     *
     * @param FjordUser $user
     * @param string $operation
     * @return boolean
     */
    public function authorize(FjordUser $user, string $operation): bool
    {
        return true;
    }
}
