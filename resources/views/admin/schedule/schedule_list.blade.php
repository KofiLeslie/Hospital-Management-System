@extends('layouts.app')
@section('title') Schedule | HMS @endsection
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Schedule</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <a href="{{route('schedule.create')}}">
          <button style="margin-left: 168px;" class="btn btn-round btn-primary btn-sm">Add New</button>
          </a>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Schedule list</h2>
          
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Sl</th>
                        <th>Doctor Name</th>
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($schedule as $key => $value)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                            @php $doc_name = collect($doctor)->where('doc_id', $value->sd_d_id)->first() @endphp
                            {{ $doc_name->doc_name }}
                        </td>
                        <td>{{ $value->sd_available_days }}</td>
                        <td>{{ $value->sd_start_time }}</td>
                        <td>{{ $value->sd_end_time }}</td>
                        <td>{{ $value->sd_status }}</td>
                        <td>
                          <a method="GET" href="{{route('schedule.edit', $value->sd_id)}}">
                            <button class="btn btn-btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></button>
                          </a>
                          <form method="POST" action="{{route('schedule.destroy', $value->sd_id)}}">
                            @csrf @method("DELETE")
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-sm pull-right" style="margin-top: -36px;"><i class="fa fa-trash-alt"></i></button>
                          </form>
                        </td>
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
    </div>
  </div>
</div>
@endsection
