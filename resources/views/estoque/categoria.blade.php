@extends('layouts.app')
@section('content')
   <div class="content">
      <div class="flex form-categoria">
         <div class="box50">
            <form name="form-product">
               <input type="hidden" name="callback" value="manter-categoria">
               <input type="hidden" name="func" value="categoria">
               <input type="hidden" name="id" value="">
               <label>
                  <span class="label">DESCRIÇÃO</span>
                  <input class="radius5" type="text" name="description" value="" placeholder="NOME DA CATEGORIA">
               </label>
               <div class="actions">
                  <button type="submit" class="btn btn-info radius5"><i class="fas fa-save"></i>Salvar</button>
                  <button type="button" class="btn btn-danger radius5 btn_delete" data-id="" data-action="remover-categoria"><i class="fas fa-trash-alt"></i>Excluir</button>
               </div>
            </form>
         </div>
         <div class="box50 form-search">
               <form name="form-search">
                  <input type="text" class="radius5" name="search" placeholder="Pesquisa">
               </form>
            </div>
      </div>
      <div class="product-list">
         <table class="table" width="100%">
            <thead>
               <td>Categoria</td>
               <td>Ações</td>
            </thead>
            <tbody>
               @foreach ($listCategories as $item)
                  <tr>
                     <td>{{$item->description}}</td>
                  <td><span class="btn-icon btn-warning btn_edit radius50" data-id="{{$item->id}}" data-action="editar-categoria"><i class="fas fa-pencil-alt"></i></span><span class="btn-icon radius50 btn_delete btn-danger" data-id="{{$item->id}}" data-action="remover-categoria"><i class="fas fa-trash-alt" ></i></span></td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
@endsection