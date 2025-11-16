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
}
