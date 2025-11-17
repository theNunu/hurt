<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'new_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'new_id',
        'title',
        'content',
        'is_active',
    ];

    // Añadimos 'categorias' como atributo virtual al serializar
    protected $appends = ['categorias'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->new_id) {
                $model->new_id = (string) Str::uuid();
            }
        });
    }

    public function catalogDetails()
    {
        return $this->belongsToMany(
            CatalogDetails::class,
            'news_catalog_detail',
            'new_id',              // foreignPivotKey (en pivot que referencia a esta tabla)
            'catalog_detail_id',    // relatedPivotKey (en pivot que referencia a catalog detail)
            'new_id',               // parentKey (primary key de este modelo)
            'catalog_detail_id'                    // relatedKey (primary key de CatalogDetail)
        )->withTimestamps();
    }

    /**
     * Atributo virtual 'categorias' devuelve array de ids de catalog_details
     */
    public function getCategoriasAttribute()
    {
        // Si la relación ya está cargada, evita query adicional
        if ($this->relationLoaded('catalogDetails')) {
            return $this->catalogDetails->pluck('catalog_detail_id')->toArray();
        }

        return $this->catalogDetails()->pluck('catalog_detail_id')->toArray();
    }
}
