<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FSQuestionaire;
use App\Facility;
use App\Collector;
class UsageApiController extends Controller
{
    public function store(Request $request)
    {

            $allUsers = Collector::all();
            $user = Collector::find($request->input('name_of_data_collector'));
            

            $ss_response = new FSQuestionaire();
            $ss_response->name_of_data_collector = $user->name;
            $ss_response->facility_id = $request->input('facility_id');
            $ss_response->protocol_book = $request->input('protocol_book');
            $ss_response->describe_dosage1 = $request->input('describe_dosage1');
            $ss_response->describe_dosage2 = $request->input('describe_dosage2');
            $ss_response->describe_dosage3 = $request->input('describe_dosage3');
            $ss_response->seller_at_home = $request->input('seller_at_home');
            $ss_response->frequency_of_distribution = $request->input('frequency_of_distribution');
            $ss_response->no_of_patient_charts = $request->input('no_of_patient_charts');
            $ss_response->sachets_dispensed = $request->input('sachets_dispensed');
            $ss_response->patient_entries_reviewed = $request->input('patient_entries_reviewed');
            $ss_response->child_weight_in_kg = $request->input('child_weight_in_kg');
            $ss_response->days_in_treatment = $request->input('days_in_treatment');
            $ss_response->child_recovered = $request->input('child_recovered');
            $ss_response->child_transfered = $request->input('child_transfered');
            $ss_response->final_weight_in_kg = $request->input('final_weight_in_kg');
            $ss_response->longitude = $request->input('longitude');
            $ss_response->latitude = $request->input('latitude');
            $facility = Facility::find($request->input('facility_id'));
            $ss_response->lga = $facility->lga;
            $ss_response->save();

            return response()->json($ss_response);
    }
}
