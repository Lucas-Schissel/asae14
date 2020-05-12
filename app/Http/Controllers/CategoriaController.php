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
            $nome = $req->input('nome');
            $descricao = $req->input('descricao');
                    
            $ctg = new Categoria();
            $ctg->nome = $nome;
            $ctg->descricao = $descricao;       

            if ($ctg->save()){
                echo  "<script>alert('Categoria $nome adicionada com Sucesso!');</script>";
            } else {
                echo  "<script>alert('Categoria $nome nao foi adicionada!!!');</script>";
            }
            return CategoriaController::telaCadastro();
        }
        return view('auth.login');
    }

    function alterar(Request $req, $id){
        if (Auth::check()){
            $ctg = Categoria::find($id);
            $nome = $req->input('nome');
            $descricao = $req->input('descricao');

            $ctg->nome = $nome;
            $ctg->descricao = $descricao;
            
        
            if ($ctg->save()){
                echo  "<script>alert('Categoria $nome alterada com Sucesso!');</script>";
            } else {
                echo  "<script>alert('Categoria $nome nao foi alterada!!!');</script>";
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
                    echo  "<script>alert('Categoria $id excluída com sucesso');</script>";
                } else {
                    echo  "<script>alert('Categoria $id nao foi excluída!!!');</script>";
                }

            return CategoriaController::listar();
            
        }else{
            return view('auth.login');
        }
    }

}
