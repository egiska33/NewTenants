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
	'qa_create' => 'Erstellen',
	'qa_save' => 'Speichern',
	'qa_edit' => 'Bearbeiten',
	'qa_view' => 'Betrachten',
	'qa_update' => 'Aktualisieren',
	'qa_list' => 'Listen',
	'qa_no_entries_in_table' => 'Keine Einträge in Tabelle',
	'custom_controller_index' => 'Custom controller index.',
	'qa_logout' => 'Abmelden',
	'qa_add_new' => 'Hinzufügen',
	'qa_are_you_sure' => 'Sind Sie sicher?',
	'qa_back_to_list' => 'Zurück zur Liste',
	'qa_dashboard' => 'Dashboard',
	'qa_delete' => 'Löschen',
	'quickadmin_title' => 'LaraTenants',
];