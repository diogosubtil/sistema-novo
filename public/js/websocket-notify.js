//WebSocket
var connectionWeb = new WebSocket('ws://127.0.0.1:8090');

connectionWeb.onopen = function(e) {
    // console.log("Connection established!");
};

connectionWeb.onmessage = function(e) {
    if(e.data === 'support'){
        messageSupport();
    }
};

function messageSupport() {
    notifysimple('Novo Suporte', 'inverse');
}
