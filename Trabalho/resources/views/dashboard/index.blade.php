@extends('layout.layout')

@section('conteudo')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-10 col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-5">
                        <div class="text-center">
                            <h1 class="mb-4">Dashboard</h1>
                        </div> 

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('produtos') }}" class="text-decoration-none">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Produto</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fas fa-file-alt fa-2x text-gray-300 fa-fw"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('categorias') }}" class="text-decoration-none">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Categoria</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fas fa-file-alt fa-2x text-gray-300 fa-fw"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('form_editar_user') }}" class="text-decoration-none">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Editar User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fas fa-user fa-2x text-gray-300 fa-fw"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('deslogar') }}" class="text-decoration-none">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Deslogar</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fas fa-sign-out-alt fa-2x text-gray-300 fa-fw"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                       

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection