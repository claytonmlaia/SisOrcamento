function refreshAtDateTime(dateTime) {
    var agora = new Date();
    var valor = new Date(dateTime);

    valor.setSeconds( valor.getSeconds() + 1 );

    if(valor > agora) {
        var timeout = valor.getTime() - agora.getTime();
        window.setTimeout(function(){window.location.reload(true);},timeout);
    }
}