<?php

namespace FjordApp\Config;

use Fjord\Application\Navigation\Config;
use Fjord\Application\Navigation\Navigation;

class NavigationConfig extends Config
{
    /**
     * Topbar navigation entries.
     *
     * @param \Fjord\Application\Navigation\Navigation $nav
     *
     * @return void
     */
    public function topbar(Navigation $nav)
    {
        $nav->section([
            $nav->preset('profile'),
        ]);

        $nav->section([
            $nav->title(__f('fj.user_administration')),

            $nav->preset('user.user', [
                'icon' => fa('users'),
            ]),
            $nav->preset('permissions'),
        ]);

        $nav->section([
            $nav->preset('form.collections.settings', [
                'icon' => fa('cog'),
            ]),
        ]);
    }

    /**
     * Main navigation entries.
     *
     * @param \Fjord\Application\Navigation\Navigation $nav
     *
     * @return void
     */
    public function main(Navigation $nav)
    {
        $nav->section([
            $nav->title('Master'),

            $nav->group([
                'title' => 'Products',
            ], [
                $nav->preset('crud.product', [
                    'icon' => fa('archive'),
                ]),
                $nav->preset('crud.category', [
                    'icon' => fa('network-wired'),
                ]),
            ]),
        ]);

        //$nav->section([
        //    $nav->title('Pages'),
        //
        //    $nav->group([
        //        'title' => 'Pages',
        //        'icon'  => fa('file'),
        //    ], [
        //        $nav->preset('form.pages.home', [
        //            'icon' => fa('home'),
        //        ]),
        //    ]),
        //]);
    }
}
