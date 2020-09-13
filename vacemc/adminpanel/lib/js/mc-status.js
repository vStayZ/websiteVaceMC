MinecraftAPI.getServerStatus('VaceMC.net', {
    port: 25565
}, function (err, status) {
    if (err) {
        return document.querySelector('.server-status').innerHTML = 'ERROR bitte an mich melden :P (@Webanwendung)';
    }
    document.querySelector('.server-online').innerHTML = status.online ? '<span class="online">ONLINE</span>' : '<span class="offline">OFFLINE</span>';
});
