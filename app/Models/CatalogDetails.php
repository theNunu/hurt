<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogDetails extends Model
{
    protected $table = 'catalog_details';

    protected $fillable = [
        'catalog_id',
        'value'
    ];


    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }

    /**
     * Relación many-to-many con News
     */
    public function news()
    {
        return $this->belongsToMany(
            News::class,
            'news_catalog_detail',
            'catalog_detail_id', // pivot column que apunta a catalogs_details.id
            'new_id',           // pivot column que apunta a news.new_id
            'catalog_detail_id',                // local key (CatalogDetail->id)
            'new_id'             // related key (News->new_id)
        )->withTimestamps();
    }
}
