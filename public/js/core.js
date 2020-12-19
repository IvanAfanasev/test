"use_strict";

import {auth} from './module/auth.js';

class core{
    constructor() {
        this.content = document.querySelector('#content');
        this.request('init');
    }
    request(command){
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/', false);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        let data = 'command='+command;
        xhr.send(data);
        if (xhr.status != 200) {
            alert( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
        } else {
            let res = JSON.parse(xhr.responseText);
            this.getCommand(res.command)
        }
    }
    getCommand(command){
        switch (command){
            case 'auth':{

            }break;
            case 'home':{

            }break;
      }
    }
}


window.onload=function (){
    new core();
}
