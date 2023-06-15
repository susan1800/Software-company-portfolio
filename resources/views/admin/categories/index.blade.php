@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary pull-right">Add Category</a>
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
                            <th> title </th>
                            {{-- <th> subtitle </th> --}}
                            <th class="text-center">  </th>

                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                        @endphp
                        @foreach($categories as $category)

                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $category->title }}</td>
                                    {{-- <td>{{ $category->subtitle }}</td> --}}
                                    <td>{{ $category->cat }}</td>


                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.categories.disable', $category->id) }}" class="btn btn-sm btn-primary" style="@if($category->status == '0') background:red; @endif  margin:3px;"> <i class="fa fa-eye"></i></a>

                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-primary" style="margin:3px;"><i class="fa fa-edit"></i></a>

                                            {{-- <a href="{{ route('admin.categories.delete', $category->id) }}" class="btn btn-sm btn-danger" style="margin:3px;"><i class="fa fa-trash"></i></a> --}}
                                        </div>
                                    </td>
                                </tr>
                                @php
                                $i++;
                            @endphp
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
