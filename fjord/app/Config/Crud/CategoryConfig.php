<?php

namespace FjordApp\Config\Crud;

use App\Models\Category;
use Fjord\Crud\Config\CrudConfig;
use Fjord\Crud\CrudIndex;
use Fjord\Crud\CrudShow;
use FjordApp\Controllers\Crud\CategoryController;

class CategoryConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Category::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = CategoryController::class;

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => ucfirst('Category'),
            'plural'   => ucfirst('Categories'),
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return (new $this->model)->getTable();
    }

    /**
     * Build index page.
     *
     * @param Fjord\Crud\CrudIndex $page
     * @return void
     */
    public function index(CrudIndex $page)
    {
        // Expand html container to full width.
        $page->expand(false);

        $page->table(function ($table) {
            $table->col('Name')
                  ->value('{name}')
                  ->sortBy('name');
        })
             ->sortByDefault('id.desc')
             ->search('name')
             ->sortBy([
                 'id.desc' => __f('fj.sort_new_to_old'),
                 'id.asc'  => __f('fj.sort_old_to_new'),
             ])
             ->width(12);
    }

    /**
     * Setup show page.
     *
     * @param \Fjord\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {
            $form->input('name')
                 ->title('Name');
            $form->relation('products')
                 ->title('Products')
                 ->sortable()
                 ->preview(function ($table) {
                     $table->col('name');
                 });
        });
    }
}
