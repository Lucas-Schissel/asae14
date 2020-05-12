<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Venda;
use App\Cliente;
use App\Produto;
use Auth;

class VendaController extends Controller
{
    function telaCadastro(){
		if (Auth::check()){
			$cliente = Cliente::all();
			$produto = Produto::all();
			return view ("telas_cadastro.cadastro_vendas",["pdr"=>$produto],["cli"=>$cliente]);
		}
			return view('auth.login');		
	}
	
	function telaAdicionarItem($id){
		if (Auth::check()){
			$venda = Venda::find($id);
			$produto = Produto::all();

			return view('telas_cadastro.cadastro_itens')->with(compact('venda','produto'));
			
		}else{
			return view('auth.login');
		}
		
	}
	
    function adicionar(Request $req){
		if (Auth::check()){
			$id_usuario = $req->input('id_usuario');
			
			$vnd = new Venda();
			$vnd->id_usuario = $id_usuario;
			$vnd->valor = 0;
			

			if ($vnd->save()){
				echo  "<script>alert('Venda efetuada com Sucesso!');</script>";
			} else {
				echo  "<script>alert('Venda nao efetuada!');</script>";
			}
			return redirect()->route('vendas_item_novo', ['id' => $vnd->id]);

		}else{
            return view('auth.login');
        }

	}
	
	function excluir($id){
		if (Auth::check()){

			$venda = Venda::find($id);

				if ($venda->delete()){
					session([
                        'mensagem' =>"Produto: $venda->nome ,foi excluída com sucesso!"
					]);
					return 	VendaController::todasVendas($id);
				} else {
					session([
                        'mensagem' =>"Venda: $venda->nome , nao foi excluída!"
					]);
					return 	VendaController::todasVendas($id);
				}			
			
		}else{
            return view('auth.login');
        }
  
    }

    function vendasPorCliente($id){
		if (Auth::check()){
			$cliente= Cliente::find($id);
			$vendas = Venda::all()->where('id_usuario',$id);
			$total = collect($vendas)->sum('valor');

			if (count($cliente->vendas) >0){
				return view('listas.lista_vendas')->with(compact('total','cliente','vendas'));

			}else{
				echo "<script>alert('Cliente $cliente->nome nao possui vendas!!!');</script>";
				$cliente = Cliente::all();
				return view("listas.lista_clientes", [ "cli" => $cliente ]);
			}			
		}
		return view('auth.login');
	}

	function todasVendas(){
		if (Auth::check()){
			$vendas = Venda::all();
			$produtos = Produto::all();
			$clientes = Cliente::all();
			return view('listas.lista_todas_vendas')->with(compact('produtos','clientes','vendas'));
		}
		return view('auth.login');
	}

	function listar(){
		if (Auth::check()){
		$vendas = Venda::all();
		return view('listas.lista_vendas_geral',['vendas' => $vendas]);
		}
		return view('auth.login');
	}

	function itensVenda($id){
		if (Auth::check()){
			$venda = Venda::find($id);
			return view('listas.lista_itens_venda', ['venda' => $venda]);
		}
		return view('auth.login');
	}

	function adicionarItem(Request $req, $id){
		if (Auth::check()){
			$id_produto = $req->input('id_produto');
			$qtd = $req->input('quantidade');
			
			$quantidade = intval($qtd);

			$produto = Produto::find($id_produto);
			$venda = Venda::find($id);
			$subtotal = $produto->preco * $quantidade;

			$colunas_pivot = [
					'quantidade' => $quantidade,
					'subtotal' => $subtotal
			];

			
			$venda->produtos()->attach($produto->id, $colunas_pivot);
			$venda->valor += $subtotal;
			$venda->save();		
			return redirect()->route('vendas_item_novo', ['id' => $venda->id]);
		}else{
			return view('auth.login');
		}
	}

	function excluirItem($id , $id_pivot){
		if (Auth::check()){
			$venda = Venda::find($id);
			$subtotal = DB::table('produtos_venda')->where('id',$id_pivot)->value('subtotal');

			$venda->valor = $venda->valor - $subtotal;
			$venda->produtos()->wherePivot('id','=',$id_pivot)->detach();
			$venda->save();

			session([
				'mensagem' =>"Item excluído com sucesso!"
			]);
			return redirect()->route('vendas_item_novo', ['id' => $venda->id]);
		}else{
			return view('auth.login');
		}

	}

	function excluirItemLista($id , $id_pivot){
		if (Auth::check()){
			$venda = Venda::find($id);
			$subtotal = DB::table('produtos_venda')->where('id',$id_pivot)->value('subtotal');

			$venda->valor = $venda->valor - $subtotal;
			$venda->produtos()->wherePivot('id','=',$id_pivot)->detach();
			$venda->save();
			$var = DB::table('produtos_venda')->where('id_venda','=',$id)->first();
			session([
				'mensagem' =>"Item excluído com sucesso!"
			]);
			if($var){
				return view('listas.lista_itens_venda', ['venda' => $venda]);
			}else{
				$venda->delete();
				return redirect()->route('vendas_total');
			}
		}else{
			return view('auth.login');
		}

	}

	function validar($id){
		if (Auth::check()){
			$venda = Venda::find($id);
			if(($venda->valor)>0){
				return	VendaController::todasVendas();
			}else{
				echo "<script>alert('Nao é possivel adicionar uma venda sem itens!!! A venda nao foi salva');</script>";
				$venda->delete();
				return	VendaController::todasVendas();
			}
		}else{
			return view('auth.login');
		}
	}

}
