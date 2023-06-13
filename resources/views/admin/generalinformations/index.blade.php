@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.generalinformations.create') }}" class="btn btn-primary pull-right">Add generalinformation</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead> 
                        <tr>
                            <th> # </th>
                            <th> Title </th>
                            <th> subtitle </th>
                            <th> Details </th>
                           
                            <th>link</th>
                            
                            <th>status</th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($generalInformations as $generalinformation)
                            @if ($generalinformation->id != 0)
                                <tr>
                                    <td>{{ $generalinformation->id }}</td>
                                    <td>{{ $generalinformation->title }}</td>
                                    <td>{{ $generalinformation->subtitle }}</td>
                                    <td>{{ $generalinformation->details }}</td>
                                   
                                    <td>{{ $generalinformation->link }}</td>
                                    
                                    <td>{{$generalinformation->status}}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.generalinformations.edit', $generalinformation->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.generalinformations.delete', $generalinformation->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
