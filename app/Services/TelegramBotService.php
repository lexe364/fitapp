<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

class TelegramBotService {
    private $settings = [];
    protected $chat_id =null;
    private $bot_password = null;
    private $bot_id=null;

    public function __construct() {
        $this->chat_id = config('telegram.chat_id');
        $this->bot_id = config('telegram.bot_id');
        $this->bot_password = config('telegram.bot_password');
    }


    public function sendMessage($text=''){
        if(empty($this->bot_id)){
            return false;
        }
        $text = '<b>'.env('APP_NAME').'</b> '.date('H:i:s')."\n".
            $text;
        return Http::post('https://api.telegram.org/'.$this->bot_id.':'.$this->bot_password.'/sendMessage',
                   ['chat_id'=>$this->chat_id,
                    'parse_mode'=>'HTML',
                    'text'=>$text]);
    }
}
