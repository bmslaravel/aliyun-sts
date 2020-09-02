<?php

namespace Helium\Sts;

use Helium\Sts\Profile\DefaultProfile;
use Illuminate\Config\Repository;

class Sts
{
    /**
     * @var
     */
    protected $config;

    /**
     * Sts constructor.
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * @return \Sts\Core\Http\HttpResponse
     * @throws \Sts\Core\Exception\ClientException
     */
    public function token()
    {
        $iClientProfile = DefaultProfile::getProfile("cn-hangzhou", $this->config['access_key_id'], $this->config['access_key_secret']);
        $client = new DefaultAcsClient($iClientProfile);

        $request = new AssumeRoleRequest();
        $request->setRoleSessionName('client_name');
        $request->setRoleArn($this->config['role_arn']);
        $request->setPolicy($this->config['policy']);
        $request->setDurationSeconds($this->config['token_expire_time']);
        return $client->doAction($request);
    }
}
