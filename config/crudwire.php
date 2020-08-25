<?php

return [
    'crudwire_prefix'                       => env('CRUDWIRE_PREFIX', 'crudwire'),
    'crudwire_middleware'                   => env('CRUDWIRE_AUTH', 'web'),
    'crudwire_layout'                       => env('CRUDWIRE_LAYOUT', 'crudwire::layouts.base'),
    'crudwire_pagination'                   => env('CRUDWIRE_PAGINATION', 10),
    'crudwire_dont_display'                 => env('CRUDWIRE_DONT_DISPLAY',['password','remember_token']),

    /**
    *add tot this array blade components
    *with $key being there column name
    *and value the blade component name
    *once added
    *input elements will be
    *displayed in create and edit view
    */
    'crudwire_form_inputs'                  => ['default'    => 'crudwire::form.inputs.text'],

    /**
     * validation rules used
     * when new user is
     * created
     * you can customize these rules
     *
     */
    'validation_rules_create_new_user'      => ['name' => 'required|string|max:255',
                                                'email' => 'required|string|email|max:255|unique:users',
                                                'password' => 'required|string|min:8|confirmed',],
    /**
     * validation rules used
     * when user is updated
     * you can customize these rules
     *
     */

    'validation_rules_update_user'          => ['name' => 'required|string|max:255',
                                                'email' => 'required|string|email|max:255',
                                                'password' => 'required|string|min:8|confirmed',],


];
