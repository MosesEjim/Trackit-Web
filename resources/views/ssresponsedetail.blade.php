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
                    <div class="card" id = "map" style ="height:500px">
                        
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
                        <td>What is the physical count of usable (undamaged, unexpired) RUTF sachets today?
                        </td>
                        <td>{{$response->no_of_usable_RTUF}}</td>

                    </tr>
                    <tr>
                        <td>Is there usable RUTF in stock today?
                        </td>
                        @if($response->usable_RTUF==0)
                        <td>No</td>
                        @else
                        <td>Yes</td>
                        @endif


                    </tr>
                    <tr>
                        <td>Is there any RUTF at this facility that is expired as of today's visit?
                        </td>
                        @if($response->expired_RTUF==0)
                        <td>No</td>
                        @else
                        <td>Yes</td>
                        @endif

                    </tr>
                    <tr>
                        <td>Is there any RUTF at this facility that is damaged as of today's visit? (sachet ripped,
                            perforated, opened, nibbled by pests, or otherwise damaged so as to be unusable)
                        </td>
                        @if($response->damaged_RTUF==0)
                        <td>No</td>
                        @else
                        <td>Yes</td>
                        @endif

                    </tr>
                    <tr>
                        <td>What is the physical count of unusable (damaged or expired) RUTF sachets today?
                        </td>

                        <td>{{$response->no_of_damaged_RTUF}}</td>

                    </tr>
                    <tr>
                        <td>Is there a stock card or stock ledger for RUTF?
                        </td>

                        @if($response->sc_available==0)
                        <td>No</td>
                        @else
                        <td>Yes</td>
                        @endif

                    </tr>
                    <tr>
                        <td>Does the stock card or stock ledger have complete records for the past 3 months?
                        </td>
                        @if($response->complete_sc_record==0)
                        <td>No</td>
                        @else
                        <td>Yes</td>
                        @endif
                    </tr>
                    <tr>
                        <td>According to the stock card or stock ledger how many days in the last three months has RUTF been
                            stocked out?
                        </td>
                        <td>{{$response->stock_out_days}}</td>
                    </tr>
                    <tr>
                        <td>Is there a register or tally that records how many sachets of RUTF were dispensed to
                            patients/caregivers? Can you show it to me?
                        </td>
                        @if($response->dispensed_RTUF_record==0)
                        <td>No</td>
                        @else
                        <td>Yes</td>
                        @endif

                    </tr>
                    <tr>
                        <td>If there is a register or tally card, does it contain complete records of RUTF distributed to
                            patients/caregivers for the most recent three months? If there is no register or tally card,
                            does the stock card or stock ledger contain complete records of RUTF removed from stock or
                            distributed to patients/caregivers for the most recent three months?
                        </td>

                        @if($response->record_of_distributed_RTUF==0)
                        <td>No</td>
                        @else
                        <td>Yes</td>
                        @endif
                    </tr>
                    <tr>
                        <td>According to the tally, what quantity of RUTF was dispensed to patients/caregivers from this
                            site during the most recent three months?
                        </td>
                        <td>{{$response->no_of_dispensed_RTUF}}</td>
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
     var location = @json($location);
     var longitude = parseFloat(location[0]);
     var latitude = parseFloat(location[1]);
    var uluru = {lat: latitude, lng: longitude};
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
     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIJ_DAysZsrQU-F3quMVuUJA7XpDum5A4&callback=initMap">
    </script>

@endsection
