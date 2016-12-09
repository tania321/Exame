<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos=Curso::all();
        $user=Auth::user();
        return view('curso.index', compact('cursos'))->with(compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        return view('curso.create')->with(compact('user'));
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
            'descricao'=>'required'
        ]);

        $curso=new Curso;
        $curso->descricao=Input::get('descricao');
        $curso->user_id = Auth::id();

        $curso->save();

        Session::flash('message','Gravado com sucesso');
        return redirect()->route('curso.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::find($id);

        return view('curso.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::find($id);

        return view('curso.edit', compact('curso'));
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
            'descricao'=>'required'
        ]);

        $curso=Estudante::findOrfail($id);

        $curso->descricao=Input::get('descricao');
        $curso->user_id = Auth::id();

        $curso->save();

        Session::flash('message','Editado com sucesso');
        return Redirect::to('curso.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso=Curso::findOrfail($id);

        $curso->delete();

        Session::flash('message','Removido com sucesso');
        return Redirect::to('curso.index');
    }
}
