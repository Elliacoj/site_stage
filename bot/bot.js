// node bot.js localhost
const http = require('http');
const url = require('url');
const Discord = require('discord.js');
const bot = new Discord.Client();

bot.on('ready', function () {
    console.log("Je suis connecté !");
})

bot.on("message", function (message) {
    if(message.content === 'ping') {
        message.reply('pong');
    }
    else if(message.content.toLowerCase().includes('jerome') && message.content.endsWith('?') && !message.content.includes('google')) {
        message.reply(encodeURI('https://google.fr/search?q=' + message.content.toLowerCase().replace('jerome', '')));
    }
    else if(message.content.endsWith('?')) {
        message.reply('On verra plus tard '+ message.author.username +'!')
    }
})

bot.login('ODI2MDIzMDM2MzU2Mzk1MDEx.YGGb5g.DmEHekAzdYrfz6TPz5R0pythdRs');


http.createServer(function(request, res) {
    // Website you wish to allow to connect
    res.setHeader('Access-Control-Allow-Origin', 'http://localhost:8000');

    // Request methods you wish to allow
    res.setHeader('Access-Control-Allow-Methods', 'GET');
    res.writeHead(200, {'Content-Type': 'text/plain'});

    //    loclahost:3000/message?doc=
    if(request.url.startsWith('/message')) {
        const data = url.parse(request.url, true).query;
        //console.log(data.doc);
        //console.log(bot.channels);
        bot.channels.cache.get('768013093040947230').send(data.doc);
    }
    res.end();
}).listen(3000);
