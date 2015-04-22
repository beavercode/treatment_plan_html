<?php
/**
 * Config file
 * vars values:
 *      required    boolean
 *      type        php types
 *      function    simple php functions like trim, htmlspecialchars with 3 params max, e.g.:
 *          ['htmlspecialchars', ENT_COMPAT, 'utf-8')
 *
 *      validation  validate var
 *          min     minimal number value
 *          max     maximal number value
 *          email   todo
 *          url     todo
 *          pattern todo
 *          pass    todo
 *
 *
 * User: bbr
 * Date: 25/03/15
 * Time: 00:54
*/

return [
    'app' => [
        'uri_base' => '/',
        'tpl' => 'tpl/',
        'log' => 'storage/logs/',
        'session' => 'storage/sessions/',
        'docx' => 'storage/docx/',
        'pdf_in' => 'storage/pdf/',
        'pdf_out' => './../../pdf/'
    ],
    'db'   => [
        'host' => 'localhost',
        'user' => 'gb_test_user',
        'pass' => 'w5wEWOz4wuLe',
        'db'   => 'gb_test'
    ],
    'vars' => [
        'login' => [
            'login' => [
                'required'   => true,
                'function'   => [
                    ['trim'],
                    ['htmlspecialchars', ENT_COMPAT, 'utf-8']
                ],
                'validation' => [
                    'min'     => 3,
                    'max'     => 15
                ]
            ],
            'paswd' => [
                'required' => true,
                'validation' => [
                    'min'     => 3,
                    'max'     => 15,
                    'pass'   => true
                ]
            ]
        ]
    ]
];

/*  full example
        'form_article' => [
            'name',
            'excerpt',
            'text'
        ],
        'form_comment' => [
            'name'    => [
                'required'   => true,
                'type'       => 'string',
                'function'   => ['trim'],
                'validation' => [
                    'min'     => 3,
                    'max'     => 25,
                    'email'   => false,
                    'url'     => false,
                    'pattern' => false

                ]
            ],
            'message' => [
                'required'   => true,
                'type'       => 'string',
                'function'   => ['trim'],
                'validation' => [
                    'min' => 5,
                    'pass' => false
                ]
            ]
        ]*/