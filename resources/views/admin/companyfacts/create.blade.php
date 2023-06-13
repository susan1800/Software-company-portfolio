@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.companyfacts.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            @error('title') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="number">number <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('number') is-invalid @enderror" type="number" name="number" id="number" value="{{ old('number') }}"/>
                            @error('number') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label for="cat_id">Category <span class="m-l-5 text-danger"> *</span></label>
                            <select id=cat_id class="form-control custom-select mt-15 @error('cat_id') is-invalid @enderror" name="cat_id">
                                <option value="0">Select a category</option>
                                @foreach($categories as $category)
                                @if(($category->status==1))
                                    <option value="{{ $category->id }}"> {{ $category->title }} </option>
                                    @endif
                                    @endforeach
                            </select>
                            @error('cat_id') {{ $message }} @enderror
                        </div>

                        
                    </div> 
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save facts</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.companyfacts.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
