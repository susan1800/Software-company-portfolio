@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
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
                <form action="{{ route('admin.abouts.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div style="display:flex;">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $targetAbout->title) }}"/>
                            <input type="hidden" name="id" value="{{ $targetAbout->id }}">
                            @error('title') {{ $message }} @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="phone">phone <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ old('phone', $targetAbout->phone) }}"/>
                            <input type="hidden" name="id" value="{{ $targetAbout->id }}">
                            @error('phone') {{ $message }} @enderror
                        </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label" for="bio">Details</label>
                            <textarea id="editor" class="ckeditor form-control @error('details') is-invalid @enderror " rows="4" name="details" id="details">{{ old('details', $targetAbout->details) }}</textarea>
                            @error('details') {{ $message }} @enderror
                        </div>

                        <div style="display: flex">
                            <div class="form-group col-md-6">
                            <label class="control-label" for="email">email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email', $targetAbout->email) }}"/>
                            <input type="hidden" name="id" value="{{ $targetAbout->id }}">
                            @error('email') {{ $message }} @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="location">Address <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('location') is-invalid @enderror" type="text" name="location" id="location" value="{{ old('location', $targetAbout->location) }}"/>
                            <input type="hidden" name="id" value="{{ $targetAbout->id }}">
                            @error('location') {{ $message }} @enderror
                        </div>
                        </div>
                        <div style="display: flex">
                            <div class="form-group col-md-6">
                            <label class="control-label" for="lat">latitude <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('lat') is-invalid @enderror" type="text" name="lat" id="lat" value="{{ old('lat', $targetAbout->lat) }}"/>
                            <input type="hidden" name="id" value="{{ $targetAbout->id }}">
                            @error('lat') {{ $message }} @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="long">longitude <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('long') is-invalid @enderror" type="text" name="long" id="long" value="{{ old('long', $targetAbout->long) }}"/>
                            <input type="hidden" name="id" value="{{ $targetAbout->id }}">
                            @error('long') {{ $message }} @enderror
                        </div>
                        </div>

                        <div style="display: flex">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="facebook">facebook </label>
                            <input class="form-control @error('facebook') is-invalid @enderror" type="text" name="facebook" id="facebook" value="{{ old('facebook', $targetAbout->facebook) }}"/>
                            <input type="hidden" name="id" value="{{ $targetAbout->id }}">
                            @error('facebook') {{ $message }} @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="twitter">twitter </label>
                            <input class="form-control @error('twitter') is-invalid @enderror" type="text" name="twitter" id="twitter" value="{{ old('twitter', $targetAbout->twitter) }}"/>
                            <input type="hidden" name="id" value="{{ $targetAbout->id }}">
                            @error('twitter') {{ $message }} @enderror
                        </div>
                        </div>

                        <div style="display: flex">
                            <div class="form-group col-md-6">
                            <label class="control-label" for="linkedin">linkedin </label>
                            <input class="form-control @error('linkedin') is-invalid @enderror" type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', $targetAbout->linkedin) }}"/>
                            <input type="hidden" name="id" value="{{ $targetAbout->id }}">
                            @error('linkedin') {{ $message }} @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="github">github </label>
                            <input class="form-control @error('github') is-invalid @enderror" type="text" name="github" id="github" value="{{ old('github', $targetAbout->github) }}"/>
                            <input type="hidden" name="id" value="{{ $targetAbout->id }}">
                            @error('github') {{ $message }} @enderror
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    @if ($targetAbout->image != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ asset('storage/'.$targetAbout->image) }}" id="image" class="img-fluid" alt="img">
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
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update About</button>
                        &nbsp;&nbsp;&nbsp;
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // $(document).ready(function () {
        //     $('.ckeditor').ckeditor();
        // });


        ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: {
            items: [
                'ckbox', 'uploadImage', '|',
                'exportPDF','exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: 'Welcome to CKEditor 5 + CKBox!',
        ckbox: {
            // The development token endpoint is a special endpoint to help you in getting started with
            // CKEditor Cloud Services.
            // Please note the development token endpoint returns tokens with the CKBox administrator role.
            // It offers unrestricted, full access to the service and will expire 30 days after being used for the first time.
            // -------------------------------------------------------------
            // !!! You should not use it on production !!!
            // -------------------------------------------------------------
            // Read more: https://ckeditor.com/docs/ckbox/latest/guides/configuration/authentication.html#token-endpoint

            // You need to provide your own token endpoint here
            tokenUrl: 'https://97696.cke-cs.com/token/dev/8J5vJkhvZHzZJmoqoIrxfyPWJMPAp2FT3MOd?limit=10'
        },
        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you red the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'EasyImage',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'FormatPainter',
            'SlashCommand',
            'TableOfContents',
            'Template',
            'DocumentOutline',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType
            'MathType'
        ]
    } )
    .then( /* ... */ )
    .catch( /* ... */ );


    </script>
@endsection
{{-- <script src="{{url('ckeditor/ckeditor.js')}}"></script> --}}
{{-- <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script> --}}


