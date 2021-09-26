<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public  function index(Request $request)
	{
        $categorias = Categoria::query()->orderBy('desc_categoria')->get();
		$mensagem = $request->session()->get('mensagem');
		return view('categoria.index', compact('categorias','mensagem'));
	}

    public  function create()
	{
		return view('categoria.create');
	}

    public function store(CategoriaRequest $request)
	{
        $data = $request->except( ['_token'] );
        Categoria::create($data);

		$desc_categoria = $data['desc_categoria'];
		$request->session()->flash('mensagem',"Categoria $desc_categoria cadastrda com sucesso");

        return redirect()->route('categorias');
	}

	public function editar(int $id, Request $request)
	{
		$categoria = Categoria::find($id);
		$desc_categoria = $categoria->desc_categoria;

		return view('categoria.editar', compact('desc_categoria','id'));
	}

	public function editarsave(CategoriaRequest $request)
	{
		$novaDesc = $request['desc_categoria'];
		
		$categoria = Categoria::find($request['id']);
		$categoria->desc_categoria = $novaDesc;
		$categoria->save();

		$request->session()->flash('mensagem',"Categoria $novaDesc atualizada com sucesso");

		return redirect()->route('categorias');
	}

	public function destroy(int $id, Request $request)
	{
		$categoria = Categoria::find($id);
		$desc_categoria = $categoria->desc_categoria;
		$categoria->delete();

		$request->session()->flash('mensagem',"Categoria $desc_categoria removida com sucesso");

		return redirect()->route('categorias');
	}

}
