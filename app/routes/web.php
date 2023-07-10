<?php
	
	$routes = [];

	$controller = '/UserController';

	$routes['user'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
		'profile' => $controller.'/profile',
		'sendAuth' => $controller.'/sendAuth',
		'register' => $controller.'/register',
		'verification' => $controller.'/verification',
		'referrral'  => $controller .'/referrral'
	];

	$controller = '/AuthController';

	$routes['auth'] = [
		'login' => $controller.'/login',
		'register' => $controller.'/register',
		'logout' => $controller.'/logout',
	];

	$controller = '/ServiceController';

	$routes['service'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show'
	];

	$controller = '/HomeController';

	$routes['home'] = [
		'index' => $controller.'/index',
	];

	$controller = '/ServiceBundleController';

	$routes['service-bundle'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
		'removeCustomPrice' => $controller.'/removeCustomPrice'
	];

	$controller = '/ServiceBundleItemController';

	$routes['service-bundle-item'] = [
		'index' => $controller.'/index',
		'add' => $controller.'/add',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show'
	];

	$controller = '/ServiceCartController';

	$routes['service-cart'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'add' => $controller.'/add',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
		'destroy-cart' => $controller.'/destroyCart'
	];


	$controller = '/AppointmentController';

	$routes['appointment'] = [
		'index' => $controller.'/index',
		'create' => $controller.'/create',
		'createWithBill' => $controller.'/createWithBill',
		'edit' => $controller.'/edit',
		'add' => $controller.'/add',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
		'appointment_form' => $controller. '/appointment_form',
		'payment-add' => $controller .'/addPayment'
	];

	$controller = '/BillController';

	$routes['bill'] = [
		'index' => $controller.'/index',
		'create' => $controller.'/create',
		'edit' => $controller.'/edit',
		'add' => $controller.'/add',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
		'fetchFrame'   => $controller.'/fetchFrame',
		'payInCash'    => $controller.'/payInCash'
	];

	$controller = '/PaymentController';

	$routes['payment'] = [
		'index' => $controller.'/index',
		'create' => $controller.'/create',
		'edit' => $controller.'/edit',
		'add' => $controller.'/add',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show'
	];
	

	$controller = '/SpecialtyController';

	$routes['specialty'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show'
	];
	
	$controller = '/CategoryController';

	$routes['category'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show'
	];

	$controller = '/SessionController';

	$routes['session'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show'
	];
	
	$controller = '/AttachmentController';

	$routes['attachment'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'download' => $controller.'/download',
		'show'   => $controller.'/show'
	];

	$controller = '/ScheduleSettingController';

	$routes['schedule'] = [
		'index' => $controller.'/index',
		'update' => $controller.'/update'
	];

	$controller = '/DoctorSpecializationController';

	$routes['doc-special'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'download' => $controller.'/download',
		'show'   => $controller.'/show'
	];

	$controller = '/StockController';
	$routes['stock'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/addStock',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show',
		'log'   => $controller.'/log',
		'add'  => $controller.'/addStock'
	];

	$controller = '/SettingController';
	$routes['setting'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show'
	];

	$controller = '/ReservationFeeController';
	$routes['rsv-setting'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show'
	];


	$controller = '/OrderController';

	$routes['order'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'replacement' => $controller.'/replacement',
		'show'   => $controller.'/show',
		'cashier' => $controller. '/cashierMode',
		'cancel-session' => $controller .'/cancelOrderSession'
	];

	$controller = '/OrderItemController';

	$routes['order-item'] = [
		'index' => $controller.'/index',
		'edit' => $controller.'/edit',
		'create' => $controller.'/create',
		'delete' => $controller.'/destroy',
		'show'   => $controller.'/show'
	];

	
	return $routes;
?>