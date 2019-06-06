<?php

namespace Estoque\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Estoque\Entities\Produtos;

class Categorias extends Model implements Transformable
{
    use TransformableTrait;
    public $primaryKey = 'id';
    protected $table = "category";
    protected $fillable = [
        'description'
    ];

    public function products()
    {
        return $this->hasMany(Produtos::class, 'category_id', 'id');
    }
}
