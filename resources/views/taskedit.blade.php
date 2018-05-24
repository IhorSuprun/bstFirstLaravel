@extends('layouts.app')
<!--создать соотв. папку и файлы в views(layouts\app.blade.php)-->
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!--создать соотв. папку и файлы в views(common\errors.blade.php)-->
    <!-- Форма новой задачи -->
    <form action="/tasksave/{{$editable_task_id}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Задача</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control" value="{{$editable_task_name}}">
<!--                TODO пересмотреть логику отправки id-->
                <input type="hidden" name="id" value="{{$editable_task_id}}"/>
            </div>
        </div>

        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Сохранить изменения
                </button>
            </div>
        </div>
    </form>
</div>

@endsection