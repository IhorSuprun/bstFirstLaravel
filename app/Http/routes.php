<?php

use App\Task;
use App\News;
use Illuminate\Http\Request;

/**
 * Вывести панель с задачами
 */
Route::get('/', function () {
    //получить все задачи
    $tasks = Task::all();
    return view('tasks', [
        'tasks' => $tasks
    ]);
})->name('show_all_tasks');

/**
 * Добавить новую задачу
 */
Route::post('/task', function (Request $request) {
    //проверка данных 
    $validator = Validator::make($request->all(), [
                'name' => 'required|min:5|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
                        ->withInput()
                        ->withErrors($validator);
    }
    $task = new Task();
    $task->name = $request->name;
    $task->save();
    return redirect('/');
});

/**
 * Удалить задачу
 */
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return redirect('/');
});

/**
 * Форма редактирования
 */
Route::post('/task/{task}/edit', function (Task $task) {
    return view('taskedit')->with([
                'editable_task_id' => $task->id,
                'editable_task_name' => $task->name
    ]);
});

/**
 * Сохранение изменений
 */
Route::post('/tasksave/{task}', function (Request $request) {
    $validator = Validator::make($request->all(), [
                'name' => 'required|min:5|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/task/{task}/edit')
                        ->withInput()
                        ->withErrors($validator);
    }
    $task= Task::find($request->id);
    $task->name = $request->name;
    $task->save();
    return redirect('/');
});



/**
 * Все новости
 */
Route::get('/news', function () {
    //получить все задачи
    $news = News::all();
    return view('news', [
        'news' => $news
    ]);
})->name('news.index');

/**
 * Добавление новости
 */
Route::get('/news/create', function () {
    $news = News::all();
    return view('newscreate', [
        'news' => $news
    ]);
})->name('news.create');


/**
 * Добавить новую новость
 */
Route::post('/news/store', function (Request $request) {
    //проверка данных 
    $validator = Validator::make($request->all(), [
                'name' => 'required|min:5|max:255',
    ]);

    if ($validator->fails()) {
        return redirect(route('news.index'))
                        ->withInput()
                        ->withErrors($validator);
    }
    $newsItem = new News();
    $newsItem->name = $request->name;
    $newsItem->text = $request->text;
    $newsItem->save();
    return redirect(route('news.index'));
})->name('news.store');

/**
 * Отобразить новость
 */
Route::get('/news/{newsItem}', function (News $newsItem) {
    return view('newsshow', [
        'newsItem' => $newsItem
    ]);
})->name('news.show');

/**
 * форма редактирования
 */
Route::get('/news/{newsItem}/edit', function(News $newsItem) {
    return view('newsedit', [
	'newsItem' => $newsItem,
    ]);
})->name('news.edit');

/**
 * сохранение изменений редактирования
 */
Route::put('/news/{newsItem}',function(News $newsItem, Request $request){
     $validator = Validator::make($request->all(), [
		'name' => 'required|min:5|max:255',
    ]);

    if ($validator->fails()) {
	return redirect(route('news.edit'))
			->withInput()
			->withErrors($validator);
    }
    $newsItem->name=$request->name;
    $newsItem->text=$request->text;
    $newsItem->save();
    return redirect(route('news.index'));
})->name('news.update');

/**
 * Удалить новость
 */
Route::delete('/news/{newsItem}', function (News $newsItem) {
    $newsItem->delete();
    return redirect(route('news.index'));
})->name('news.destroy');