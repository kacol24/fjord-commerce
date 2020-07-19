<?php

namespace App\Models;

use Fjord\Crud\Models\Traits\Sluggable;
use Fjord\Crud\Models\Traits\TrackEdits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use TrackEdits, Sluggable;
    use SoftDeletes;

    /**
     * Setup Model:
     *
     * Enter all fillable columns. Translated columns must also be set fillable.
     * Don't forget to also set them fillable in the coresponding translation-model!
     */

    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class)->orderBy('order_column');
    }

    public function children()
    {
        return $this->listItems('children');
    }
}
