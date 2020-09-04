<?php

return [
    /*
    |--------------------------------------------------------------------------
    | AliYun ACCESS KEY ID
    |--------------------------------------------------------------------------
    |
    | AliYun Open Platform, Add Users to get
    |
    | see to https://ram.console.aliyun.com/groups
    |
     */

    'access_key_id'     => env('ACCESS_KEY_ID', 'LTAI4---------44pg8'),

    /*
    |--------------------------------------------------------------------------
    | AliYun ACCESS KEY SECRET
    |--------------------------------------------------------------------------
    |
    | AliYun Open Platform, Add Users to get
    |
    | see to https://ram.console.aliyun.com/groups
    |
    */

    'access_key_secret' => env('ACCESS_KEY_SECRET', 'oibIsys6xl---------ETocTR'),

    /*
    |--------------------------------------------------------------------------
    | AliYun ROLE ARN
    |--------------------------------------------------------------------------
    |
    | AliYun Open Platform, Add Roles to get
    |
    | see to https://ram.console.aliyun.com/roles/{$role_arn}
    |
    */

    'role_arn'          => env('ROLE_ARN', 'acs:ram::xxxxxxxxxxx:role/xxx'),

    /*
    |--------------------------------------------------------------------------
    | AliYun BUCKET NAME
    |--------------------------------------------------------------------------
    |
    | AliYun management platform, Add Bucket to get
    |
    | see to https://oss.console.aliyun.com/bucket
    |
    */

    'bucket_name'       => env('BUCKET_NAME', 'xxxx-xxxx'),

    /*
    |--------------------------------------------------------------------------
    | AliYun ENDPOINT
    |--------------------------------------------------------------------------
    |
    | AliYun management platform, Add Bucket to get
    |
    | see to https://oss.console.aliyun.com/bucket
    |
    */

    'endpoint'          => env('ENDPOINT', 'oss-cn-chengdu.aliyuncs.com'),

    /*
    |--------------------------------------------------------------------------
    | AliYun TOKEN EXPIRE TIME
    |--------------------------------------------------------------------------
    |
    | AliYun management platform, The parameter must default 900s
    |
    */

    'token_expire_time' => env('TOKEN_EXPIRE_TIME', 900),

    /*
    |--------------------------------------------------------------------------
    | AliYun POLICY
    |--------------------------------------------------------------------------
    |
    | Read and write permissions
    |
    | see to https://help.aliyun.com/document_detail/100680.html?spm=a2c4g.11186623.2.16.1eb33b49yudrae#concept-y5r-5rm-2gb
    |
    */

    'policy'    => [
        "Statement" => [
            [
                "Action" => [
                    "oss:GetObject",
                    "oss:PutObject",
                    "oss:DeleteObject",
                    "oss:ListParts",
                    "oss:AbortMultipartUpload",
                    "oss:ListObjects"
                ],
                "Effect" => "Allow",
                "Resource" => [
                    "acs:oss:*:*:".env('BUCKET_NAME', 'xxxx-xxxx'),
                    "acs:oss:*:*:".env('BUCKET_NAME', 'xxxx-xxxx')."/*"
                ]
            ]
        ],
        "Version" => "1"
    ]
];
