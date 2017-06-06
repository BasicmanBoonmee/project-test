<?php
    require_once __DIR__ . '/vendor/autoload.php';

    use Omnipay\Omnipay;

    $judopay = Omnipay::create('Judopay');

    $judopay->setApiToken('jwmXGbpb87xvDM4B');
    $judopay->setApiSecret('601dc0a93d2752f5041bdb9a53dc1bf0b4e8ef0f1b03f737416fcf3be1a20b7d');
    $judopay->setJudoId('100826-205');
    $judopay->setUseProduction(false);

    try {

        $formData = array('number' => '4976000000003436', 'expiryMonth' => '12', 'expiryYear' => '2022', 'cvv' => '452');

        $parameter = array(
            'ReceiptId' => $_POST['ReceiptId'],
            'CardToken' => $_POST['CardToken'],
            'Reference' => $_POST['Reference']
        );

        $response = $judopay->completePurchase($parameter)->send();

        if ($response->isSuccessful()) {
            echo "Purchase Success isRedirect<br />";
            $data = $response->getData();

            echo "Data : ".print_r($data,true)."<br />";

            if($response->isRedirect()){
                $response->redirect();
            }
        } else {
            throw new ApplicationException($response->getMessage());
        }
    }catch (ApplicationException $e) {
        throw new ApplicationException($e->getMessage());
    }

?>