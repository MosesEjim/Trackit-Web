<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SSQuestionaire;
use App\Charts\stock;
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
        $expired_rutf = $ss_responses->where('expired_RTUF',1)->count();
        $unexpired_rutf = $ss_responses->where('expired_RTUF',0)->count();

        $expired_rutf_chart = new stock;
        $expired_rutf_chart->labels(['Expired_RTUF','Unexpired_RTUF']);
        $expired_rutf_chart->dataset('percentage','pie',[$expired_rutf,$unexpired_rutf]);


        $stock_out_days = 0;
        $i = 0;
        foreach($ss_responses as $response){
            $stock_out_days += $response->stock_out_days;
            $i++;
        }
        $stock_out_days /= $i;

        
        $usable_rutf = $ss_responses->where('usable_RTUF',1)->count();
        $unusable_rutf = $ss_responses->where('usable_RTUF',0)->count();

        $usable_rutf_chart = new stock;
        $usable_rutf_chart->labels(['Usable_RTUF','Unusable_RTUF']);
        $usable_rutf_chart->dataset('percentage','pie',[$usable_rutf,$unusable_rutf]);


        return view('stockstatistics')->with('expired_rutf_chart', $expired_rutf_chart)
        ->with('stock_out_days', $stock_out_days)
        ->with('usable_rutf_chart', $usable_rutf_chart);
    }


    


    public function usableDetail(Request $request){

        if(count($request->all())){

            $ss_responses = SSQuestionaire::all();
            $filter_responses = $ss_responses->whereBetween('created_at',[$request->from,$request->to]);
            $usable = $filter_responses->where('usable_RTUF',1)->count();
            $unusable = $filter_responses->where('usable_RTUF',0)->count();

            $chart = new stock;
            $chart->labels(['Usable', 'Unusable']);
            $chart->dataset('My dataset', $request->chart_type, [$usable, $unusable])->color('#ffffff','#000000');

            return view('statisticsdetail')->with('chart', $chart);

        }else{

            $chart = new stock;
            $chart->labels(['2 days ago', 'Yesterday', 'Today']);
            $chart->dataset('My dataset', 'bar', [10, 40, 60]);
            $chart->dataset('second dataset', 'bar', [10, 60, 80]);
            return view('statisticsdetail')->with('chart', $chart);

        }
        
        

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
        $location = [$response->longitude,$response->latitude];
        return view('ssresponsedetail')->with('response',$response)->with('facility', $facility)->with('location',$location);
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
