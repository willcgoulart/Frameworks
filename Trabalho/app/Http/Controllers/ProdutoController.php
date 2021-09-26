<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Http\Requests\ProdutoRequest;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public  function index(Request $request)
	{
        $produtos = Produto::with(['Categoria'])->orderBy('desc_produto')->get();
		$mensagem = $request->session()->get('mensagem');
		return view('produto.index', compact('produtos','mensagem'));
	}

    public  function create()
	{
        $categorias = Categoria::query()->orderBy('desc_categoria')->get();
		return view('produto.create', compact('categorias'));
	}

    public function store(ProdutoRequest $request)
	{
        $data = $request->except( ['_token'] );
        $preco = $data['preco'];
		
        $preco = str_replace('.','',$preco);
        $preco = str_replace(',','.',$preco);
        $data['preco'] = $preco;
        Produto::create($data);

		$desc_produto = $data['desc_produto'];
		$request->session()->flash('mensagem',"Produto $desc_produto cadastrda com sucesso");

        return redirect()->route('produtos');
	}

	public function editar(int $id, Request $request)
	{
		$produto = Produto::find($id);
		$produto->preco = number_format($produto->preco,2,",",".");
		$categorias = Categoria::query()->orderBy('desc_categoria')->get();

		return view('produto.editar', compact('produto','categorias','id'));
	}

	public function editarsave(ProdutoRequest $request)
	{
		$novaDesc = $request['desc_produto'];
		$novaIdCategoria = $request['id_categoria'];
		$novaPreco = $request['preco'];
		$novaPreco = str_replace('.','',$novaPreco);
        $novaPreco = str_replace(',','.',$novaPreco);
		
		$produto = Produto::find($request['id']);
		$produto->desc_produto = $novaDesc;
		$produto->id_categoria  = $novaIdCategoria;
		$produto->preco = $novaPreco;
		$produto->save();

		$request->session()->flash('mensagem',"Produto $novaDesc atualizada com sucesso");

		return redirect()->route('produtos');
	}

	public function destroy(int $id, Request $request)
	{
		$produto = Produto::find($id);
		$desc_produto = $produto->desc_produto;
		$produto->delete();

		$request->session()->flash('mensagem',"Produto $desc_produto removida com sucesso");

		return redirect()->route('produtos');
	}
}
