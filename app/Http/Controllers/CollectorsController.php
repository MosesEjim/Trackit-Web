<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use App\Collector;
class CollectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collector = new Collector();
        $collector->name = $request->input('username');
        $collector->email = $request->input('email');
        $password = rand(10000,99999);
        $collector->password = $password;
        $data = ['email' => $request->input('email'), 'password' => $password,'name' =>$request->input('username')];
        Mail::to($request->input('email'))->send(new sendMail($data));
        $collector->save();
        return back();
    }

    public function login(Request $request){

        $allUsers = Collector::all();
        $user = $allUsers->find($request->input('email'));
        $success = count($user);
        $user = $user[0];
        if($success==1 && $user->password == $request->input('password')){
         return response()->json($success);
        }else{
            return response()->json(0);
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
