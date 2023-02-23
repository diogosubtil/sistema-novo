<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class WebSocketControllerChat extends Controller implements MessageComponentInterface
{
    protected $clients;
    protected $messages;
    protected $users;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        //echo "New connection! ({$conn->resourceId})\n";

        //VERIFICA SE EXISTE MENSAGEM PARA O CHAT
        if (isset($this->messages)) {
            $json = '['.$this->messages.']';
            $conn->send($json);
        }
    }

    public function onMessage(ConnectionInterface $from, $msg) {

        //  $numRecv = count($this->clients) - 1;
        // echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
        // , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        //VERIFICA SE É EXISTE A VARIAVEL DE messages
        if (!isset($this->messages)) {
            $this->messages = json_encode($msg);
        } else {
            $this->messages .= ', '.json_encode($msg);
        }

        //ENVIA A MENSAGEM PARA TODOS MENOS PARA O PROPRIO USUARIO
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }

    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        //echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
