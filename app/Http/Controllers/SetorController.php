<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Sector;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function index() {
        $setores = Sector::all();
        return view('setores', compact('setores'));
    }
    public function create(Request $request) {
        if($request->input('_token') != '') {
            if(Sector::where('name', $request->name)->count() == 0) {
                Sector::create([
                    'name' => $request->name
                ]);
                $sucesso_setor = "O Funcionário foi cadastrado com sucesso";
                session()->flash('sucess', $sucesso_setor);
                return redirect()->back();
            } else {
                $erro_setor = "O Setor já está cadastrado.";
                session()->flash('error', $erro_setor);
                return redirect()->back();
            }
        } else {
            $erro_setor = "Erro ao cadastrar o Setor.";
            session()->flash('error', $erro_setor);
            return redirect()->back();
        }




    }

    public function delete(Request $request) {
        if($request->input('_token') != '') {
            Sector::destroy($request->id);
        }
        return redirect()->back();
    }
}
