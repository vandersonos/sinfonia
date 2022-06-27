<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $numRowsPage = 1;
    public function index(Request $request)
    {
        $filtros = $request->search;
        $users = User::where('name', 'like', '%'.$filtros.'%')->orWhere('email', 'like', '%'.$filtros.'%')->paginate($this->numRowsPage);

        $mensagem = $request->session()->get(key: 'mensagem');

        return view('Users/index', compact('users', 'mensagem', 'filtros'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('Users/show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('Users/edit', compact('user'));
    }

    public function create(Request $request)
    {
        return view('Users/create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = User::where('email', '=', $request->email)->get();
        if (!$data->isEmpty()) {
            return back()->withInput()->withErrors(['mensagem' => "Já existe um usuário com o e-mail informado!"]);
        }
        $u= new User();
        $u->name = $request->name;
        $u->email = $request->email;
        if (!empty($request->password)) {
            $u->password = $request->password;
        }
        $u->save();
        $request->session()->put('mensagem', "Usuário {$u->name} foi cadastrado com sucesso.");

        return redirect("/users/");
    }



    public function update(StoreUserRequest $request, $id)
    {
        $u = User::find($id);
        $u->name = $request->name;
        $u->email = $request->email;
        if (!empty($request->password)) {
            $u->password = $request->password;
        }
        $u->save();

        $request->session()->put('mensagem', "Usuário {$u->name} foi atualizado com sucesso.");

        return redirect("/users/");
    }

    public function previewRemove($id)
    {
        $user = User::find($id);
        return view('Users/remove', compact('user'));
    }

    public function destroy(Request $request, $id)
    {
        $u = User::find($id);
        $u->delete();
        $request->session()->put('mensagem', "Usuário removido com sucesso.");
        return redirect("/users/");
    }
}
