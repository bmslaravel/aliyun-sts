<?php

return [
    /*
    |--------------------------------------------------------------------------
    | AliYun ACCESS KEY ID
    |--------------------------------------------------------------------------
    |
    | From AliYun management platform, The parameter must
    |
     */

    'access_key_id'     => env('ACCESS_KEY_ID', ''),

    /*
    |--------------------------------------------------------------------------
    | AliYun ACCESS KEY SECRET
    |--------------------------------------------------------------------------
    |
    | From AliYun management platform, The parameter must
    |
    */
    
    'access_key_secret' => env('ACCESS_KEY_SECRET', ''),

    /*
    |--------------------------------------------------------------------------
    | AliYun ROLE ARN
    |--------------------------------------------------------------------------
    |
    | From AliYun management platform, The parameter must
    |
    */

    'role_arn'          => env('ROLE_ARN', ''),

    /*
    |--------------------------------------------------------------------------
    | AliYun TOKEN EXPIRE TIME
    |--------------------------------------------------------------------------
    |
    | From AliYun management platform, The parameter must default 900s
    |
    */

    'token_expire_time' => env('TOKEN_EXPIRE_TIME', 900),

    /*
    |--------------------------------------------------------------------------
    | AliYun POLICY
    |--------------------------------------------------------------------------
    |
    | From AliYun management platform, The parameter must
    |
    */

    'policy'    => [
        "Statement" => [
            [
                "Action" => [
                    "oss:*"
                ],
                "Effect" => "Allow",
                "Resource" => ["acs:oss:*:*:*"]
            ]
        ],
        "Version" => "1"
    ]
];
