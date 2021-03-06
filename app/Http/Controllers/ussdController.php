<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\Lga;
use App\Category;
use App\Facility;
use App\FIQuestionaire;
use App\SSQuestionaire;
use App\FSQuestionaire;

class ussdController extends Controller
{
    
     
    static $facilities;
    static $facility_types;
    static $facility_org;
    static $states;
    

    public function onlineUssdMenu(Request $request)
    {
       
       
       $facilities = Facility::all();
       $states = State::all();
       $lgas = Lga::all();
       $facility_types = ["Hospital","Health Center","Therapeutic Feeding unit"];
       $facility_org = ["Government","NGO","UNICEF","Private","Faith-based 
        organization"];

       $sessionId   = $request->get('sessionId');
       $serviceCode = $request->get('serviceCode');
       $phoneNumber = $request->get('phoneNumber');
       $text        = $request->get('text');
        // use explode to split the string text response from Africa's talking gateway into an array.
        $ussd_string_exploded = explode("*", $text);
        // Get ussd menu level number from the gateway
        $level = count($ussd_string_exploded);
        if ($text == "") {
            // first response when a user dials our ussd code
           
            $response  = "CON Welcome \n";
            $response .= "1. Add a facility \n";
            $response .= "2. Facility Personnel Questioniare\n";
            $response .= "3. Stock Status Questioniare \n";
            $response .= "4. Storage Condition Questioniare \n";
            
            
           
            
        }
        
        elseif ($level == "1" && $ussd_string_exploded[0] == "1") {
            

            $response = "CON Enter Facility Name \n";
            
            
        }
        elseif ($level == "2" && $ussd_string_exploded[0] == "1") {
            

            $response = "CON Enter facility Code \n";
        }
        elseif ($level =="3" && $ussd_string_exploded[0] == "1") {
           
            $response = "CON Please Select Facility type \n";
            $number = 1;
            foreach($facility_types as $type){
                $response .= $number.". ".$type."\n";
                $number++;
            }
        }
        elseif ($level == "4" && $ussd_string_exploded[0] == "1") {
           
            $response = "CON Facility is Operated by which Organisation \n";
            $number = 1;
            foreach($facility_org as $org){
                $response .= $number.". ".$org."\n";
                $number++;
            }
        }
        elseif ($level == "5" && $ussd_string_exploded[0] == "1") {
            
            $response = "CON Please Select State \n";
            $number = 1;
            
            foreach($states as $state){
                $response .= $number.". ".$state->state_name."\n";
                $number++;
            }
        }
        elseif ($level == "6" && $ussd_string_exploded[0] == "1") {
            $selected_state = $states[(int)$ussd_string_exploded[5]-1];
            
           
            $response = "CON Please Select Local Government area \n";
            $number = 1;
           
            $lgas = $selected_state->lgas;
            foreach($lgas as $lga){
                $response .= $number.". ".$lga->lga_name."\n";
                $number++;
            }
        }
        elseif ($level == "7" && $ussd_string_exploded[0] == "1") {
           
            
            
            $response = "CON Enter name and Title of health facility respondent".count($lgas);
        }
       
        elseif ($level == "8" && $ussd_string_exploded[0] == "1") {
            $facility_info = new Facility();
            $facility_info->facility_name = $ussd_string_exploded[1];
            $facility_info->facility_id = $ussd_string_exploded[2];
            $facility_info->facility_type = $ussd_string_exploded[3];
            $facility_info->facility_operator = $ussd_string_exploded[4];

            $selected_state = $states[(int)$ussd_string_exploded[5]-1];
            $facility_info->state = $selected_state->state_name;
            //$facility_info->state_code = $selected_state->state_code;

            $lgas = $selected_state->lgas;
            $selected_lga = $lgas[(int)$ussd_string_exploded[6]-1];
            $facility_info->lga = $selected_lga->lga_name;
           //$facility_info->lga_code = $selected_lga->lga_code;

            $facility_info->facility_respondent = $ussd_string_exploded[7];
            $facility_info->save();
            $response = "END Faciity Information Captured Successfully.";
            
        }
        elseif ($level =="1" && $ussd_string_exploded[0]  == "2") {
           
            $response = "CON Enter data Collector Name";
        }
        elseif ($level =="2" && $ussd_string_exploded[0]  == "2") {
           
            $response = "CON Enter The Facility_code of Facility You are Collecting Data From";
        }
        elseif ($level =="3" && $ussd_string_exploded[0]  == "2") {
           
            $response = "CON Do you have the treatment protocol book/guidelines/job aid? Can you show it to me? \n (yes = 1, no = 0)";
        }
        
        elseif ($level =="4" && $ussd_string_exploded[0] == "2") {
           
            $response = "CON Can you describe the national dosage guidelines for me? How much should you prescribe for [band 1]? \n (yes = 1, no = 0)";
        }
        elseif ($level =="5" && $ussd_string_exploded[0] == "2") {
           
            $response = "CON Can you describe the national dosage guidelines for me? How much should you prescribe for [band 2]? \n (yes = 1, no = 0)";
        }
        elseif ($level =="6" && $ussd_string_exploded[0] == "2") {
           
            $response = "CON Can you describe the national dosage guidelines for me? How much should you prescribe for [band 3]? \n (yes = 1, no = 0)";
        }
        elseif ($level =="7" && $ussd_string_exploded[0] == "2") {
           
            $response = "CON Have you seen or heard of anyone selling or exchanging RUTF at home or in the local market? \n (yes = 1, no = 0)";
        }
        elseif ($level =="8" && $ussd_string_exploded[0] == "2") {
            
            $response = "CON What is the frequency of scheduled distributions at this health center? \n 1. Weekly \n 2. Bi-weekly \n 3. Other";
        }
        elseif ($level =="9" && $ussd_string_exploded[0] == "2") {
           
            $response = "CON How many current patients' charts are you able to review at this facility today?";
        }
        elseif ($level =="10" && $ussd_string_exploded[0] == "2") {
           
            $response = "CON What was the child's weight as of the most recent entry on their chart?";
        }
        elseif ($level =="11" && $ussd_string_exploded[0] == "2") {
           
            $response = "CON Number of sachets actually dispensed at
            most recent visit?";
        }
        elseif ($level =="12" && $ussd_string_exploded[0] == "2") {
           
            $response = "CON How many patients' entries that completed treatment in the past three months are you able to review today?";
        }
        elseif ($level =="13" && $ussd_string_exploded[0] == "2") {
           
            $response = "CON What was the child's weight on admission, in kilograms?";
        }
        elseif ($level =="14" && $ussd_string_exploded[0] == "2") {
           
            $response = "CON How many days was the child in treatment at this facility?";
        }
        elseif ($level =="15" && $ussd_string_exploded[0] == "2") {
           
            $response = "CON Was the child successfully discharged as cured/recovered from this facility? \n (yes = 1, no = 0)";
        }
        elseif ($level =="16" && $ussd_string_exploded[0] == "2") {
           
            $response = "CON If the Child did not recover, was the child transfered to another facility before the treatment was completed??";
        }
        elseif ($level =="17" && $ussd_string_exploded[0] == "2") {
           
            $response = "CON What was the child's weight as of the final entry, in kilograms? (whether or not the child completed treatment successfully)";
        }
        elseif ($level =="18" && $ussd_string_exploded[0] == "2") {
            $fs_response = new FSQuestionaire();
            $fs_response->name_of_data_collector = $ussd_string_exploded[1];
            $fs_response->facility_id = $ussd_string_exploded[2];
            $fs_response->protocol_book = $ussd_string_exploded[3];
            $fs_response->describe_dosage1 = $ussd_string_exploded[4];
            $fs_response->describe_dosage2 = $ussd_string_exploded[5];
            $fs_response->describe_dosage3 = $ussd_string_exploded[6];
            $fs_response->seller_at_home = $ussd_string_exploded[7];
            $fs_response->frequency_of_distribution = $ussd_string_exploded[8];
            $fs_response->no_of_patient_charts = $ussd_string_exploded[9];
            $fs_response->child_weight = $ussd_string_exploded[10];
            $fs_response->sachets_dispensed = $ussd_string_exploded[11];
            $fs_response->patient_entries_reviewed = $ussd_string_exploded[12];
            $fs_response->child_weight_in_kg = $ussd_string_exploded[13];
            $fs_response->days_in_treatment = $ussd_string_exploded[14];
            $fs_response->child_recovered = $ussd_string_exploded[15];
            $fs_response->child_transfered = $ussd_string_exploded[16];
            $fs_response->final_weight_in_kg = $ussd_string_exploded[17];
            $fs_response->save();

            $response = "END Your data has been captured successfully! Thank you for Completing This Questionaire";
        }
        elseif ($level =="1" && $ussd_string_exploded[0] == "3") {
           
            $response = "CON Enter name of Data Collector";
        }
        elseif ($level =="2" && $ussd_string_exploded[0] == "3") {
           
            $response = "CON Enter Facility-code of the facility you are collecting data from";
        }
        elseif ($level =="3" && $ussd_string_exploded[0] == "3") {
           
            $response = "CON What is the physical count of usable (undamaged, 
            unexpired) RUTF sachets today?";
        }
        
        elseif ($level =="4" && $ussd_string_exploded[0] == "3") {
           
            $response = "CON Is there usable RUTF in stock today? \n (yes = 1, no = 0)";
        }
        elseif ($level =="5" && $ussd_string_exploded[0] == "3") {
           
            $response = "CON Is there any RUTF at this facility that is expired as of 
            today's visit? \n (yes = 1, no = 0)";
        }
        elseif ($level =="6" && $ussd_string_exploded[0] == "3") {
           
            $response = "CON Is there any RUTF at this facility that is damaged as of 
            today's visit? (sachet ripped, perforated, opened, 
            nibbled by pests, or otherwise damaged so as to be 
            unusable) \n (yes = 1, no = 0)";
        }
        elseif ($level =="7" && $ussd_string_exploded[0] == "3") {
           
            $response = "CON What is the physical count of unusable (damaged or 
            expired) RUTF sachets today?";
        }
        elseif ($level =="8" && $ussd_string_exploded[0] == "3") {
            
            $response = "CON Is there a stock card or stock ledger for RUTF? \n (yes = 1, no = 0)";
        }
        elseif ($level =="9" && $ussd_string_exploded[0] == "3") {
           
            $response = "CON Does the stock card or stock ledger have complete 
            records for the past 3 months? \n (yes = 1, no = 0)";
        }
        elseif ($level =="10" && $ussd_string_exploded[0] == "3") {
           
            $response = "CON According to the stock card or stock ledger how 
            many days in the last three months has RUTF been 
            stocked out?";
        }
        elseif ($level =="11" && $ussd_string_exploded[0] == "3") {
           
            $response = "CON Is there a register or tally that records how many 
            sachets of RUTF were dispensed to 
            patients/caregivers? Can you show it to me? \n (yes = 1, no = 0)";
        }
        elseif ($level =="12" && $ussd_string_exploded[0] == "3") {
           
            $response = "CON If there is a register or tally card, does it contain 
            complete records of RUTF distributed to 
            patients/caregivers for the most recent three 
            months? \n (yes = 1, no = 0)";
        }
        elseif ($level =="13" && $ussd_string_exploded[0] == "3") {
           
            $response = "CON According to the tally, what quantity of RUTF was 
            dispensed to patients/caregivers from this site during 
            the most recent three months?";
        }
        elseif ($level =="14" && $ussd_string_exploded[0] == "3") {
            $ss_response = new SSQuestionaire();
            $ss_response->name_of_data_collector = $ussd_string_exploded[1];
            $ss_response->facility_id = $ussd_string_exploded[2];
            $ss_response->no_of_usable_RTUF = $ussd_string_exploded[3];
            $ss_response->usable_RTUF = $ussd_string_exploded[4];
            $ss_response->expired_RTUF = $ussd_string_exploded[5];
            $ss_response->damaged_RTUF = $ussd_string_exploded[6];
            $ss_response->no_of_damaged_RTUF = $ussd_string_exploded[7];
            $ss_response->sc_available = $ussd_string_exploded[8];
            $ss_response->complete_sc_record = $ussd_string_exploded[9];
            $ss_response->stock_out_days = $ussd_string_exploded[10];
            $ss_response->dispensed_RTUF_record = $ussd_string_exploded[11];
            $ss_response->record_of_distributed_RTUF = $ussd_string_exploded[12];
            $ss_response->no_of_dispensed_RTUF = $ussd_string_exploded[13];
            $ss_response->save();

            $response = "END Your data has been captured successfully! Thank you for Completing This Questionaire";
        }
        header('Content-type: text/plain');
        echo $response;
    }
}
