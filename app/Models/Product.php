<?php

namespace App\Models;

use Fjord\Crud\Models\FormListItem;
use Fjord\Crud\Models\Traits\HasMedia;
use Fjord\Crud\Models\Traits\Sluggable;
use Fjord\Crud\Models\Traits\TrackEdits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;

class Product extends Model implements HasMediaContract
{
    use TrackEdits, HasMedia, Sluggable;
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
        'description',
        'category_id',
        'price',
        'sale_price',
        'start_date',
        'end_date',
        'slug',
        'active',
    ];

    protected $appends = [
        'image',
        'formatted_price',
    ];

    protected $with = ['media'];

    protected $dates = [
        'start_date',
        'end_date',
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

    /**
     * Image attribute.
     *
     * @return \Fjord\Crud\Models\Media
     */
    public function getImageAttribute()
    {
        return $this->getMedia('image');
    }

    public function category()
    {
        return $this->belongsTo(FormListItem::class, 'category_id');
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp' . number_format($this->price, 0, 0, '.');
    }
}
