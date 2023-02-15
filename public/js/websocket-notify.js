//WebSocket
var connectionWeb = new WebSocket('ws://185.213.81.95:9090');

connectionWeb.onopen = function(e) {
    console.log("Connection established!");
};

connectionWeb.onmessage = function(e) {
    if(e.data === 'support'){
        messageSupport();
    }
};

function messageSupport() {
    notifysimple('Novo Suporte', 'inverse');
}
