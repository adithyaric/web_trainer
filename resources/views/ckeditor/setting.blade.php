{{-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> --}}
{{-- <script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script> --}}
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<link href="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/styles/dark.css') }}" rel="stylesheet">
<script src="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>

<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        
        //Code Snippets
        // extraPlugins: 'codesnippet',
        // codeSnippet_theme: 'monokai_sublime'
    };
</script>

<script>
    CKEDITOR.replace('editor', options);
</script>
