<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SSQuestionaire;
use App\HealthAvailability;
use App\Facility;
use App\WashAvailability;
use App\EductionAvailability;
use App\Collector;
class StockApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock = SSQuestionaire::all();
        return response()->json($stock);
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

            $allUsers = Collector::all();
            $user = Collector::find($request->input('name_of_data_collector'))
            

            $ss_response = new SSQuestionaire();
            $ss_response->name_of_data_collector = $user->name;
            $ss_response->facility_id = $request->input('facility_id');
            $ss_response->no_of_usable_RTUF = $request->input('no_of_usable_RTUF');
            $ss_response->usable_RTUF = $request->input('usable_RTUF');
            $ss_response->expired_RTUF = $request->input('expired_RTUF');
            $ss_response->damaged_RTUF = $request->input('damaged_RTUF');
            $ss_response->no_of_damaged_RTUF = $request->input('no_of_damaged_RTUF');
            $ss_response->sc_available = $request->input('sc_available');
            $ss_response->complete_sc_record = $request->input('complete_sc_record');
            $ss_response->stock_out_days = $request->input('stock_out_days');
            $ss_response->dispensed_RTUF_record = $request->input('dispensed_RTUF_record');
            $ss_response->record_of_distributed_RTUF = $request->input('record_of_distributed_RTUF');
            $ss_response->no_of_dispensed_RTUF = $request->input('no_of_dispensed_RTUF');
            $ss_response->longitude = $request->input('longitude');
            $ss_response->latitude = $request->input('latitude');
            $facility = Facility::find($request->input('facility_id'));
            $ss_response->lga = $facility->lga;
            $ss_response->save();

            return response()->json($ss_response);
    }

    public function healthStore(Request $request){
        $avail_response = new HealthAvailability();
        $avail_response->name_of_data_collector = $request->input('name_of_data_collector');
        $avail_response->facility_id = $request->input('facility_id');
        $avail_response->no_of_usable_RTUF = $request->input('no_of_usable_RTUF');
        $avail_response->usable_RTUF = $request->input('usable_RTUF');
        $avail_response->expired_RTUF = $request->input('expired_RTUF');
        $avail_response->damaged_RTUF = $request->input('damaged_RTUF');
        $avail_response->no_of_damaged_RTUF = $request->input('no_of_damaged_RTUF');
        $avail_response->sc_available = $request->input('sc_available');
        $avail_response->complete_sc_record = $request->input('complete_sc_record');
        $avail_response->stock_out_days = $request->input('stock_out_days');
        $avail_response->dispensed_RTUF_record = $request->input('dispensed_RTUF_record');
        $avail_response->record_of_distributed_RTUF = $request->input('record_of_distributed_RTUF');
        $avail_response->no_of_dispensed_RTUF = $request->input('no_of_dispensed_RTUF');
        $avail_response->longitude = $request->input('longitude');
        $avail_response->latitude = $request->input('latitude');
        $facility = Facility::find($request->input('facility_id'));
        $avail_response->lga = $facility->lga;
        $avail_response->save();

    }

    public function washStore(Request $request){
        $avail_response = new WashAvailability();
        $avail_response->name_of_data_collector = $request->input('name_of_data_collector');
        $avail_response->facility_id = $request->input('facility_id');
        $avail_response->no_of_usable_RTUF = $request->input('no_of_usable_RTUF');
        $avail_response->usable_RTUF = $request->input('usable_RTUF');
        $avail_response->expired_RTUF = $request->input('expired_RTUF');
        $avail_response->damaged_RTUF = $request->input('damaged_RTUF');
        $avail_response->no_of_damaged_RTUF = $request->input('no_of_damaged_RTUF');
        $avail_response->sc_available = $request->input('sc_available');
        $avail_response->complete_sc_record = $request->input('complete_sc_record');
        $avail_response->stock_out_days = $request->input('stock_out_days');
        $avail_response->dispensed_RTUF_record = $request->input('dispensed_RTUF_record');
        $avail_response->record_of_distributed_RTUF = $request->input('record_of_distributed_RTUF');
        $avail_response->no_of_dispensed_RTUF = $request->input('no_of_dispensed_RTUF');
        $avail_response->longitude = $request->input('longitude');
        $avail_response->latitude = $request->input('latitude');
        $facility = Facility::find($request->input('facility_id'));
        $avail_response->lga = $facility->lga;
        $avail_response->save();


    }
    public function educationStore(Request $request){
        
        $avail_response = new EductionAvailability();
        $avail_response->name_of_data_collector = $request->input('name_of_data_collector');
        $avail_response->facility_id = $request->input('facility_id');
        $avail_response->no_of_usable_RTUF = $request->input('no_of_usable_RTUF');
        $avail_response->usable_RTUF = $request->input('usable_RTUF');
        $avail_response->expired_RTUF = $request->input('expired_RTUF');
        $avail_response->damaged_RTUF = $request->input('damaged_RTUF');
        $avail_response->no_of_damaged_RTUF = $request->input('no_of_damaged_RTUF');
        $avail_response->sc_available = $request->input('sc_available');
        $avail_response->complete_sc_record = $request->input('complete_sc_record');
        $avail_response->stock_out_days = $request->input('stock_out_days');
        $avail_response->dispensed_RTUF_record = $request->input('dispensed_RTUF_record');
        $avail_response->record_of_distributed_RTUF = $request->input('record_of_distributed_RTUF');
        $avail_response->no_of_dispensed_RTUF = $request->input('no_of_dispensed_RTUF');
        $avail_response->longitude = $request->input('longitude');
        $avail_response->latitude = $request->input('latitude');
        $facility = Facility::find($request->input('facility_id'));
        $avail_response->lga = $facility->lga;
        $avail_response->save();

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
