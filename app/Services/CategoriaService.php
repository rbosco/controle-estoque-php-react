<?php

namespace Estoque\Services;

use Estoque\Repositories\CategoriasRepository;
use Estoque\Entities\Categorias;

class CategoriaService
{
    protected $repository;

    public function __construct(CategoriasRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listCategories()
    {
        return $this->repository->all();
    }
    
    public function saveCategory($request)
    {
        $this->repository->updateOrCreate(['id' => $request['id']], $request);
        return response()->json([
            'message' => 'Categoria cadastrada com sucesso!',
            'type' => 'success',
            'reload' => true,
        ], 200);
    }

    public function editCategory($id)
    {
        $category = Categorias::find($id);
        $categoryArray = array(
            'id' => $category->id,
            'description' => $category->description,
        );

        return response()->json(['data' => $categoryArray]);
    }

    public function deleteCategory($id)
    {
        $this->repository->delete($id);
        return response()->json([
            'message' => 'Categoria deletada com sucesso!',
            'type' => 'success',
            'reload' => true
        ], 200);
    }
}
