<?php

use Fjord\Support\Migration\MigratePermissions;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    use MigratePermissions;

    /**
     * Permissions that should be created for this crud.
     *
     * @var array
     */
    protected $permissions = [
        'create products',
        'read products',
        'update products',
        'delete products',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('category_id')->nullable();

            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('price');
            $table->integer('sale_price')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->string('slug')->nullable();
            $table->boolean('active')->default(true);

            $table->integer('order_column')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        $this->upPermissions();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('products');

        $this->downPermissions();
    }
}
