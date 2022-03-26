<?php
namespace App\Http\Service\Mensageria\Adapter;

use Illuminate\Http\Request;

class FirebaseAdapter
{

    private $url, $token;

    public function __construct()
    {
        $this->url = \Config::get('firebase.url');
        $this->token = \Config::get('firebase.token');
    }

	/**
	 * @param string 'para'
	 * @param int 'count'
     * @param string 'titulo'
     * @param string 'mensagem'
	 */
    public function send(array $data)
    {
        $body = [
            'to' => $data['para'],
            'data' => [
                'count' => (isset($data['count']) ? $data['count'] : 1),
                'coldstart' => false,
                'foreground' => false,
                'content-available' => 0
            ],
            'notification' => [
                'title' => $data['titulo'],
                'body' => str_replace(array("<b>", "</b>"), "", $data['mensagem']),
                'priority' => 'high',
                'sound' => 'default'
            ]
        ];
        $send = Curl::to($this->url)
            ->withHeader('Authorization: key='.$this->token)
            ->withData($request)
            ->withContentType('application/json')
            ->asJson(true)
            ->returnResponseObject()
            ->post();
        if($send->status != 200 || !isset($send->content->success) || !$send->content->success){
            return [
                'erro' => true
            ];
        }else{
            return [
                'erro' => false,
                'data' => [
                    'id' => $send->content->results[0]->message_id
                ]
            ];
        }
    }

}
