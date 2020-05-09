<?php

use Illuminate\Support\Facades\Route;

//Clientes

Route::get('/usuario/cadastro', 'ClienteController@telaCadastro')
	->name('usuario_cadastro');

Route::get('/usuario/alterar/{id}', 'ClienteController@telaAlteracao')
	->name('usuario_update');
	
Route::post('/usuario/adicionar', 'ClienteController@adicionar')
	->name('usuario_add');

Route::post('/usuario/alterar/{id}', 'ClienteController@alterar')
	->name('usuario_alterar');

Route::get('/usuario/excluir/{id}', 'ClienteController@excluir')
	->name('usuario_delete');

Route::get('/usuario/listar', 'ClienteController@listar')
	->name('usuario_listar');

//Login

Route::get('/tela_login', 'AppController@tela_login')
	->name('tela_login');

Route::post('/login', 'AppController@login')
	->name('logar');

Route::get('/logout', 'AppController@logout')
	->name('logout');

Route::get('/menu', 'AppController@menu')
	->name('menu');

Route::get('/dashboard', 'AppController@dashboard')
	->name('dashboard');

//Vendas
Route::get('/lista/{id}/itens/remover/{id_pivot}', 'VendaController@excluirItemLista')
	->name('lista_item_delete');

Route::get('/venda/{id}/itens/remover/{id_pivot}', 'VendaController@excluirItem')
	->name('vendas_item_delete');

Route::post('/venda/{id}/itens/adicionar', 'VendaController@adicionarItem')
	->name('vendas_item_add');

Route::get('/venda/{id}/itens/novo', 'VendaController@telaAdicionarItem')
	->name('vendas_item_novo');

Route::get('/venda/{id}/itens', 'VendaController@itensVenda')
	->name('vendas_itens');

Route::get('/venda/listar', 'VendaController@listar')
	->name('venda_listar');

Route::get('/venda/validar/{id}', 'VendaController@validar')
	->name('venda_validar');

Route::get('/venda/cadastrar', 'VendaController@telaCadastro')
	->name('venda_cadastro');

Route::post('/venda/adicionar', 'VendaController@adicionar')
	->name('venda_add');

Route::get('/venda/excluir/{id}', 'VendaController@excluir')
	->name('venda_delete');

Route::get('venda/cliente/{id}', 'VendaController@vendasPorCliente')
	->name('vendas_cliente');

Route::get('venda/total/', 'VendaController@todasVendas')
	->name('vendas_total');

//Itens

Route::get('/itens/listar', 'VendaController@listar_itens')
	->name('itens_listar');

//Produtos

Route::get('/produto/cadastro', 'ProdutoController@telaCadastro')
	->name('produto_cadastro');

Route::get('/produto/alterar/{id}', 'ProdutoController@telaAlteracao')
	->name('produto_update');
	
Route::post('/produto/adicionar', 'ProdutoController@adicionar')
	->name('produto_add');

Route::post('/produto/alterar/{id}', 'ProdutoController@alterar')
	->name('produto_alterar');

Route::get('/produto/excluir/{id}', 'ProdutoController@excluir')
	->name('produto_delete');

Route::get('/produto/listar', 'ProdutoController@listar')
	->name('produto_listar');

//Categorias

Route::get('/categoria/cadastro', 'categoriaController@telaCadastro')
	->name('categoria_cadastro');

Route::get('/categoria/alterar/{id}', 'categoriaController@telaAlteracao')
	->name('categoria_update');
	
Route::post('/categoria/adicionar', 'categoriaController@adicionar')
	->name('categoria_add');

Route::post('/categoria/alterar/{id}', 'categoriaController@alterar')
	->name('categoria_alterar');

Route::get('/categoria/excluir/{id}', 'categoriaController@excluir')
	->name('categoria_delete');

Route::get('/categoria/listar', 'categoriaController@listar')
	->name('categoria_listar');

//Unidades

Route::get('/unidade/cadastro', 'unidadeController@telaCadastro')
	->name('unidade_cadastro');

Route::get('/unidade/alterar/{id}', 'unidadeController@telaAlteracao')
	->name('unidade_update');
	
Route::post('/unidade/adicionar', 'unidadeController@adicionar')
	->name('unidade_add');

Route::post('/unidade/alterar/{id}', 'unidadeController@alterar')
	->name('unidade_alterar');

Route::get('/unidade/excluir/{id}', 'unidadeController@excluir')
	->name('unidade_delete');

Route::get('/unidade/listar', 'unidadeController@listar')
	->name('unidade_listar');