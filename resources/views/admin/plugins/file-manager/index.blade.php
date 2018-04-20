@extends('admin.layout.master')

@section('title', 'File Manager')

@section('content')
    <div class="panel panel-default primary-container">
        <div class="panel-heading">File Manager</div>

        <div class="panel-body">
            <object data="{{ asset('vendor/file-browser/index-BS0uFniDw1vRuAhsMLs5f54qagb7aNYj.html') }}" type="text/html" style="min-width: 100%; max-width: 100%; border:none; overflow: hidden; height: 75vh;" onload="resizeIframe(this);" height="100%" width="100%">

                <embed src="{{ asset('vendor/file-browser/index-BS0uFniDw1vRuAhsMLs5f54qagb7aNYj.html') }}" style="min-width: 100%; max-width: 100%; border:none; overflow: hidden; height: 75vh;" onload="resizeIframe(this);" height="100%" width="100%"></embed>
            </object>

            <script language="javascript" type="text/javascript">
                function resizeIframe(obj) {
                    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
                }
            </script>
        </div>
    </div>
@endsection