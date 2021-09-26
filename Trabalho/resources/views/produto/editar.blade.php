@extends('layout.layout')

@section('conteudo')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-9">
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-5">
                        <div class="text-center">
                            <h1 class="mb-4">Editar Produto</h1>
                        </div> 
                        <form method="post" action="{{ route('form_editar_produto') }}">
                            @csrf        
                            <div class="form-label-group">
                                <label for="desc_produto">Descrição</label>
                                <input type="text" class="form-control {{ $errors->has("desc_produto") ? 'is-invalid' :'' }} border border-secondary"
                                id="desc_produto" name="desc_produto" value="{{ old('desc_produto' ?? '', $produto->desc_produto ?? '') }}">
                                <div class="invalid-feedback">
                                    @if($errors->has("desc_produto"))
                                        @foreach($errors->get("desc_produto") as $msg)
                                        {{$msg}}<br />
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-label-group">
                                <label for="id_categoria">Categoria</label>
                                <select class="form-control {{ $errors->has("id_categoria") ? 'is-invalid' :'' }}" 
                                    id="id_categoria" name="id_categoria" value="{{ old('id_categoria') ?? '' }}" 
                                    style="border: solid 1px;">
                                    <option value="">Selecione</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id_categoria  }}"  
                                        @if (old('id_categoria')==$categoria->id_categoria || $produto->id_categoria==$categoria->id_categoria) 
                                            {{ 'selected' }} 
                                        @endif>
                                            {{ $categoria->desc_categoria }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    @if($errors->has("id_categoria"))
                                        @foreach($errors->get("id_categoria") as $msg)
                                        {{$msg}}<br />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-label-group">
                                <label for="preco">Preço</label>
                                <input type="text" class="form-control {{ $errors->has("preco") ? 'is-invalid' :'' }} border border-secondary preco"
                                id="preco" name="preco" value="{{ old('preco' ?? '', $produto->preco ?? '') }}">
                                <div class="invalid-feedback">
                                    @if($errors->has("preco"))
                                        @foreach($errors->get("preco") as $msg)
                                        {{$msg}}<br />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $id }}">
                            <button type="submit" class="btn btn-success mt-3" id="btnEntrar">
                                <i class="fas fa-sign-in-alt fa-fw" id="iconeEntrar"></i>Alterar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.preco').mask("#.##0,00", { reverse: true });
    });
</script>

@endsection