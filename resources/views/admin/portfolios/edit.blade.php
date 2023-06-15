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
                <form action="{{ route('admin.portfolio.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">

                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $targetPortfolio->title) }}"/>
                            <input type="hidden" name="id" value="{{ $targetPortfolio->id }}">
                            @error('title') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="link">link <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('link') is-invalid @enderror" type="text" name="link" id="link" value="{{ old('link', $targetPortfolio->link) }}"/>
                            <input type="hidden" name="id" value="{{ $targetPortfolio->id }}">
                            @error('link') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label for="parent">Category <span class="m-l-5 text-danger"> *</span></label>
                            <select id=category_id class="form-control custom-select mt-15 @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="0">category</option>
                                @foreach($categories as $category)
                                    @if ($targetPortfolio->category_id == $category->id)
                                        <option value="{{ $category->id }}" selected> {{ $category->title }} </option>
                                    @else
                                    @if(($category->status==1))
                                        <option value="{{ $category->id }}"> {{ $category->title }} </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    @if ($targetPortfolio->image != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ asset('storage/'.$targetPortfolio->image) }}" id="pic" class="img-fluid" alt="img">
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
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Portfolio</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.portfolio.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
