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
                <form action="{{ route('admin.generalinformations.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf 
                    <div class="tile-body">

                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $targetGeneralInformation->title) }}"/>
                            <input type="hidden" name="id" value="{{ $targetGeneralInformation->id }}">
                            @error('title') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="subtitle">subtitle <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('subtitle') is-invalid @enderror" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $targetGeneralInformation->subtitle) }}"/>
                            @error('subtitle') {{ $message }} @enderror
                        </div>
                        


                        <div class="form-group">
                            <label class="control-label" for="details">Details</label>
                            <textarea class=" ckeditor form-control @error('details') is-invalid @enderror" rows="4" name="details" id="details">{{ old('details', $targetGeneralInformation->details) }}</textarea>
                            @error('details') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="link">link <span class="m-l-5 text-danger"> </span></label>
                            <input class="form-control @error('link') is-invalid @enderror" type="text" name="link" id="link" value="{{ old('link', $targetGeneralInformation->link) }}"/>
                            @error('link') {{ $message }} @enderror
                        </div>

                      
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Blog</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.generalinformations.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
