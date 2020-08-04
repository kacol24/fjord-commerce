<?php

namespace FjordApp\Config\Pages;

use App\Http\Controllers\Pages\BlogController;
use FjordApp\Controllers\Pages\BlogController as FjordBlogController;
use FjordPages\PagesConfig;
use Fjord\Crud\Fields\Block\Repeatables;
use Illuminate\Routing\Route;

class BlogConfig extends PagesConfig
{
    /**
     * Fjord controller class.
     *
     * @var string
     */
    public $controller = FjordBlogController::class;

    /**
     * App controller class.
     *
     * @var string
     */
    public $appController = BlogController::class;

    /**
     * Application route prefix.
     *
     * @param string|null $locale
     * @return string
     */
    public function appRoutePrefix(string $locale = null)
    {
        return "blog";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Blog',
            'plural' => 'Blogs'
        ];
    }

    /**
     * Make repeatbles that should be available for pages.
     *
     * @param Repeatables $rep
     * @return void
     */
    public function repeatables(Repeatables $rep)
    {
        $rep->add('text', function ($form, $preview) {
            $preview->col('text')->stripHtml()->maxChars('50');

            $form->wysiwyg('text')
                ->title('Text')
                ->translatable($this->translatable());
        });
    }
}
