<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;
use App\Unidade;
use App\Venda;
use Auth;

class ProdutoController extends Controller
{
    function telaCadastro(){
        if (Auth::check()){
            $categoria = Categoria::All();
            $unidade = Unidade::All();

            return view('telas_cadastro.cadastro_produtos',["ctg" => $categoria],["und" => $unidade]);
        }
        return view('auth.login');
    }

    function telaAlteracao($id){
        if (Auth::check()){
            $pdr = Produto::find($id);
            return view("telas_updates.alterar_produto", [ "pdr" => $pdr ]);
        }
        return view('auth.login');
    }

    function adicionar(Request $req){
        if (Auth::check()){

            $req->validate([
                'nome' => 'required|min:2',
                'preco' => 'required|numeric',
            ]);

            $nome = $req->input('nome');
            $preco = $req->input('preco');
            $categoria = $req->input('id_categoria');
            $und = $req->input('id_unidade');
            
            $pdr = new Produto();
            $pdr->nome = $nome;
            $pdr->preco = $preco;
            $pdr->id_categoria = $categoria;
            $pdr->id_unidade = $und;

            if ($pdr->save()){
                session([
                    'mensagem' =>"Produto: $nome, foi adicionado com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"Produto: $nome, nao foi adicionado !!!"
                ]);
            }
            return ProdutoController::telaCadastro();
        }
        return view('auth.login');
    }

    function alterar(Request $req, $id){
        if (Auth::check()){

            $req->validate([
                'nome' => 'required|min:2',
                'preco' => 'required|numeric',
            ]);

            $pdr = Produto::find($id);
            $nome = $req->input('nome');
            $preco = $req->input('preco');

            $pdr->preco = $preco;
            $pdr->nome = $nome;
        
            if ($pdr->save()){
                session([
                    'mensagem' =>"Produto: $nome, foi alterado com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"Produto: $nome, nao foi alterado !!!"
                ]);
            }

            return ProdutoController::listar();
        }
        return view('auth.login');
    }

    function listar(){
        if (Auth::check()){
            $pdr = Produto::all();
            return view("listas.lista_produtos", [ "pdr" => $pdr ]);
            
		}else{
            return view('auth.login');
        }
    }

    function excluir($id){
        if (Auth::check()){

            $pdr = Produto::find($id);

                if ($pdr->delete()){
                    session([
                        'mensagem' =>"Produto: $pdr->nome ,foi excluído com sucesso!"
                    ]);
                    return ProdutoController::listar();
                } else {
                    session([
                        'mensagem' =>"Produto: $pdr->nome , nao foi excluído!"
                    ]);
                    return ProdutoController::listar();
                }           
            
        }else{
            return view('auth.login');
        }


    }

}
