<?php
/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

namespace Sts;

use Sts\Core\RpcAcsRequest;

use Sts\Core\Regions\Endpoint;
use Sts\Core\Regions\EndpointProvider;
use Sts\Core\Regions\ProductDomain;

class AssumeRoleRequest extends RpcAcsRequest
{
    public function __construct()
    {
        $this->setEndpoints();
        parent::__construct("Sts", "2015-04-01", "AssumeRole");
        $this->setProtocol("https");
    }

    private $durationSeconds;

    private $policy;

    private $roleArn;

    private $roleSessionName;

    private function setEndpoints()
    {
        $regionIds = array("cn-hangzhou", "cn-beijing", "cn-qingdao", "cn-hongkong", "cn-shanghai", "us-west-1", "cn-shenzhen", "ap-southeast-1");
        $productDomains = array(
            new ProductDomain("Ecs", "ecs.aliyuncs.com"),
            new ProductDomain("Rds", "rds.aliyuncs.com"),
            new ProductDomain("BatchCompute", "batchCompute.aliyuncs.com"),
            new ProductDomain("Bss", "bss.aliyuncs.com"),
            new ProductDomain("Oms", "oms.aliyuncs.com"),
            new ProductDomain("Slb", "slb.aliyuncs.com"),
            new ProductDomain("Oss", "oss-cn-hangzhou.aliyuncs.com"),
            new ProductDomain("OssAdmin", "oss-admin.aliyuncs.com"),
            new ProductDomain("Sts", "sts.aliyuncs.com"),
            new ProductDomain("Yundun", "yundun-cn-hangzhou.aliyuncs.com"),
            new ProductDomain("Risk", "risk-cn-hangzhou.aliyuncs.com"),
            new ProductDomain("Drds", "drds.aliyuncs.com"),
            new ProductDomain("M-kvstore", "m-kvstore.aliyuncs.com"),
            new ProductDomain("Ram", "ram.aliyuncs.com"),
            new ProductDomain("Cms", "metrics.aliyuncs.com"),
            new ProductDomain("Crm", "crm-cn-hangzhou.aliyuncs.com"),
            new ProductDomain("Ocs", "pop-ocs.aliyuncs.com"),
            new ProductDomain("Ots", "ots-pop.aliyuncs.com"),
            new ProductDomain("Dqs", "dqs.aliyuncs.com"),
            new ProductDomain("Location", "location.aliyuncs.com"),
            new ProductDomain("Ubsms", "ubsms.aliyuncs.com"),
            new ProductDomain("Ubsms-inner", "ubsms-inner.aliyuncs.com")
        );
        $endpoint = new Endpoint("cn-hangzhou", $regionIds, $productDomains);
        $endpoints = array($endpoint);
        EndpointProvider::setEndpoints($endpoints);
    }

    public function getDurationSeconds()
    {
        return $this->durationSeconds;
    }

    public function setDurationSeconds($durationSeconds)
    {
        $this->durationSeconds = $durationSeconds;
        $this->queryParameters["DurationSeconds"] = $durationSeconds;
    }

    public function getPolicy()
    {
        return $this->policy;
    }

    public function setPolicy($policy)
    {
        $this->policy = $policy;
        $this->queryParameters["Policy"] = $policy;
    }

    public function getRoleArn()
    {
        return $this->roleArn;
    }

    public function setRoleArn($roleArn)
    {
        $this->roleArn = $roleArn;
        $this->queryParameters["RoleArn"] = $roleArn;
    }

    public function getRoleSessionName()
    {
        return $this->roleSessionName;
    }

    public function setRoleSessionName($roleSessionName)
    {
        $this->roleSessionName = $roleSessionName;
        $this->queryParameters["RoleSessionName"] = $roleSessionName;
    }
}
