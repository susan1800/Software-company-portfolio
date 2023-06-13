@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.team.create') }}" class="btn btn-primary pull-right">Add Member</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body table-responsive">
                    <table class="table table-hover table-bordered " id="sampleTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> title </th>
                            <th> Social link </th>

                            <th> image </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teams as $team)
                            @if ($team->id != 0)
                                <tr>
                                    <td>{{ $team->id }}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->title }}</td>
                                    <td><a href="{{$team->facebook}}" style="padding:5px;"> <i class="fa fa-facebook" ></i></a> <a href="{{$team->linkedin}}" style="padding:5px;"><i class="fa fa-linkedin" ></i></a><a href="{{$team->github}}" style="padding:5px;"> <i class="fa fa-github"></i></a></td>

                                    <td><img src="{{asset('storage/'.$team->image) }}" height="100" width="auto"></td>

                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.team.edit', $team->id) }}" class="btn btn-sm btn-primary" style="margin:3px;"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.team.delete', $team->id) }}" class="btn btn-sm @if($team->status == '1') btn-primary @else btn-danger @endif" style="margin:3px;"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js')}}') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js')}}') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
