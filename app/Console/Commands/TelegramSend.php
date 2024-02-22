<?php

namespace App\Console\Commands;

use App\Services\TelegramBotService;
use Illuminate\Console\Command;

class TelegramSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:telegram-send {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Отправить сообщение в ТГ';

    /**
     * Execute the console command.
     */
    public function handle(TelegramBotService $service)
    {
        $service->sendMessage($this->argument('message'));
    }
}
