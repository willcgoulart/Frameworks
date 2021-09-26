@extends('layout.login')

@section('conteudo')


<div class="container">
    <div class="text-center pt-3">
        <i class="fab fa-reddit fa-8x"></i>
    </div>
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-9">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-5">
                        <div class="text-center">
                            <h1 class="mb-4">Login</h1>
                        </div>                           
                        <form class="user" method="POST">
                            @csrf
                            @include('erros', ['errors' => $errors->mensagemErro])
                            
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
                                <label for="password">Senha</label>
                                <input type="password" 	class="form-control {{ $errors->has("password") ? 'is-invalid' :'' }} border border-secondary"
                                id="password" name="password">
                                <div class="invalid-feedback">
                                    @if($errors->has("password"))
                                        @foreach($errors->get("password") as $msg)
                                        {{$msg}}<br />
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3" id="btnEntrar">
                                <i class="fas fa-sign-in-alt fa-fw" id="iconeEntrar"></i>Entrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection