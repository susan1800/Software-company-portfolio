@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary pull-right">Add Testimonial</a>
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
                            <th> Name </th>
                            <th> Title </th>
                            <th> Details </th>
                            <th> Image </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($testimonials as $testimonial)
                            @if ($testimonial->id != 0)
                                <tr>
                                    <td>{{ $testimonial->id }}</td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->title }}</td>
                                    <td>{{ $testimonial->details }}</td>
                                    <td><img src="{{ asset('storage/'.$testimonial->image) }}"  height="100" width="auto" alt="img"></td>

                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}" class="btn btn-sm btn-primary" style="margin:3px"><i class="fa fa-edit" ></i></a>
                                            <a href="{{ route('admin.testimonial.delete', $testimonial->id) }}" class="btn btn-sm @if($testimonial->status == '1') btn-primary @else btn-danger @endif" style="margin:3px"><i class="fa fa-eye"></i></a>
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
