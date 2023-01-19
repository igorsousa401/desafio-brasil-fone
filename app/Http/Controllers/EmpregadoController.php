<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Sector;
use Illuminate\Http\Request;

class EmpregadoController extends Controller
{
    public function index() {
        $empregados = Employee::all();
        $sectors = Sector::all();
        return view('empregados', compact('empregados', 'sectors'));
    }

    public function create(Request $request) {
        if($request->input('_token') != '') {
                Employee::create([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'adress' => $request->adress,
                    'salary' => $request->salary,
                    'office' => $request->office,
                    'sector_id' => $request->sector_id
                ]);
                $sucesso_setor = "O Setor foi cadastrado com sucesso";
                session()->flash('sucess', $sucesso_setor);
                return redirect()->back();
        } else {
            $erro_setor = "Erro ao cadastrar o Setor.";
            session()->flash('error', $erro_setor);
            return redirect()->back();
        }

    }

    public function delete(Request $request) {
        if($request->input('_token') != '') {
            Employee::destroy($request->id);
        }
        return redirect()->back();
    }
}
