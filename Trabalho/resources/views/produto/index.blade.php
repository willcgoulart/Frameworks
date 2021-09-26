@extends('layout.layout')

@section('conteudo')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-10 col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-5">
                        <div class="text-center">
                            <h1 class="mb-4">Produtos</h1>
                        </div> 

                        <a href="{{ route('form_cadastra_produto') }}" class="btn btn-dark mb-2">Adcionar</a>

                        @include('mensagem', ['mensagem'=> $mensagem])

                        <table  class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                            <thead>
                                <th>Produtos</th>
                                <th>Categoria</th>
                                <th>Preço</th>
                                <th style="text-align: center">Editar</th>
                                <th style="text-align: center">Excluir</th>
                            </thead>
                            <tbody>
                            @foreach($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->desc_produto }}</td>
                                    <td>{{ $produto->Categoria['desc_categoria'] }}</td>
                                    <td>{{ $produto->preco }}</td>
                                    <td style="text-align: center">
                                        <a href="/produtos/{{ $produto->id_produto  }}/editar" class="btn btn-info btn-sm mr-1">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </td>
                                    <td style="text-align: center">
                                        <form method="post" action="/produtos/delete/{{ $produto->id_produto  }}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($produto->desc_produto) }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
		$('#dataTables-example').DataTable({
                responsive: true,
                "oLanguage": {
                    "sLengthMenu": "Mostrar _MENU_ registros por página",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
                   "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
                    "sInfoFiltered": "(filtrado de _MAX_ registros)",
                    "sSearch": "Pesquisar na Lista: ",
                    "oPaginate": {
                        "sFirst": "Inácio",
                        "sPrevious": "Anterior",
                        "sNext": "Próximo",
                        "sLast": "Último"
                    }
                },
            	"order": [[ 0, "asc" ]],
               	"lengthMenu": [[10,25,50,100,150,200, -1], [10,25,50,100,150,200, "Todos"]]
        });
    }); 
</script>
@endsection