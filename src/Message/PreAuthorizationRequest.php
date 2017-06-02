<?php

namespace Omnipay\JudoPay\Message;

use Omnipay\Common\Message\AbstractRequest;

/**
 * JudoPay PreAuthorization Request
 */
class PreAuthorizationRequest extends AbstractRequest
{

    public function setApiToken($value)
    {
        return $this->setParameter('apiToken', $value);
    }

    public function getApiToken()
    {
        return $this->getParameter('apiToken');
    }

    public function getApiSecret()
    {
        return $this->getParameter('apiSecret');
    }

    public function setApiSecret($value)
    {
        return $this->setParameter('apiSecret', $value);
    }

    public function getJudoId()
    {
        return $this->getParameter('judoId');
    }

    public function setJudoId($value)
    {
        return $this->setParameter('judoId', $value);
    }

    public function getUseProduction()
    {
        return $this->getParameter('useProduction');
    }

    public function setUseProduction($value)
    {
        return $this->setParameter('useProduction', $value);
    }

    public function getData()
    {
        $this->validate('amount');

        if (!$this->getNotifyUrl()) {
            $this->validate('returnUrl');
        }

        $data = array();
        $data['judoId'] = "100826-205";
        $data['yourConsumerReference'] = "12345";
        $data['yourPaymentReference'] = "12345";
        $data['amount'] = 1.01;
        $data['currency'] = "GBP";
        $data['cardNumber'] = "4976000000003436";
        $data['expiryDate'] = "12/22";
        $data['cv2'] = 452;

        return $data;
    }

    public function sendData($data)
    {
        die("TEST");
        return $this->response = new PreAuthorizationResponse($this, $data);
    }

    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }
}
