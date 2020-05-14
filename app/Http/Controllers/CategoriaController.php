<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Categoria;
use Auth;

class CategoriaController extends Controller
{
    function telaCadastro(){
        if (Auth::check()){
            return view('telas_cadastro.cadastro_categorias');
        }
        return view('auth.login');
    }

    function telaAlteracao($id){
        if (Auth::check()){
            $ctg = Categoria::find($id);
            return view("telas_updates.alterar_categoria", [ "ctg" => $ctg ]);
        }
        return view('auth.login');
    }

    function adicionar(Request $req){
        if (Auth::check()){

            $req->validate([
                'nome' => 'required|min:5',
                'descricao' => 'required|min:5',
            ]);

            $nome = $req->input('nome');
            $descricao = $req->input('descricao');
                    
            $ctg = new Categoria();
            $ctg->nome = $nome;
            $ctg->descricao = $descricao;       

            if ($ctg->save()){
                session([
                    'mensagem' =>"Categoria: $nome, foi adicionada com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"Categoria: $nome, nao adicionada !!!"
                ]);
            }
            return CategoriaController::telaCadastro();
        }
        return view('auth.login');
    }

    function alterar(Request $req, $id){
        if (Auth::check()){

            $req->validate([
                'nome' => 'required|min:5',
                'descricao' => 'required|min:5',
            ]);

            $ctg = Categoria::find($id);
            $nome = $req->input('nome');
            $descricao = $req->input('descricao');

            $ctg->nome = $nome;
            $ctg->descricao = $descricao;
            
        
            if ($ctg->save()){
                session([
                    'mensagem' =>"Categoria: $nome, foi alterada com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"Categoria: $nome, nao alterada !!!"
                ]);
            }

            return CategoriaController::listar();
        }
        return view('auth.login'); 
        
    }

    function listar(){
        if (Auth::check()){
            $ctg = Categoria::all();
            return view("listas.lista_categorias", [ "ctg" => $ctg ]);
            
		}else{
            return view('auth.login');
        }
    }

    function excluir($id){
        if (Auth::check()){

            $ctg = Categoria::find($id);

                if ($ctg->delete()){
                    session([
                        'mensagem' =>"Categoria: $ctg->nome , foi excluída com sucesso!"
                    ]);
                    return CategoriaController::listar();
                } else {
                    session([
                        'mensagem' =>"Categoria: $ctg->nome , nao foi excluída!"
                    ]);
                    return CategoriaController::listar();
                }
            
        }else{
            return view('auth.login');
        }
    }

}
