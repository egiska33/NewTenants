<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'landlord' => [		'title' => 'Landlord',		'created_at' => 'Time',		'fields' => [			'first-name' => 'First name',			'last-name' => 'Last name',			'email' => 'Email',			'phone' => 'Phone',		],	],
		'tenant' => [		'title' => 'Tenant',		'created_at' => 'Time',		'fields' => [			'first-name' => 'First name',			'last-name' => 'Last name',			'email' => 'Email',			'phone' => 'Phone',			'landlord' => 'Landlord id',		],	],
		'house' => [		'title' => 'House',		'created_at' => 'Time',		'fields' => [			'city' => 'City',			'address' => 'Address',			'tenant' => 'Tenant id',		],	],
		'bill' => [		'title' => 'Bill',		'created_at' => 'Time',		'fields' => [			'type' => 'Type',			'total' => 'Total',			'house' => 'House id',		],	],
		'task' => [		'title' => 'Task',		'created_at' => 'Time',		'fields' => [			'content' => 'Content',			'photo' => 'Photo',			'house' => 'House id',		],	],
		'message' => [		'title' => 'Message',		'created_at' => 'Time',		'fields' => [			'content' => 'Content',			'time' => 'Time',			'house' => 'House id',		],	],
		'document' => [		'title' => 'Document',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',			'content' => 'Content',			'house' => 'House id',		],	],
	'qa_create' => 'बनाइए (क्रिएट)',
	'qa_save' => 'सुरक्षित करे ',
	'qa_edit' => 'संपादित करे (एडिट)',
	'qa_view' => 'देखें',
	'qa_update' => 'सुधारे ',
	'qa_list' => 'सूची',
	'qa_no_entries_in_table' => 'टेबल मे एक भी एंट्री नही है ',
	'custom_controller_index' => 'विशेष(कस्टम) कंट्रोलर इंडेक्स ।',
	'qa_logout' => 'लोग आउट',
	'qa_add_new' => 'नया समाविष्ट करे',
	'qa_are_you_sure' => 'आप निस्चित है ?',
	'qa_back_to_list' => 'सूची पे वापस जाए',
	'qa_dashboard' => 'डॅशबोर्ड ',
	'qa_delete' => 'मिटाइए',
	'quickadmin_title' => 'LaraTenants',
];