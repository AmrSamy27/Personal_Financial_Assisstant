<?php
use App\Country;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::get('/', 'HomeController@index')->middleware('guest');
    Route::get('/home', 'HomeController@index')->name('home.index');
    Route::get('/', 'HomeController@index')->name('home.index');

    // Blogs for authenticated and unauthenticated users

    Route::get('/blogs/{id}/show', 'Blog\BlogController@show')->name('blogs.show');
    Route::get('/tag/{tag}/blogs', 'Blog\BlogController@getTagBlogs')->name('tag.blogs');
    Route::get('/blogs', 'Blog\BlogController@index')->name('blogs.index');
    Route::get('/blogs/{userId}', 'Blog\BlogController@getUserBlogs')->name('user.blogs');

    Route::middleware(['auth','verified'])->group(function(){
    
    Route::get('/user/ajax/{countryName}','ProfileController@getStates')->name('user.ajax');
    Route::get('/userHome',"DashboardController@index")->name('userHome');
    Route::post('/userHome',"DashboardController@store")->name('dashboard.store');

    //incomes routes
    Route::get('/incomes','Finance\IncomeController@index')->name('incomes.index');
    Route::get('incomes/create', 'Finance\IncomeController@create')->name('incomes.create');
    Route::post('/incomes','Finance\IncomeController@store');
    Route::delete('/incomes/{income_id}', 'Finance\IncomeController@destroy')->name('incomes.destroy');
    Route::patch('/incomes/{income_id}', 'Finance\IncomeController@update')->name('incomes.update');
    Route::get('/incomes/{income_id}/edit', 'Finance\IncomeController@edit')->name('incomes.edit');

    //expenses routes
    Route::get('/expenses/create', 'Finance\ExpenseController@create')->name('expenses.create');
    Route::get('/expenses/index','Finance\ExpenseController@index')->name('expenses.index');
    Route::post('/expenses','Finance\ExpenseController@store')->name('expenses.store');
    Route::get('/category/ajax/{categoryId}','Finance\ExpenseController@getSubCategories')->name('subCategory.ajax');
    Route::get('/expenses/{id}','Finance\ExpenseController@create')->name('expenses.edit');
    Route::put('/expenses/{id}','Finance\ExpenseController@edit')->name('expenses.edit');
    Route::delete('/expenses/{id}', 'Finance\ExpenseController@destroy')->name('expenses.destroy');

    //events route
    Route::get('/events/create', 'Finance\EventController@create')->name('events.create');
    Route::get('/events/manager', 'Finance\EventController@index')->name('events.index');
    Route::delete('/events/{id}/delete', 'Finance\EventController@destroy')->name('events.destroy');
    Route::get('/events/{id}','Finance\EventController@edit')->name('events.edit');
    Route::get('/events/{id}/show','Finance\EventController@show')->name('events.show');
    Route::put('/events/{id}/update','Finance\EventController@update')->name('events.update');
    Route::put('/SubEvents/{id}/update','Finance\EventController@updateSubEvent')->name('subEvent.update');
    Route::post('/events','Finance\EventController@store')->name('events.store');
    Route::post('/events/subExpenseEvent','Finance\EventController@storeSubEvent')->name('events.subStore');

    //savings routes
    Route::get('/savings/create', 'Finance\SavingController@index')->name('savings.create');
    Route::post('/savings','Finance\SavingController@store')->name('savings.store');
    Route::delete('/savings/{saving_id}', 'Finance\SavingController@destroy')->name('savings.destroy');
    Route::get('/savings/{saving_id}/edit', 'Finance\SavingController@edit')->name('savings.edit');
    Route::patch('/savings/{saving_id}', 'Finance\SavingController@update')->name('savings.update');

    //target routes
    Route::get('/targets/create', 'Finance\TargetController@index')->name('targets.create');
    Route::post('/targets','Finance\TargetController@store')->name('targets.store');
    Route::delete('/targets/{target_id}', 'Finance\TargetController@destroy')->name('targets.destroy');
    Route::get('/targets/{target_id}/edit', 'Finance\TargetController@edit')->name('targets.edit');
    Route::patch('/targets/{target_id}', 'Finance\TargetController@update')->name('targets.update');

    //user profile routes
    Route::get('/user_profile', 'ProfileController@index')->name('profile'); // we changed this name from home to profile
    Route::get('/user_profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::put('/user_profile/{id}' , 'ProfileController@update' );

    //Reporting routes
    Route::get('/reports/index', 'ReportController@index')->name('reports.index');
    Route::post('/reports/index', 'ReportController@filter')->name('reports.filter');
    Route::get(' /reports/incomes/download', 'ReportController@incomeExport')->name('incomes.excel');
    Route::get(' /reports/expenses/download', 'ReportController@expenseExport')->name('expenses.excel');
    Route::get(' /reports/filterIncomes/download', 'ReportController@filterIncomeExport')->name('filterIncomes.excel');
    Route::get(' /reports/filterExpenses/download', 'ReportController@filterExpenseExport')->name('filterExpenses.excel');

    Route::get(' /reports/pdfdownload', 'ReportController@pdfExport')->name('pdfExport');

    //prediction routes
    Route::get('/predictData', 'TensorFlowController@getBalanceData')->name('predict');
    Route::get('/predict', 'TensorFlowController@index')->name('predict.index');
    Route::post('/predict/user', 'PredicitonController@getPredictionData')->name('predict.user');
    Route::get('/prediction', 'PredicitonController@index')->name('prediction');

    //Charts routes
    Route::get('/charts', 'ChartsController@charts')->name('charts');
    Route::post('/charts/subCategories', 'ChartsController@getSubCategoriesForCharts')->name('charts.subCategories');

    //blog routes
    Route::get('/blog/create','Blog\BlogController@create');
    Route::get('/blog/{id}/edit', 'Blog\BlogController@create')->name('blogs.edit');
    Route::put('/blog/{id}/update', 'Blog\BlogController@update')->name('blogs.update');
    Route::post('/blog/store', 'Blog\BlogController@store')->name('blogs.store');
    Route::delete('/blog/{id}/destroy', 'Blog\BlogController@destroy')->name('blogs.destroy');
  
  
    //calendar route
    Route::get('/calendar', 'CalendarController@index');

    // comments routes
    Route::get('/comments/{id}','Blog\CommentController@fetchComment');
    Route::post('/comments/{id}','Blog\CommentController@sendComment');

   
});


 
//contact us routes
Route::post('/contact','HomeController@store')->name('contact.store');

Auth::routes(['verify' => true]);


Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));

 Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')    
        ->name('login.callback')
        ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('/states/ajax/{countryName}','Auth\RegisterController@getStates')->name('ajax');

