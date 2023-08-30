@extends(backpack_view('blank'))

@php
    // 用户统计
	$userCount = App\Models\User::count();
    // 今日注册用户统计
    $lastDayUsersCount = App\Models\User::whereDate('created_at', '>=', Carbon\Carbon::now()->addDay(-1))->count();
    // 未验证用户统计
    $unverifieUserCount = App\Models\User::role('unverified')->count();
    // 报错日志统计
    $logs = Backpack\LogManager\app\Classes\LogViewer::all();
    $logsCount = count($logs);

    $widgets['before_content'][] = [
	  'type' => 'div',
	  'class' => 'row',
	  'content' => [ // widgets 
		  	[ 
		        'type'            => 'progress',
                'class' 		  => 'card border-0 text-white bg-primary',
                'progressClass'   => 'progress-bar',
                'value'           => $userCount,
                'description'     => trans('User'),
                'footer_link'     => '/admin/user'
	    	],
            [ 
		        'type'            => 'progress',
                'class' 		  => 'card border-0 text-white bg-success',
                'progressClass'   => 'progress-bar',
                'value'           => $lastDayUsersCount,
                'description'     => trans('New users today'),
                'footer_link'     => '/admin/user'
	    	],
            [ 
		        'type'            => 'progress',
                'class' 		  => 'card border-0 text-white bg-warning',
                'progressClass'   => 'progress-bar',
                'value'           => $unverifieUserCount,
                'description'     => trans('Unverified'),
                'footer_link'     => '/admin/user?role=4'
	    	],
            [ 
		        'type'            => 'progress',
                'class' 		  => 'card border-0 text-white bg-danger',
                'progressClass'   => 'progress-bar',
                'value'           => $logsCount,
                'description'     => trans('Logs'),
                'footer_link'     => '/admin/log'
	    	],
    	]
	];
@endphp

@section('content')
	{{-- In case widgets have been added to a 'content' group, show those widgets. --}}
	@include(backpack_view('inc.widgets'), [ 'widgets' => app('widgets')->where('group', 'content')->toArray() ])
@endsection
