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
                <form action="{{ route('admin.companyfacts.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $targetcompanyFact->title) }}"/>
                            <input type="hidden" name="id" value="{{ $targetcompanyFact->id }}">
                            @error('title') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="number">number <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('number') is-invalid @enderror" type="number" name="number" id="number" value="{{ old('number', $targetcompanyFact->number) }}"/>
                            <input type="hidden" name="id" value="{{ $targetcompanyFact->id }}">
                            @error('number') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label for="parent">Category <span class="m-l-5 text-danger"> *</span></label>
                            <select id=category_id class="form-control custom-select mt-15 @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="0">category</option>
                                @foreach($categories as $category)
                                    @if ($targetcompanyFact->category_id == $category->id)
                                        <option value="{{ $category->id }}" selected> {{ $category->title }} </option>
                                    @else
                                    @if(($category->status==1))
                                        <option value="{{ $category->id }}"> {{ $category->title }} </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                            @error('user_id') {{ $message }} @enderror
                        </div>


                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update facts</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.companyfacts.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
