@extends('layout')

@section('content')
<h1>{{ $article->name }}</h1>
<hr>

<example-component />
@stop

@push('scripts')
<script type="text/javascript">
window.mojRiadokZDatabazy = {!! $article !!};
</script>
@endpush