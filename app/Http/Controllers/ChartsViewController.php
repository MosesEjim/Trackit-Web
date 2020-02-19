<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\SSQuestionaire;
use App\HealthAvailability;
use App\WashAvailability;
use App\EductionAvailability;
use App\Facility;
use App\Charts\stock;
use App\Lga;

class ChartsViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::all();
        return view('chartsview')->with('facilities', $facilities);
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
        $health_avail = HealthAvailability::All();
        $health_avail = $health_avail->where(lga, $request->lga);
        
    }


    public function statistics(Request $request){

        $facilities = Facility::all();
        $states = State::all();
        $lgas = Lga::all();
        $state = State::find(1);

        $expired_rutf_chart = new stock;   
        $expired_rutf_chart->labels(['Expired_RTUF','Unexpired_RTUF']);
        $stock_out_days_health = null;
        $stock_out_days_nutrition = null;
        $stock_out_days_education = null;
        $stock_out_days_wash = null;
        if(count($request->all())){
    
            if(!empty($request->input('health'))){
                $avail_responses = HealthAvailability::all();
                $facility_response =$avail_responses->where('lga','Bogoro');

                $health_expired_rutf = $facility_response->where('expired_RTUF',1)->count();
                $health_unexpired_rutf = $facility_response->where('expired_RTUF',0)->count();
                $expired_rutf_chart->dataset('health','bar',[$health_expired_rutf,$health_unexpired_rutf])->backgroundcolor('green');
                
                $i = 0;
                foreach($facility_response as $response){
                    $stock_out_days_health += $response->stock_out_days;
                    $i++;
                }
                $stock_out_days_health /= $i;
            }
            if(!empty($request->input('nutrition'))){
                $ss_responses = SSQuestionaire::all();
                $facility_response =$ss_responses->where('lga','Kanke');
                $expired_rutf = $facility_response->where('expired_RTUF',1)->count();
                $unexpired_rutf = $facility_response->where('expired_RTUF',0)->count();
                $expired_rutf_chart->dataset('nutrition','bar',[$expired_rutf,$unexpired_rutf])->backgroundcolor('orange');

                $i = 0;
                foreach($facility_response as $response){
                    $stock_out_days_nutrition += $response->stock_out_days;
                    $i++;
                }
                $stock_out_days_nutrition /= $i;
            }
            if(!empty($request->input('wash'))){
                $wash_responses = WashAvailability::all();
                $facility_response =$wash_responses->where('lga','Kanke');
                $expired_rutf = $facility_response->where('expired_RTUF',1)->count();
                $unexpired_rutf = $facility_response->where('expired_RTUF',0)->count();
                $expired_rutf_chart->dataset('wash','bar',[$expired_rutf,$unexpired_rutf])->backgroundcolor('blue');

                $i = 0;
                foreach($facility_response as $response){
                    $stock_out_days_wash += $response->stock_out_days;
                    $i++;
                }
                $stock_out_days_wash /= $i;
            }
            if(!empty($request->input('education'))){
                $education_responses = EductionAvailability::all();
                $facility_response =$education_responses->where('lga','Kanke');
                $expired_rutf = $facility_response->where('expired_RTUF',1)->count();
                $unexpired_rutf = $facility_response->where('expired_RTUF',0)->count();
                $expired_rutf_chart->dataset('education','bar',[$expired_rutf,$unexpired_rutf])->backgroundcolor('red');

                $i = 1;
                foreach($facility_response as $response){
                    $stock_out_days_education += $response->stock_out_days;
                    $i++;
                }
                $stock_out_days_education /= $i;
            }
        }else{
            $expired_rutf_chart->dataset('percentage','bar',[0,0]);
        }

        
    

        return view('chartsview')->with('expired_rutf_chart', $expired_rutf_chart)
        ->with('facilities', $facilities)
        ->with('states', $states)
        ->with('lgas', $lgas)
        ->with('stock_out_days_health',$stock_out_days_health)
        ->with('stock_out_days_education', $stock_out_days_education)
        ->with('stock_out_days_wash', $stock_out_days_wash)
        ->with('stock_out_days_nutrition', $stock_out_days_nutrition);
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
