<?php

namespace App\Console\Commands;

use App\Http\Controllers\WebSocketControllerChat;
use Illuminate\Console\Command;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class WebSocketServerChat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'websocketChat:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $chat = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new WebSocketControllerChat()
                )
            ),
            8055
        );

        $chat->run();

    }
}
