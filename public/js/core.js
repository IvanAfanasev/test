"use_strict";



class Core{
    static instance() {
        if (!Core._instance) {
            Core._instance = new Core();
            Core._instance.content = document.querySelector('#content');
            Core._instance.request('init');
        }
        return Core._instance;
    }
    request(command,data={}){
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/', false);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        let datas = 'command='+command+'&data='+JSON.stringify(data);
        xhr.send(datas);
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
                Auth.instance().loginPage();
            }break;
            case 'home':{
                Home.instance().homePage()
            }break;
      }
    }
}


window.onload=function (){
    Core.instance();
}
