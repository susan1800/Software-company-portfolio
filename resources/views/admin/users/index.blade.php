@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
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
                            <th> name </th>
                            <th> email </th>
                            <th> image</th>
                            <th> status </th>
                            <th>Verified</th>
                             </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @if ($user->id != 0)
                                
                            <tr>
                            <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><img src="{{asset('storage/'. $user->image )}}"></td>
                                    
                                    <td>{{ $user->status}}</td>
                                    <th>
                                        @if($user->email_verified_at==null)
                                        <div style="color:red;">no</div>
                                        @endif
                                        @if($user->email_verified_at!=null)
                                        <div style="color:green;">Yes</div>
                                        @endif
                                    </th>
                                    
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
