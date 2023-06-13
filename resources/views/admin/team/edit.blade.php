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
                <form action="{{ route('admin.team.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">

                        <div class="form-group">
                            <label class="control-label" for="name">Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $targetTeam->name) }}"/>
                            <input type="hidden" name="id" value="{{ $targetTeam->id }}">
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="title">title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $targetTeam->title) }}"/>
                            @error('title') {{ $message }} @enderror
                        </div>



                        <div class="form-group">
                            <label class="control-label" for="facebook">Facebook <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('facebook') is-invalid @enderror" type="text" name="facebook" id="facebook" value="{{ old('facebook', $targetTeam->facebook) }}"/>
                            @error('facebook') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="github">github <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('github') is-invalid @enderror" type="text" name="github" id="github" value="{{ old('github', $targetTeam->github) }}"/>
                            @error('github') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="linkedin">Linkedin <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('linkedin') is-invalid @enderror" type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', $targetTeam->linkedin) }}"/>
                            @error('linkedin') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    @if ($targetTeam->image != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ asset('storage/'.$targetTeam->image) }}" id="image" class="img-fluid" alt="img">
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
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Team</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.team.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
