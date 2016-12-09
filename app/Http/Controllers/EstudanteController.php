<?php

namespace App\Http\Controllers;

use App\estudante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudantes=Estudante::all();
        $user=Auth::user();
        return view('estudante.index', compact('estudantes'))->with(compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        return view('estudante.create')->with(compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                        'nome'=>'required',
                        'apelido'=>'required',
                        'datanascimento'=>'required',
                        'altura'=>'required',
                        'sexo'=>'required',
                        'email'=>'required',
                        'telefone'=>'required',
                        'curso_id'=>'required'
                    ]);

        $estudante=new Estudante;
        $estudante->nome=Input::get('nome');
        $estudante->apelido=Input::get('apelido');
        $estudante->datanascimento=Input::get('datanascimento');
        $estudante->altura=Input::get('altura');
        $estudante->sexo=Input::get('sexo');
        $estudante->email=Input::get('email');
        $estudante->telefone=Input::get('telefone');
        $estudante->curso_id=Input::get('curso_id');
        $estudante->user_id = Auth::id();

        $estudante->save();

        Session::flash('message','Gravado com sucesso');
        return Redirect::to('estudantes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudante = Estudante::find($id);

        return view('estudante.show', compact('estudante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudante = Estudante::find($id);

        return view('estudante.edit', compact('estudante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome'=>'required',
            'apelido'=>'required',
            'datanascimento'=>'required',
            'altura'=>'required',
            'sexo'=>'required',
            'email'=>'required',
            'telefone'=>'required',
            'curso_id'=>'required'
        ]);

        $estudante=Estudante::findOrfail($id);
        $estudante->nome=Input::get('nome');
        $estudante->apelido=Input::get('apelido');
        $estudante->datanascimento=Input::get('datanascimento');
        $estudante->altura=Input::get('altura');
        $estudante->sexo=Input::get('sexo');
        $estudante->email=Input::get('email');
        $estudante->telefone=Input::get('telefone');
        $estudante->curso_id=Input::get('curso_id');
        $estudante->user_id = Auth::id();

        $estudante->save();

        Session::flash('message','Editado com sucesso');
        return Redirect::to('estudantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudante=Estudante::findOrfail($id);

        $estudante->delete();

        Session::flash('message','Removido com sucesso');
        return Redirect::to('estudantes.index');
    }
}
