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
                <form action="{{ route('admin.blogs.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">

                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            <input class="form-control " type="hidden" name="status" id="status" value="1"/>
                            @error('title') {{ $message }} @enderror
                        </div>



                        <div class="form-group">
                            <label for="category_id">Category <span class="m-l-5 text-danger"> *</span></label>
                            <select id="category_id" class="form-control custom-select mt-15 @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                @if(($category->status==1))
                                    <option value="{{ $category->id }}"> {{ $category->title }} </option>
                                    @endif
                                    @endforeach
                            </select>
                            @error('category_id') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="bio">Details</label>
                            <textarea class="ckeditor form-control @error('details') is-invalid @enderror " rows="4" name="details" id="details">{{ old('details') }}</textarea>
                            @error('details') {{ $message }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label">Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                            @error('image') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Blogs</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.blogs.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

{{-- <script src="{{url('ckeditor/ckeditor.js')}}"></script> --}}
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( '.ckeditor' );
</script>
