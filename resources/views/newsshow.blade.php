@extends('layouts.app')
<!--создать соотв. папку и файлы в views(layouts\app.blade.php)-->
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
	{{ $newsItem->name }}
    </div>

    <div class="panel-body">
	{{ $newsItem->text }}
    </div>
</div>
@endsection