<?php

namespace App\Http\Controllers;

    use App\Cliente;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Redirect;

class ClientesControler extends Controller
{
    public function index(){
        if(Auth::guest()){
            return Redirect::to('/');
        } else {
            $clientes = Cliente::get();
            return view('home', ['clientes' => $clientes]);
        }
    }

    public function novo(){
        if(Auth::guest()) {
            return Redirect::to('/');
        } else {
            return view('clientes.formulario');
        }
    }

    public function salvar(Request $request){
        if(Auth::guest()){
            return Redirect::to('/');
        } else {
            $cliente = new Cliente();

            $cliente = $cliente->create($request->all());

            \Session::flash('mensagem_sucesso', 'Cliente cadastrado com Sucesso!');

            return Redirect::to('Clientes/novo');
        }
    }

    public function editar($id){
        if(Auth::guest()){
            return Redirect::to('/');
        } else {
            $cliente = Cliente::findOrFail($id);
            return view('clientes.formulario', ['cliente' => $cliente]);
        }
    }

    public function atualizar($id, Request $request){
        if(Auth::guest()){
            return Redirect::to('/');
        } else {
            $cliente = Cliente::findOrFail($id);
            $cliente->update($request->all());
            \Session::flash('mensagem_sucesso', 'Cliente atualizado com Sucesso!');
            return Redirect::to('Clientes/' . $cliente->id . '/editar');
        }
    }

    public function deletar($id){
        if(Auth::guest()){
            return Redirect::to('/');
        } else {
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();

            \Session::flash('mensagem_sucesso', 'Cliente deletado com Sucesso!');
            return Redirect::to('Clientes');
        }
    }

}

