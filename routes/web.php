<?php

Route::get('/',['as'=>'/','uses'=>'LoginController@getLogin']);
Route::post('/login',['as'=>'login','uses'=>'LoginController@postLogin']);

Route::get('/noPermission', function (){
	return view('permission.noPermission');
}); 

Route::group(['middleware'=>['authen']], function (){
	Route::get('/logout',['as'=>'logout','uses'=>'LoginController@getLogout']);
	Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@dashboard']);
});

Route::group(['middleware'=>['authen','roles'],'roles'=>['Admin']], function (){
	//for Admin
	Route::get('/manage/course',['as'=>'manageCourse','uses'=>'CourseController@getManageCourse']);

	Route::post('/manage/course/insert',['as'=>'postInsertAcademic','uses'=>'CourseController@postInsertAcademic']);

	Route::post('/manage/course/insert-program',['as'=>'postInsertProgram','uses'=>'CourseController@postInsertProgram']);

	Route::post('/manage/course/insert-level',['as'=>'postInsertLevel','uses'=>'CourseController@postInsertLevel']);

	Route::get('/manage/course/showlevel',['as'=>'showlevel','uses'=>'CourseController@showlevel']);

	Route::post('/manage/course/postInsertShift',['as'=>'postInsertShift','uses'=>'CourseController@postInsertShift']);

	Route::post('/manage/course/postInsertTime',['as'=>'postInsertTime','uses'=>'CourseController@postInsertTime']);

	Route::post('/manage/course/postInsertBatch',['as'=>'postInsertBatch','uses'=>'CourseController@postInsertBatch']);

	Route::post('/manage/course/insert-group',['as'=>'postInsertGroup','uses'=>'CourseController@postInsertGroup']);

	Route::post('/manage/course/insert-class',['as'=>'postInsertClass','uses'=>'CourseController@postInsertClass']);

	Route::get('/manage/course/showClassInformation',['as'=>'showClassInformation','uses'=>'CourseController@showClassInformation']);

	Route::post('/manage/course/deleteClass',['as'=>'deleteClass','uses'=>'CourseController@deleteClass']);

	Route::get('/manage/course/editClass',['as'=>'editClass','uses'=>'CourseController@editClass']);

	Route::post('/manage/course/updateClassInfo',['as'=>'updateClassInfo','uses'=>'CourseController@updateClassInfo']);


// ========================Student Registration==========================//
	Route::get('/student/getStudentRegister',['as'=>'getStudentRegister','uses'=>'StudentController@getStudentRegister']);
	Route::get('/student/show',['as'=>'showAllStudent','uses'=>'StudentController@getAllStudent']);

	Route::post('/student/postStudentRegister',['as'=>'postStudentRegister','uses'=>'StudentController@postStudentRegister']);

	Route::get('/student/getStudentInfo',['as'=>'get_student_info_by_search','uses'=>'StudentController@get_student_info_by_search']);

	Route::get('student/getstudentinfosearch','StudentController@getstudentinfosearch');

// ========================Fees Controller========================//
	Route::get('/student/show/payment',['as'=>'getPayment','uses'=>'FeeController@getPayment']);

	Route::get('/student/studentPayment',['as'=>'showStudentPayment','uses'=>'FeeController@showStudentPayment']); 

	Route::get('/student/go/to/Payment/{student_id}',['as'=>'goPayment','uses'=>'FeeController@goPayment']); 

	Route::post('/student/payment/save',['as'=>'savePayment','uses'=>'FeeController@savePayment']); 

	Route::post('/fee/createFee',['as'=>'createFee','uses'=>'FeeController@createFee']); 
	Route::get('/fee/student/pay',['as'=>'pay','uses'=>'FeeController@pay']);
	Route::post('/fee/student/extra/pay',['as'=>'extra_pay','uses'=>'FeeController@extraPay']);
	Route::get('/fee/student/print/invoice/{receipt}', ['as' => 'printInvoice', 'uses' => 'FeeController@printInvoice']);
	Route::get('/create/student/level',['as'=>'createStudentLevel','uses'=>'FeeController@createStudentLevel']);


	//==================================Jquery Ajax===========================================
		Route::get('/jquery',['as'=>'jquery','uses'=>'JqueryController@jquery']); 
		Route::post('/postJquery',['as'=>'postJquery','uses'=>'JqueryController@postJquery']);
});