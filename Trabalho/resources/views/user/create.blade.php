@extends('layout.layout')

@section('conteudo')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-9">
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-5">
                        <div class="text-center">
                            <h1 class="mb-4">Cadastro User</h1>
                        </div> 
                        <form method="post" action="{{ route('form_cadastra_user') }}">
                            @csrf

                            @include('erros', ['errors' => $errors->mensagemErro])
                            
                            <div class="form-label-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control {{ $errors->has("name") ? 'is-invalid' :'' }} border border-secondary"
                                id="name" name="name" value="{{ old('name') ?? '' }}">
                                <div class="invalid-feedback">
                                    @if($errors->has("name"))
                                        @foreach($errors->get("name") as $msg)
                                        {{$msg}}<br />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-label-group">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control {{ $errors->has("cpf") ? 'is-invalid' :'' }} border border-secondary cpf"
                                id="cpf" name="cpf" value="{{ old('cpf') ?? '' }}">
                                <div class="invalid-feedback">
                                    @if($errors->has("cpf"))
                                        @foreach($errors->get("cpf") as $msg)
                                        {{$msg}}<br />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-label-group">
                                <label for="user_name">UserName</label>
                                <input type="text" class="form-control {{ $errors->has("user_name") ? 'is-invalid' :'' }} border border-secondary"
                                id="user_name" name="user_name" value="{{ old('user_name') ?? '' }}">
                                <div class="invalid-feedback">
                                    @if($errors->has("user_name"))
                                        @foreach($errors->get("user_name") as $msg)
                                        {{$msg}}<br />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-label-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control {{ $errors->has("email") ? 'is-invalid' :'' }} border border-secondary"
                                id="email" name="email" value="{{ old('email') ?? '' }}">
                                <div class="invalid-feedback">
                                    @if($errors->has("email"))
                                        @foreach($errors->get("email") as $msg)
                                        {{$msg}}<br />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-label-group">
                                <label for="tipo_user">Tipo User</label>
                                <select class="form-control {{ $errors->has("tipo_user") ? 'is-invalid' :'' }}" 
                                    id="tipo_user" name="tipo_user" value="{{ old('tipo_user') ?? '' }} border border-secondary" 
                                    style="border: solid 1px;">
                                    <option value="">Selecione</option>
                                    <option value="1">Adm</option>
                                    <option value="2">User</option>
                                </select>

                                <div class="invalid-feedback">
                                    @if($errors->has("tipo_user"))
                                        @foreach($errors->get("tipo_user") as $msg)
                                        {{$msg}}<br />
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            
                            <div class="form-label-group">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control {{ $errors->has("password") ? 'is-invalid' :'' }} border border-secondary"
                                id="password" name="password" value="{{ old('password') ?? '' }}">
                                <div class="invalid-feedback">
                                    @if($errors->has("password"))
                                        @foreach($errors->get("password") as $msg)
                                        {{$msg}}<br />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="form-label-group">
                                <label for="password_confirmation">Confirmação de Senha</label>
                                <input type="password" class="form-control {{ $errors->has("password_confirmation") ? 'is-invalid' :'' }} border border-secondary"
                                id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') ?? '' }}">
                                <div class="invalid-feedback">
                                    @if($errors->has("password_confirmation"))
                                        @foreach($errors->get("password_confirmation") as $msg)
                                        {{$msg}}<br />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-3" id="btnEntrar">
                                <i class="fas fa-sign-in-alt fa-fw" id="iconeEntrar"></i>Entrar
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
        $('.cpf').mask('000.000.000-00');
    });
</script>

@endsection