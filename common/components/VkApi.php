<?php
namespace common\components;
use yii\base\Component;
 
class VkApi extends Component {

    private $version = '5.68';
    private $api_url = 'https://api.vk.com/method/';
    private $access_token = '5ea01658937c4e65098f0f2a98cc89da7fec9fa904472f14f7d7d4e6828d0491a5eb7cc9e2e99d213fe0b';
    private $lang = 'ru';
    
    
    public function query($method,$params = []){
        $url = $this->api_url;
        $url .= $method;
        $url .= '?'.http_build_query(
            array_merge($params, [
                'v' => $this->version,
                'access_token' => $this->access_token,
                'lang' => $this->lang
            ])
        );

        return file_get_contents($url);
    }
    
}