<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SSQuestionaire;
class SSQuestioniareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ss_responses = SSQuestionaire::all();
        return view('ssresponse')->with('ss_responses', $ss_responses);
    }

    public function statistics(){
        $ss_responses = SSQuestionaire::all();
        $exp_data = [];
        $i = 0;
        foreach($ss_responses as $response){
            $exp_data[$i] = $response->expired_RTUF;
            $i++;
        }
        $unexp_length = count(array_keys($exp_data, 0));
        $exp_length = count(array_keys($exp_data ,1));
        $data = [$exp_length,$unexp_length];

        $stock_out_days = 0;
        $i = 0;
        foreach($ss_responses as $response){
            $stock_out_days += $response->stock_out_days;
            $i++;
        }
        $stock_out_days /= $i;

        $usable_rutf = [];
        $i = 0;
        foreach($ss_responses as $response){
            $usable_rutf[$i] = $response->usable_RTUF;
            $i++;
        }
        $unusable_length = count(array_keys($usable_rutf, 0));
        $usable_length = count(array_keys($usable_rutf ,1));
        $usable_data = [$usable_length,$unusable_length];
        return view('stockstatistics')->with('data', $data)->with('stock_out_days',$stock_out_days)->with('usable', $usable_data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = SSQuestionaire::find($id);
        $facility = $response->facility;
        return view('ssresponsedetail')->with('response',$response)->with('facility', $facility);
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
