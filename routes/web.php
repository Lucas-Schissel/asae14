<?php

use Illuminate\Support\Facades\Route;

//Rotas Publicas Aplicaçao....................................................................

Auth::routes();

//Rotas Privadas Aplicaçao....................................................................

Route::middleware(['auth'])->group(function(){

	Route::middleware(['admin'])->group(function(){

	//Clientes................................................................................

	Route::get('/cliente/cadastro', 'ClienteController@telaCadastro')
	->name('cliente_cadastro');

	Route::get('/cliente/alterar/{id}', 'ClienteController@telaAlteracao')
	->name('cliente_update');

	Route::post('/cliente/adicionar', 'ClienteController@adicionar')
	->name('cliente_add');

	Route::post('/cliente/alterar/{id}', 'ClienteController@alterar')
	->name('cliente_alterar');

	Route::get('/cliente/excluir/{id}', 'ClienteController@excluir')
	->name('cliente_delete');

	Route::get('/cliente/listar', 'ClienteController@listar')
	->name('cliente_listar');

	//Vendas.................................................................................

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

	//Itens...................................................................................

	Route::get('/itens/listar', 'VendaController@listar_itens')
	->name('itens_listar');

	//Produtos................................................................................

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

	//Categorias................................................................................

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

	//Unidades...................................................................................

	Route::get('/unidade/cadastro', 'UnidadeController@telaCadastro')
	->name('unidade_cadastro');

	Route::get('/unidade/alterar/{id}', 'UnidadeController@telaAlteracao')
	->name('unidade_update');

	Route::post('/unidade/adicionar', 'UnidadeController@adicionar')
	->name('unidade_add');

	Route::post('/unidade/alterar/{id}', 'UnidadeController@alterar')
	->name('unidade_alterar');

	Route::get('/unidade/excluir/{id}', 'UnidadeController@excluir')
	->name('unidade_delete');

	});

	//Area restrita aplicaçao.................................................................
	Route::get('/menu', 'AppController@menu')
	->name('menu');

	Route::get('/dashboard', 'AppController@dashboard')
	->name('dashboard');

	Route::get('/logout', 'AppController@logout')
	->name('logout');

	//Clientes..................................................................................
	Route::get('/cliente/listar', 'ClienteController@listar')
	->name('cliente_listar');

	//Vendas....................................................................................
	Route::get('/venda/listar', 'VendaController@listar')
	->name('venda_listar');

	//Produtos................................................................................
	Route::get('/produto/listar', 'ProdutoController@listar')
	->name('produto_listar');

	//Categorias...............................................................................
	Route::get('/categoria/listar', 'categoriaController@listar')
	->name('categoria_listar');

	//Unidades..................................................................................
	Route::get('/unidade/listar', 'unidadeController@listar')
	->name('unidade_listar');

	
});





