<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TaskController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $tasks = DB::table('tasks')->get();
        return view('task',compact('tasks'));
    }
    public function store(Request $request)
    {
        DB::table('tasks')->insert([
            'name'=>$request->name,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        return redirect('/');
    }
    public function destore($id)
    {
        DB::table('tasks')->where('id','=',$id)->delete();
        return redirect('/');
    }
}
