### Lumen Laravel 5+. AliYun OSS-STS

##### Composer
`composer require bmslaravel/aliyun-sts`

##### Laravel/Lumen Service Register
* Laravel => config/app.php
    * `Helium\Sts\AliYunSTSServiceProvider::class`
* Lumen => bootstrap/app.php
    * `$app->register(Helium\Sts\AliYunSTSServiceProvider::class);`

##### Facade Register
* Laravel => config/app.php 
    * `'AliYunSTS' => Helium\Sts\Facades\AliYunSTS::class`
* lumen => bootstrap/app.php
    * ```php 
        $app->withFacades(true, [
            Helium\Sts\Facades\AliYunSTS::class => 'AliYunSTS',
        ]);
       ```

##### Config
* lumen copy `vendor/bmslaravel/src/config/sts.php` to `config/sts.php`
* Laravel vendor:publish

##### Demo
```php
    // eg. 1
    $response = Helium\Sts\Facades\AliYunSTS::token();
    // or 
    $response = (new Helium\Sts\Sts($app['sts']))->token();
    // or
    app('aliyun.sts')->token();
```

##### Reference link
https://help.aliyun.com/document_detail/64041.html?spm=a2c4g.11186623.2.17.38165bd44oA7Q2#concept-64041-z
https://help.aliyun.com/document_detail/32069.html?spm=a2c4g.11186623.6.989.26a459662WQfhJ
