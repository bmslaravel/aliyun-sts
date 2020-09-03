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
     * @param array $config
     */
    public function __construct(array $config)
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
        $request->setPolicy(json_encode($this->config['policy'], JSON_UNESCAPED_UNICODE));
        $request->setDurationSeconds($this->config['token_expire_time']);
        $response = $client->doAction($request);

        $body = $response->getBody();
        $content = json_decode($body);
        if ($response->getStatus() == 200) {
            return [
                'access_key_id'       => $content->Credentials->AccessKeyId,
                'access_key_secret'   => $content->Credentials->AccessKeySecret,
                'expiration'          => $content->Credentials->Expiration,
                'security_token'      => $content->Credentials->SecurityToken,
            ];
        } else {
            throw new \Exception($response->getBody(),$response->getStatus());
        }
    }
}
