@extends('layouts.app')
<!--создать соотв. папку и файлы в views(layouts\app.blade.php)-->
@section('content')
@if (count($news) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Список новостей
    </div>

    <div class="panel-body">
        <table class="table table-striped task-table">

            <!-- Заголовок таблицы -->
            <thead>
            <th>Новость</th>
	    <th>Дата создания|изменения</th>
            <th colspan="2">Действия</th>
            </thead>

            <!-- Тело таблицы -->
            <tbody>
                @foreach ($news as $newsItem)
                <tr>
                    <!-- Имя задачи -->
                    <td class="table-text">
                        <div><a href="/news/{{ $newsItem->id }}">{{ $newsItem->name }}</a></div>
                    </td>
		    <td>
			{{ $newsItem->created_at }}|{{ $newsItem->updated_at }}
		    </td>
		    
		    
                    <td>
                        <form method="post" action="/news/{{$newsItem->id}}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button>
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
		    <td>
			{{ csrf_field() }}
			<a href="/news/{{$newsItem->id}}/edit">
			    <i class="fa fa-edit"></i>
			</a>
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