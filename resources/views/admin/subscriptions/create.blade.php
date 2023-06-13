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
                <form action="{{ route('admin.subscription.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <input class="form-control " type="hidden" name="status" id="status" value="1"/>
                            
                        </div>

                        <div class="form-group">
                            <label for="title">title <span class="m-l-5 text-danger"> *</span></label>
                            <select id=title class="form-control custom-select mt-15 @error('title') is-invalid @enderror" name="title">
                                <option value="basic">basic plan</option>
                                <option value="standard">standard plan</option>
                                <option value="premium">premium plan</option>
                            </select>
                            @error('title') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="price">price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price') }}"/>
                            @error('price') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label for="plan">plan <span class="m-l-5 text-danger"> *</span></label>
                            <select id=plan class="form-control custom-select mt-15 @error('plan') is-invalid @enderror" name="plan">
                                <option value="monthly">monthly</option>
                                <option value="yearly">yearly</option>
                            </select>
                            @error('plan') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="bio">Details</label>
                            <textarea class="ckeditor form-control @error('details') is-invalid @enderror " rows="4" name="details" id="details">{{ old('details') }}</textarea>
                            @error('details') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="link">link <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('link') is-invalid @enderror" type="text" name="link" id="link" value="{{ old('link') }}"/>
                            @error('link') {{ $message }} @enderror
                        </div>

                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Home</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.subscription.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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