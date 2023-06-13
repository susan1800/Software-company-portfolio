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
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.settings.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf

                        <div class="tile-body">


<div style="display:flex;">

                            <div class="form-group col-md-12">
                                <label class="control-label" for="page_title">Website title <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('page_title') is-invalid @enderror" type="text" name="page_title" id="page_title" value="{{ old('page_title', $targetsetting->page_title) }}"/>

                                @error('page_title') {{ $message }} @enderror
                            </div>
                        </div>



<input type="hidden" name="id" value="{{$targetsetting->id}}">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label class="control-label">Logo</label>
                                        <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo"/>
                                        @error('logo') {{ $message }} @enderror
                                    </div>
                                    <div class="col-md-4">
                                        @if ($targetsetting->logo != null)
                                            <figure class="mt-2" style="width: 80px; height: auto;">
                                                <img src="{{ asset('storage/'.$targetsetting->logo) }}" id="pic" class="img-fluid" alt="img">
                                            </figure>
                                        @endif
                                    </div>

                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label class="control-label">Icon</label>
                                        <input class="form-control @error('fav_icon') is-invalid @enderror" type="file" id="fav_icon" name="fav_icon"/>
                                        @error('fav_icon') {{ $message }} @enderror
                                    </div>
                                    <div class="col-md-4">
                                        @if ($targetsetting->fav_icon != null)
                                            <figure class="mt-2" style="width: 80px; height: auto;">
                                                <img src="{{ asset('storage/'.$targetsetting->fav_icon) }}" id="pic" class="img-fluid" alt="img">
                                            </figure>
                                        @endif
                                    </div>

                                </div>
                            </div>


                            <div style="display:inline-flex;" class="col-md-12">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="bio">Meta Tags</label>
                                    <textarea class=" form-control @error('meta') is-invalid @enderror " rows="4" name="meta" id="meta">{{ old('meta', $targetsetting->meta) }}</textarea>
                                    @error('meta') {{ $message }} @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="bio">Meta Description</label>
                                    <textarea class=" form-control @error('meta_description') is-invalid @enderror " rows="4" name="meta_description" id="meta_description">{{ old('meta_description', $targetsetting->meta_description) }}</textarea>
                                    @error('meta_description') {{ $message }} @enderror
                                </div>
                            </div>







                        </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Setting</button>

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
