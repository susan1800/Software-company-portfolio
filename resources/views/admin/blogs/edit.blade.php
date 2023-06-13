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
                <form action="{{ route('admin.blogs.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">

                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $targetBlog->title) }}"/>
                            <input type="hidden" name="id" value="{{ $targetBlog->id }}">
                            @error('title') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="subtitle">subtitle <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('subtitle') is-invalid @enderror" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $targetBlog->subtitle) }}"/>
                            @error('subtitle') {{ $message }} @enderror
                        </div>




                        <div class="form-group">
                            <label for="parent">Category <span class="m-l-5 text-danger"> *</span></label>
                            <select id=cat_id class="form-control custom-select mt-15 @error('cat_id') is-invalid @enderror" name="cat_id">
                                <option value="0">category</option>
                                @foreach($categories as $category)
                                    @if ($targetBlog->cat_id == $category->id)
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




                        {{-- <div class="form-group">
                            <label class="control-label" for="details">Details</label>
                            <textarea class="form-control @error('details') is-invalid @enderror" rows="4" name="details" id="details">{{ old('details', $targetBlog->details) }}</textarea>
                            @error('details') {{ $message }} @enderror
                        </div> --}}


                        <div class="form-group">
                            <label class="control-label" for="bio">Details</label>
                            <textarea class="ckeditor form-control @error('details') is-invalid @enderror " rows="4" name="details" id="details">{{ old('details', $targetBlog->details) }}</textarea>
                            @error('details') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="count">count <span class="m-l-5 text-danger"> </span></label>
                            <input class="form-control @error('count') is-invalid @enderror" type="text" name="count" id="count" value="{{ old('count', $targetBlog->count) }}"/>
                            @error('count') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="message_from_author">message_from_author <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('message_from_author') is-invalid @enderror" type="text" name="message_from_author" id="message_from_author" value="{{ old('message_from_author', $targetBlog->message_from_author) }}"/>
                            @error('message_from_author') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    @if ($targetBlog->image != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ asset('storage/'.$targetBlog->image) }}" id="pic" class="img-fluid" alt="img">
                                        </figure>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label class="control-label">Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                    @error('image') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Blog</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.blogs.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script src="{{url('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
