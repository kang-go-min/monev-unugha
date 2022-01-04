<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',

            //Belongs to many relations
            'roles' => 'Roles',

        ],
    ],

    'survey' => [
        'title' => 'Survey',

        'actions' => [
            'index' => 'Survey',
            'create' => 'New Survey',
            'edit' => 'Edit :name',
            'questions' => 'Questions',
            'results' => 'Results',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'roles' => 'Roles',
            'user_id' => 'User',
            'description' => 'Description',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',

        ],
    ],

    'answer' => [
        'title' => 'Answer',

        'actions' => [
            'index' => 'Answer',
            'create' => 'New Answer',
            'edit' => 'Edit :name',
            'detail' => 'Detail Answer :name',
            'download' => 'Download',
        ],

        'columns' => [
            'id' => 'ID',
            'user_id' => 'User',
            'survey_id' => 'Survey',
            'json' => 'Answer',
            'ip_address' => 'IP Address',
        ],
        'btn' => [
            'show' => 'Show'
        ]
    ],

    'user' => [
        'title' => 'User',

        'actions' => [
            'index' => 'User',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'id_card' => 'NIM/NIK',
            'roles' => 'Roles',

        ],
    ],

    'report' => [
        'title' => 'Report',

        'actions' => [
            'index' => 'Report',
            'create' => 'New Report',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];
