<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $table = 'catalogs';

    protected $fillable = [
        'name'
    ];

    public function details()
    {
        return $this->hasMany(CatalogDetails::class, 'catalog_id');
    }
}
