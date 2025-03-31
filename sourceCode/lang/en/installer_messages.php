<?php

return array (
  'title' => 'Visitor pass App Installer',
  'next' => 'Next Step',
  'back' => 'Previous',
  'finish' => 'Install',
  'forms' =>
  array (
    'errorTitle' => 'The Following errors occurred:',
  ),
  'welcome' =>
  array (
    'templateTitle' => 'Welcome to Visitor Pass  App Installer',
    'title' => 'Visitor pass management system',
    'message' => 'Visitor Pass Easy Installation and Setup Wizard.',
    'next' => 'Check Requirements',
  ),
  'requirements' =>
  array (
    'templateTitle' => 'Step 1 | Server Requirements',
    'title' => 'Server Requirements',
    'next' => 'Check Permissions',
  ),
  'permissions' =>
  array (
    'templateTitle' => 'Step 2 | Permissions',
    'title' => 'Permissions',
    'next' => 'Configure Environment',
  ),
  'purchase-code' =>
  array (
    'templateTitle' => 'Step 2 | Purchase Code',
    'title' => 'Purchase Code',
    'next' => 'Verify your purchase code',
    'form' =>
    array (
      'purchase_code_label' => 'Licence Code',
      'purchase_username_label' => 'Purchase Username',
      'buttons' =>
      array (
        'verify' => 'Verify Code',
      ),
    ),
  ),
  'environment' =>
  array (
    'menu' =>
    array (
      'templateTitle' => 'Step 3 | Environment Settings',
      'title' => 'Environment Settings',
      'desc' => 'Please select how you want to configure the apps <code>.env</code> file.',
      'wizard-button' => 'Form Wizard Setup',
      'classic-button' => 'Classic Text Editor',
    ),
    'wizard' =>
    array (
      'templateTitle' => 'Step 3 | Environment Settings | Guided Wizard',
      'title' => 'Guided <code>.env</code> Wizard',
      'tabs' =>
      array (
        'environment' => 'Environment',
        'database' => 'Database',
        'application' => 'Application',
      ),
      'form' =>
      array (
        'name_required' => 'An environment name is required.',
        'app_name_label' => 'App Name',
        'app_name_placeholder' => 'App Name',
        'app_environment_label' => 'App Environment',
        'app_environment_label_local' => 'Local',
        'app_environment_label_developement' => 'Development',
        'app_environment_label_qa' => 'Qa',
        'app_environment_label_production' => 'Production',
        'app_environment_label_other' => 'Other',
        'app_environment_placeholder_other' => 'Enter your environment...',
        'app_debug_label' => 'App Debug',
        'app_debug_label_true' => 'True',
        'app_debug_label_false' => 'False',
        'app_log_level_label' => 'App Log Level',
        'app_log_level_label_debug' => 'debug',
        'app_log_level_label_info' => 'info',
        'app_log_level_label_notice' => 'notice',
        'app_log_level_label_warning' => 'warning',
        'app_log_level_label_error' => 'error',
        'app_log_level_label_critical' => 'critical',
        'app_log_level_label_alert' => 'alert',
        'app_log_level_label_emergency' => 'emergency',
        'app_url_label' => 'App Url',
        'app_url_placeholder' => 'App Url',
        'db_connection_failed' => 'Could not connect to the database.',
        'db_connection_label' => 'Database Connection',
        'db_connection_label_mysql' => 'mysql',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'Database Host',
        'db_host_placeholder' => 'Database Host',
        'db_port_label' => 'Database Port',
        'db_port_placeholder' => 'Database Port',
        'db_name_label' => 'Database Name',
        'db_name_placeholder' => 'Database Name',
        'db_username_label' => 'Database User Name',
        'db_username_placeholder' => 'Database User Name',
        'db_password_label' => 'Database Password',
        'db_password_placeholder' => 'Database Password',
        'app_tabs' =>
        array (
          'more_info' => 'More Info',
          'broadcasting_title' => 'Broadcasting, Caching, Session, &amp; Queue',
          'broadcasting_label' => 'Broadcast Driver',
          'broadcasting_placeholder' => 'Broadcast Driver',
          'cache_label' => 'Cache Driver',
          'cache_placeholder' => 'Cache Driver',
          'session_label' => 'Session Driver',
          'session_placeholder' => 'Session Driver',
          'queue_label' => 'Queue Driver',
          'queue_placeholder' => 'Queue Driver',
          'redis_label' => 'Redis Driver',
          'redis_host' => 'Redis Host',
          'redis_password' => 'Redis Password',
          'redis_port' => 'Redis Port',
          'mail_label' => 'Mail',
          'mail_driver_label' => 'Mail Driver',
          'mail_driver_placeholder' => 'Mail Driver',
          'mail_host_label' => 'Mail Host',
          'mail_host_placeholder' => 'Mail Host',
          'mail_port_label' => 'Mail Port',
          'mail_port_placeholder' => 'Mail Port',
          'mail_username_label' => 'Mail Username',
          'mail_username_placeholder' => 'Mail Username',
          'mail_password_label' => 'Mail Password',
          'mail_password_placeholder' => 'Mail Password',
          'mail_encryption_label' => 'Mail Encryption',
          'mail_encryption_placeholder' => 'Mail Encryption',
          'pusher_label' => 'Pusher',
          'pusher_app_id_label' => 'Pusher App Id',
          'pusher_app_id_palceholder' => 'Pusher App Id',
          'pusher_app_key_label' => 'Pusher App Key',
          'pusher_app_key_palceholder' => 'Pusher App Key',
          'pusher_app_secret_label' => 'Pusher App Secret',
          'pusher_app_secret_palceholder' => 'Pusher App Secret',
        ),
        'buttons' =>
        array (
          'setup_database' => 'Setup Database',
          'setup_application' => 'Setup Application',
          'install' => 'Install',
        ),
      ),
    ),
    'classic' =>
    array (
      'templateTitle' => 'Step 3 | Environment Settings | Classic Editor',
      'title' => 'Classic Environment Editor',
      'save' => 'Save .env',
      'back' => 'Use Form Wizard',
      'install' => 'Save and Install',
    ),
    'success' => 'Your .env file settings have been saved.',
    'errors' => 'Unable to save the .env file, Please create it manually.',
  ),
  'install' => 'Install',
  'installed' =>
  array (
    'success_log_message' => 'Laravel Installer successfully INSTALLED on ',
  ),
  'final' =>
  array (
    'title' => 'Installation Finished',
    'templateTitle' => 'Installation Finished',
    'finished' => 'Application has been successfully installed.',
    'migration' => 'Migration &amp; Seed Console Output:',
    'console' => 'Application Console Output:',
    'log' => 'Installation Log Entry:',
    'env' => 'Final .env File:',
    'exit' => 'Click here to exit',
  ),
  'updater' =>
  array (
    'title' => 'Laravel Updater',
    'welcome' =>
    array (
      'title' => 'Welcome To The Updater',
      'message' => 'Welcome to the update wizard.',
    ),
    'overview' =>
    array (
      'title' => 'Overview',
      'message' => 'There is 1 update.|There are :number updates.',
      'install_updates' => 'Install Updates',
    ),
    'final' =>
    array (
      'title' => 'Finished',
      'finished' => 'Application\'s database has been successfully updated.',
      'exit' => 'Click here to exit',
    ),
    'log' =>
    array (
      'success_message' => 'Laravel Installer successfully UPDATED on ',
    ),
  ),
);
