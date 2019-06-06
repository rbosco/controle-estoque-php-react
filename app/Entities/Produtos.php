<?php

namespace Estoque\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Estoque\Entities\Categorias;

class Produtos extends Model implements Transformable
{
    use TransformableTrait;
    public $primaryKey = 'id';
    protected $table = "product";
    protected $fillable = [
        'description',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Categorias::class, 'category_id');
    }
}
