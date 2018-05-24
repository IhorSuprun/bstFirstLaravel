@extends('layouts.app')
<!--создать соотв. папку и файлы в views(layouts\app.blade.php)-->
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!--создать соотв. папку и файлы в views(common\errors.blade.php)-->
    <!-- Форма новой задачи -->
    <form action="{{ url('news/store') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Новость</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control" placeholder="name">
		<textarea name="text" id="task-text" class="form-control" placeholder="text"></textarea>
<!--		<input type="text" name="text" id="task-text" class="form-control" placeholder="text">-->
            </div>
        </div>

        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Добавить новость
                </button>
            </div>
        </div>
    </form>
</div>
@endsection