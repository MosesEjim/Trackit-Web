@extends('layouts.app')

@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Facility Information</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                   
                                    <tbody>

                                        <tr>
                                            <td>Date Of visit</td>
                                            <td>{{$response->created_at}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Data Collector</td>
                                            <td>{{$response->name_of_data_collector}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Facility Name</td>
                                            <td>{{$response->facility->facility_name}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Facility Code</td>
                                            <td>{{$response->facility->facility_id}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Facility Type</td>
                                            @if($response->facility->facility_type==1)
                                            <td>Hospital</td>
                                            @elseif($response->facility->facility_type==2)
                                            <td>Health Center</td>
                                            @elseif($response->facility->facility_type==3)
                                            <td>Therapeutic Feeding unit</td>
                                            @endif
                                            
                                        </tr>
                                        <tr>
                                            <td>Facility Operated By</td>

                                            @if($response->facility->facility_operator==1)
                                            <td>Government</td>
                                            @elseif($response->facility->facility_operator==2)
                                            <td>NGO</td>
                                            @elseif($response->facility->facility_operator==3)
                                            <td>UNICEF</td>
                                            @elseif($response->facility->facility_operator==4)
                                            <td>Private</td>
                                            @elseif($response->facility->facility_operator==5)
                                            <td>Faith-based organization</td>
                                            @endif
                                            
                                            
                                        </tr>
                                        <tr>
                                            <td>State </td>
                                            <td>{{$response->facility->state}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>LGA</td>
                                            <td>{{$response->facility->lga}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Name Of Facility Respondent</td>
                                            <td>{{$response->facility->facility_respondent}}</td>
                                            
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div  id = "map">
                            <h1>Hello</h1>
                        </div>
                    </div>
                </div>
                
            </div><!-- .animated -->
        </div><!-- .content -->

    <div class="content mt-3">

        <div class="col-sm-6 col-lg-12">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Questions</th>
                        <th>Response</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Do you have the treatment protocol book/guidelines/job aid? Can you show it to me?
                        </td>
                        @if($response->protocol_book==0)
                        <td>No</td>
                        @else
                        <td>Yes</td>
                        @endif

                    </tr>
                    <tr>
                        <td>Can you describe the national dosage guidelines for me? How much should you prescribe for [band
                            1]?
                        </td>
                        @if($response->describe_dosage1==0)
                        <td>No</td>
                        @else
                        <td>Yes</td>
                        @endif


                    </tr>
                    <tr>
                        <td>Can you describe the national dosage guidelines for me? How much should you prescribe for [band
                            2]?
                        </td>
                        @if($response->describe_dosage2==0)
                        <td>No</td>
                        @else
                        <td>Yes</td>
                        @endif

                    </tr>
                    <tr>
                        <td>Can you describe the national dosage guidelines for me? How much should you prescribe for [band
                            3]?
                        </td>
                        @if($response->describe_dosage3==0)
                        <td>No</td>
                        @else
                        <td>Yes</td>
                        @endif

                    </tr>
                    <tr>
                        <td>Have you seen or heard of anyone selling or exchanging RUTF at home or in the local market?
                        </td>

                        @if($response->seller_at_home==0)
                        <td>No</td>
                        @else
                        <td>Yes</td>
                        @endif



                    </tr>
                    <tr>
                        <td>What is the frequency of scheduled distributions at this health center?
                        </td>

                        @if($response->frequency_of_distribution==1)
                        <td>Weekly</td>
                        @elseif($response->frequency_of_distribution==2)
                        <td>Bi-Weekly</td>
                        @else
                        <td>Others</td>
                        @endif

                    </tr>
                    <tr>
                        <td>How many current patients' charts are you able to review at this facility today?
                        </td>
                        <td>{{$response->no_of_patient_charts}}</td>
                    </tr>
                    <tr>
                        <td>What was the child's weight as of the most recent entry on their chart?
                        </td>


                        <td>{{$response->child_weight}}</td>



                    </tr>
                    <tr>
                        <td>Number of sachets actually dispensed at most recent visit?
                        </td>
                        <td>{{$response->sachets_dispensed}}</td>
                    </tr>
                    <tr>
                        <td>How many patients' entries that completed treatment in the past three months are you able to
                            review today
                        </td>

                        <td>{{$response->patient_entries_reviewed}}</td>

                    </tr>
                    <tr>
                        <td>What was the child's weight on admission, in kilograms?
                        </td>

                        <td>{{$response->child_weight_in_kg}}</td>

                    </tr>
                    <tr>
                        <td>How many days was the child in treatment at this facility?
                        </td>

                        <td>{{$response->days_in_treatment}}</td>

                    </tr>
                    <tr>
                        <td>Was the child successfully discharged as cured/recovered from this facility?
                        </td>

                        @if($response->child_recovered==0)
                        <td>No</td>
                        @else
                        <td>Yes</td>
                        @endif


                    </tr>
                    <tr>
                        <td>If the Child did not recover, was the child transfered to another facility before the treatment
                            was completed?
                        </td>
                        @if($response->child_transfered==0)
                        <td>No</td>
                        @else
                        <td>Yes</td>
                        @endif


                    </tr>
                    <tr>
                        <td>What was the child's weight as of the final entry, in kilograms? (whether or not the child
                            completed treatment successfully)
                        </td>

                        <td>{{$response->final_weight_in_kg}}</td>

                    </tr>

                </tbody>
            </table>
        </div>

    </div>


@endsection

@section('js')
<script>
    // Initialize and add the map
    function initMap() {
    // The location of Uluru
    var uluru = {lat: -25.344, lng: 131.036};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 4, center: uluru});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: uluru, map: map});
    }
        </script>
        <!--Load the API from the specified URL
        * The async attribute allows the browser to render the page while the API loads
        * The key parameter will contain your own API key (which is not needed for this tutorial)
        * The callback parameter executes the initMap() function
        -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>

@endsection