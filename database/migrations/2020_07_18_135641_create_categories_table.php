<?php

use Fjord\Support\Migration\MigratePermissions;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    use MigratePermissions;

    /**
     * Permissions that should be created for this crud.
     *
     * @var array
     */
    protected $permissions = [
        'create categories',
        'read categories',
        'update categories',
        'delete categories',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');

            $table->string('slug')->nullable();
            $table->boolean('active')->default(true);

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

        Schema::dropIfExists('categories');

        $this->downPermissions();
    }
}
