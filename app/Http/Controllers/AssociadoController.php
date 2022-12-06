<?php

namespace App\Http\Controllers;

use App\Models\Associado;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class AssociadoController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function index(Request $request)
    {
        $associados = Associado::where('idAssociado', 'like', '%'.$request->buscaAssociado.'%')->orderBy('idAssociado','asc')->get();
        $totalAssociados= Associado::all()->count();
        return view('associados.index', compact('associados', 'totalAssociados'));
    }

    public function create()
    {
        return view('associados.create');
    }

    public function store(Request $request)
    {
        $input = $request->toArray();
        Associado::create($input);

        return redirect()->route('associados.index')->with('Sucesso', 'Associados cadastrado com sucesso!');
    }
}
