<?php

namespace FjordApp\Config\Crud;

use App\Models\Product;
use Fjord\Crud\Config\CrudConfig;
use Fjord\Crud\CrudIndex;
use Fjord\Crud\CrudShow;
use FjordApp\Controllers\Crud\ProductController;

class ProductConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Product::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ProductController::class;

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => ucfirst(__f('models.products')),
            'plural'   => ucfirst(__f('models.products')),
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
        $page->expand(true);

        $page->table(function ($table) {
            $table->col('Name')
                  ->value('{name}');
            $table->col('Category')
                  ->value('{category.name}');
            $table->col('Price')
                  ->value('{formatted_price}');
        })
             ->query(function ($query) {
                 $query->with('category');
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
            $form->group(function ($form) {
                $form->image('image') // images is the corresponding media collection.
                     ->title('Image')
                     ->maxFiles(1);
            })
                 ->width(3);

            $form->group(function ($form) {
                $form->input('name')
                     ->title('Item name');
                $form->relation('category')
                     ->title('Category')
                     ->preview(function ($table) {
                         $table->col('name');
                     });
            })
                 ->width(9);

            $form->textarea('description')
                 ->title('Description');

            $form->input('price')
                 ->title('Price')
                 ->type('number')
                 ->prepend('Rp')
                 ->width(6);
            $form->modal('modal')
                 ->title('Set Sale Price')
                 ->name('Sale Price')
                 ->form(function ($form) {
                     $form->input('sale_price')
                          ->title('Sale Price')
                          ->type('number')
                          ->prepend('Rp')
                          ->width(12);

                     $form->datetime('start_date')
                          ->title('Start Date')
                          ->onlyDate(false)
                          ->formatted('LLL')
                          ->width(6);
                     $form->datetime('end_date')
                          ->title('End Date')
                          ->onlyDate(false)
                          ->formatted('LLL')
                          ->width(6);
                 })
                 ->width(6);
        });
    }
}
