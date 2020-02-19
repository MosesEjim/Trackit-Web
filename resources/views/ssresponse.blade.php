@extends('layouts.app')

@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Stock Status Questionaire Responses</strong>
                                <a href="ssquestioniares/statistics" class ="btn btn-success" >view statistics</a>
                            </div>
                            <div class="card-body">
                            
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Data Collector</th>
                                            <th>State</th>
                                            <th>Lga</th>
                                            <th>Time</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ss_responses as $response)
                                            <tr>
                                                <td>{{$response->name_of_data_collector}}</td>
                                                <td>{{$response->facility->state}}</td>
                                                <td>{{$response->facility->lga}}</td>
                                                <td>{{$response->created_at}}</td>
                                                <td><a type="button" class="btn btn-primary" href = "ssquestioniares/{{$response->id}}">View Details</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection