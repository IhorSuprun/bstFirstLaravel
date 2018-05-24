@extends('layouts.app')
<!--создать соотв. папку и файлы в views(layouts\app.blade.php)-->
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!--создать соотв. папку и файлы в views(common\errors.blade.php)-->
    <!-- Форма новой задачи -->
    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Задача</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>

        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Добавить задачу
                </button>
            </div>
        </div>
    </form>
</div>

@if (count($tasks) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Список задач
    </div>

    <div class="panel-body">
        <table class="table table-striped task-table">

            <!-- Заголовок таблицы -->
            <thead>
            <th>name</th>
            <th colspan="2">Action</th>
            </thead>

            <!-- Тело таблицы -->
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <!-- Имя задачи -->
                    <td class="table-text">
                        <div>{{ $task->name }}</div>
                    </td>

                    <td>
                        <form method="post" action="/task/{{$task->id}}">
                            {{ method_field('DELETE') }}

                            {{ csrf_field() }}
                            <button>
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
			<td>
                        <form method="post" action="/task/{{$task->id}}/edit">

                            {{ csrf_field() }}
                            <button type="submit">
                                <i class="fa fa-edit"></i>
                            </button>
                        </form>
			<td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection