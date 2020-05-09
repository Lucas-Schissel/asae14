<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    function telaCadastro(){
        if (session()->has("login")){
            return view('telas_cadastro.cadastro_categorias');
        }
            return view('tela_login');
    }

    function telaAlteracao($id){
        if (session()->has("login")){
            $ctg = Categoria::find($id);
            return view("telas_updates.alterar_categoria", [ "ctg" => $ctg ]);
        }
        return view('tela_login');
    }

    function adicionar(Request $req){
        if (session()->has("login")){
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
        return view('tela_login');
    }

    function alterar(Request $req, $id){
        if (session()->has("login")){
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
        return view('tela_login');    
        
    }

    function listar(){
        if (session()->has("login")){
            $ctg = Categoria::all();
            return view("listas.lista_categorias", [ "ctg" => $ctg ]);
            
		}else{
            return view('tela_login');
        }
    }

    function excluir($id){
        if (session()->has("login")){
            $ctg = Categoria::find($id);

            $var = DB::table('produtos')->where('id_categoria','=',$id)->first();

            if($var){
                echo  "<script>alert('A categoria nao pode ser excluida pois existem produtos associados');</script>"; 
            }else{

                if ($ctg->delete()){
                    echo  "<script>alert('Categoria $id excluída com sucesso');</script>";
                } else {
                    echo  "<script>alert('Categoria $id nao foi excluída!!!');</script>";
                }

            }

            return CategoriaController::listar();
        }else{
            return view('tela_login');
        }
    }

}
