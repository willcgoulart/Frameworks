@extends('layout.layout')

@section('conteudo')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-9">
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-5">
                        <div class="text-center">
                            <h1 class="mb-4">Cadastro Categoria</h1>
                        </div> 
                        <form method="post" action="{{ route('form_cadastra_categoria') }}">
                            @csrf        
                            <div class="form-label-group">
                                <label for="desc_categoria">Descrição</label>
                                <input type="text" class="form-control {{ $errors->has("desc_categoria") ? 'is-invalid' :'' }} border border-secondary"
                                id="desc_categoria" name="desc_categoria" value="{{ old('desc_categoria') ?? '' }}">
                                <div class="invalid-feedback">
                                    @if($errors->has("desc_categoria"))
                                        @foreach($errors->get("desc_categoria") as $msg)
                                        {{$msg}}<br />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-3" id="btnEntrar">
                                <i class="fas fa-sign-in-alt fa-fw" id="iconeEntrar"></i>Cadastrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection