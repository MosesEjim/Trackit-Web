<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FSQuestionaire;
use App\Charts\stock;

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

        $correct_band1 = $fs_responses->where('describe_dosage1',1)->count();
        $wrong_band1 = $fs_responses->where('describe_dosage1',0)->count();

        $correct_band2 = $fs_responses->where('describe_dosage2', 1)->count();
        $wrong_band2 = $fs_responses->where('describe_dosage2', 0)->count();

        $correct_band3 = $fs_responses->where('describe_dosage3', 1)->count();
        $wrong_band3 = $fs_responses->where('describe_dosage3', 0)->count();
        
        $rtuf_sold = $fs_responses->where('seller_at_home',1)->count();
        $rtuf_not_sold = $fs_responses->where('seller_at_home',0)->count();

        $band1_Chart = new Stock();
        $band1_Chart->labels(['correct','wrong']);
        $band1_Chart->dataset('Band 1','pie',[$correct_band1,$wrong_band1]);

        $band2_Chart = new Stock();
        $band2_Chart->labels(['correct','wrong']);
        $band2_Chart->dataset('Band 2','pie',[$correct_band2,$wrong_band2]);

        $band3_Chart = new Stock();
        $band3_Chart->labels(['correct','wrong']);
        $band3_Chart->dataset('Band 3','pie',[$correct_band3,$wrong_band3]);

        $rtuf_chart = new Stock();
        $rtuf_chart->labels(['sold in market', 'not sold in market']);
        $rtuf_chart->dataset('rtuf','pie',[$rtuf_sold, $rtuf_not_sold]);
        
        $average_days = 0;
        $i = 0;
        foreach($fs_responses as $response){
            $average_days += $response->days_in_treatment;
            $i++;
        }
         $average_days /= $i;
        return view('personnelstatistics')
        ->with('band1_Chart', $band1_Chart)
        ->with('band2_Chart', $band2_Chart)
        ->with('band3_Chart', $band3_Chart)
        ->with('rtuf_chart', $rtuf_chart)
        ->with('average_days', $average_days);
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
        $facility = $response->facility;
        $location = [$response->longitude,$response->latitude];
        return view('fsresponsedetail')
        ->with('response', $response)
        ->with('facility', $facility)
        ->with('location', $location);
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
