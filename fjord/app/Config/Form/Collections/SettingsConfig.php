<?php

namespace FjordApp\Config\Form\Collections;

use Fjord\Crud\Config\FormConfig;
use Fjord\Crud\CrudShow;
use FjordApp\Controllers\Form\Collections\SettingsController;

class SettingsConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = SettingsController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'settings';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Settings',
        ];
    }

    /**
     * Setup form.
     *
     * @param \Fjord\Crud\CrudShow $page
     *
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {
            $form->input('title')
                ->title('Title')
                ->width(12)
                ->placeholder('Fjord');
        });
    }
}
