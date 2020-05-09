<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Unidade;

class UnidadeController extends Controller
{
    
    function telaCadastro(){
        if (session()->has("login")){
            return view('telas_cadastro.cadastro_unidades');
        }
            return view('tela_login');
    }

    function telaAlteracao($id){
        if (session()->has("login")){
            $unidade = Unidade::find($id);
            return view("telas_updates.alterar_unidade", [ "und" => $unidade ]);
        }
        return view('tela_login');
    }

    function adicionar(Request $req){
        if (session()->has("login")){
            $nome = $req->input('nome');
                    
            $unidade = new Unidade();
            $unidade->nome = $nome;     

            if ($unidade->save()){
                echo  "<script>alert('Unidade $nome adicionada com Sucesso!');</script>";
            } else {
                echo  "<script>alert('Unidade $nome nao foi adicionada!!!');</script>";
            }
            return UnidadeController::telaCadastro();
        }
        return view('tela_login');
    }

    function alterar(Request $req, $id){
        if (session()->has("login")){
            $unidade = Unidade::find($id);
            $nome = $req->input('nome');

            $unidade->nome = $nome;
            
            if ($unidade->save()){
                echo  "<script>alert('Unidade $nome alterada com Sucesso!');</script>";
            } else {
                echo  "<script>alert('Unidade $nome nao foi alterada!!!');</script>";
            }

            return UnidadeController::listar();
        }
        return view('tela_login');
    }

    function listar(){
        if (session()->has("login")){
            $unidade = Unidade::all();
            return view("listas.lista_unidades", [ "und" => $unidade ]);
            
		}else{
            return view('tela_login');
        }
    }

    function excluir($id){
        if (session()->has("login")){
            $unidade = Unidade::find($id);

            $var = DB::table('produtos')->where('id_unidade','=',$id)->first();

            if($var){
                echo  "<script>alert('A unidade nao pode ser excluida pois existem produtos associados');</script>"; 
            }else{

                if ($unidade->delete()){
                    echo  "<script>alert('Unidade $id excluída com sucesso');</script>";
                } else {
                    echo  "<script>alert('Undade $id nao foi excluída!!!');</script>";
                }

            }

            return UnidadeController::listar();
        }else{
            return view('tela_login');
        }
    }
}
