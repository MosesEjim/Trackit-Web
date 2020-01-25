<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FSQuestionaire;

class FSQuestionaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fs_responses = FSQuestionaire::all();
        return view('fsresponse')->with('fs_responses', $fs_responses);
    }

    public function statistics(){
        $band_one = [];
        $band_two = [];
        $band_three = [];
        $fs_responses = FSQuestionaire::all();
        $i = 0;
        foreach($fs_responses as $response){
            $band_one[$i] = $response->describe_dosage1;
            $band_two[$i] = $response->describe_dosage2;
            $band_three[$i] = $response->describe_dosage3;
            $i++;
        }
        $correct_band1 = count(array_keys($band_one,1));
        $wrong_band1 = count(array_keys($band_one,0));
        $correct_band2 = count(array_keys($band_two,1));
        $wrong_band2 = count(array_keys($band_two,0));
        $correct_band3 = count(array_keys($band_three,1));
        $wrong_band3 = count(array_keys($band_three,0));

        $data_one = [$correct_band1, $wrong_band1];
        $data_two = [$correct_band2, $wrong_band2];
        $data_three = [$correct_band3, $wrong_band3];

        $rtuf_in_market = [];
        $i = 0;
        foreach($fs_responses as $response){
            $rtuf_in_market[$i] = $response->seller_at_home;
            $i++;
        }
        $sold = count( array_keys($rtuf_in_market, 1));
        $not_sold = count(array_keys($rtuf_in_market, 0));
        $sold_data = [$sold, $not_sold];

        $average_days =0;
        $i = 0;
        foreach($fs_responses as $response){
            $average_days += $response->days_in_treatment;
            $i++;
        }
         $average_days /= $i;
        return view('personnelstatistics')->with('data_one', $data_one)->with('data_two',$data_two)->with('data_three', $data_three)->with('sold_data',$sold_data)->with('average_days', $average_days);
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
        $response = FSQuestionaire::find($id);
        return view('fsresponsedetail')->with('response', $response);
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
