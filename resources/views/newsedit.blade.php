@extends('layouts.app')
<!--создать соотв. папку и файлы в views(layouts\app.blade.php)-->
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!--создать соотв. папку и файлы в views(common\errors.blade.php)-->
    <!-- Форма новой задачи -->
    <form action="/news/{{$newsItem->id}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
	{{ method_field('PUT') }}
        <!-- Имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Новость</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control" value="{{$newsItem->name}}">
<!--		<input type="text" name="text" id="task-name" class="form-control" value="{{$newsItem->text}}">-->
		<textarea name="text" id="task-text" class="form-control" placeholder="text">{{$newsItem->text}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-save"></i> Сохранить изменения
                </button>
            </div>
        </div>
    </form>
</div>

@endsection