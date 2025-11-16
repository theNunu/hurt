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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->new_id) {
                $model->new_id = (string) Str::uuid();
            }
        });
    }
}
