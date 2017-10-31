<?php

namespace classes;

/*
 * The MIT License
 *
 * Copyright 2017 ctala.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Description of BareMetrics
 *
 * @author ctala
 */
use Curl\Curl;

class BareMetrics {

    const LIVE_API_URL = 'https://api.baremetrics.com';
    const SANDBOX_API_URL = 'https://api-sandbox.baremetrics.com';
    const API_VERSION = "v1";

    var $curl;
    var $url;

    /**
     * 
     * @param type $bearerKey
     * @param type $sandbox
     */
    function __construct($bearerKey, $sandbox = false) {
        $this->curl = new Curl();
        $this->curl->setUserAgent('');
        $this->curl->setReferrer('');
        $this->curl->setHeader('Authorization', "Bearer $bearerKey");

        if ($sandbox == false) {
            $this->url = self::LIVE_API_URL;
        } else {
            $this->url = self::SANDBOX_API_URL;
        }
    }

    function checkAuth() {
        $this->curl->get($this->url);
        if ($this->curl->error) {
            echo $this->curl->error_code;
            return false;
        } else {
            return true;
        }
    }

    public function listResources() {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "sources";
        $this->curl->get($url);
        return $this->checkResponse();
    }

    public function getAccount() {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "account";
        $this->curl->get($url);
        return $this->checkResponse();
    }

    public function createPlan($sourceId, $ops = array()) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/plans";
        $this->curl->post($url, $ops);
        return $this->checkResponse();
    }

    public function getPlans($sourceId) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/plans";
        $this->curl->get($url);
        return $this->checkResponse();
    }

    public function deletePlan($sourceId, $oid) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/plans/$oid";
        $this->curl->delete($url);
        return $this->checkResponse();
    }

    public function listCustomers($sourceId) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/customers";
        $this->curl->get($url);
        return $this->checkResponse();
    }

    public function showCustomer($sourceId, $oid) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/customers/$oid";
        $this->curl->get($url);
        return $this->checkResponse();
    }

    public function listCustomerEvents($sourceId, $oid) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/customers/$oid/events";
        $this->curl->get($url);
        return $this->checkResponse();
    }

    public function updateCustomer($sourceId, $oid, $userData = array()) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/customers/$oid";
        $this->curl->put($url, $userData);
        return $this->checkResponse();
    }

    public function createCustomer($sourceId, $userData = array()) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/customers/";
        $this->curl->post($url, $userData);
        return $this->checkResponse();
    }

    public function deleteCustomer($sourceId, $oid) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/customers/$oid";
        $this->curl->delete($url);
        return $this->checkResponse();
    }

    public function listSubscriptions($sourceId, $query = array()) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/subscriptions";
        $this->curl->get($url, $query);
        return $this->checkResponse();
    }

    public function showSubscriptions($sourceId, $oid) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/subscriptions/$oid";
        $this->curl->get($url);
        return $this->checkResponse();
    }

    public function updateSubscription($sourceId, $subscriptionOid, $planOid, $planParams = array()) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/subscriptions/$subscriptionOid";
        $this->curl->put($url, $planParams);
        return $this->checkResponse();
    }

    public function cancelSubscription($sourceId, $oid, $params = array()) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/subscriptions/$oid/cancel";
        $paramsDefault = array(
            'canceled_at' => time()
        );
        $allParams = array_merge($paramsDefault, $params);
        $this->curl->put($url, $allParams);
        return $this->checkResponse();
    }

    public function createSubscription($sourceId, $params = array()) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/subscriptions/";
        $paramsDefault = array(
            'started_at' => time()
        );
        $allParams = array_merge($paramsDefault, $params);
        $this->curl->put($url, $allParams);
        return $this->checkResponse();
    }

    public function deleteSubscription($sourceId, $oid) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/subscriptions/$oid";
        $this->curl->delete($url);
        return $this->checkResponse();
    }

    public function listCharges($sourceId) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/charges";
        $this->curl->get($url);
        return $this->checkResponse();
    }

    public function showCharge($sourceId, $oid) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/charges/$oid";
        $this->curl->get($url);
        return $this->checkResponse();
    }

    public function createCharge($sourceId, $params = array()) {
        $url = $this->url . DIRECTORY_SEPARATOR . self::API_VERSION . DIRECTORY_SEPARATOR . "$sourceId/charges";
        $this->curl->post($url);
        return $this->checkResponse();
    }

    public function checkResponse() {
        $curl = $this->curl;
        if ($curl->error) {
            throw new BareError($curl->error_message, $curl->error_code);
        } else {
            return json_decode($curl->response);
        }
    }

}
