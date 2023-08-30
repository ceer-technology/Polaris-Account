<?php

return [
    // What is being run when the admin clicks on the "Create a new backup" button
    // You can add flags to this like --only-db --only-files --only-to-disk=name-of-disk
    // Details here: https://spatie.be/docs/laravel-backup/v8/taking-backups/overview
    'artisan_command_on_button_click' => 'backup:run --disable-notifications',

    // here you can configure your php settings that will apply before starting the backup operation
    // one of the things that Backpack does by default is increasing the `max_execution_time` for
    // php scripts, as listing all files for backup could take some time to execute.
    'ini_settings' => [
        'max_execution_time' => 600,
    ],
];
