"use_strict";

class Home{
    static instance() {
        if (!Home._instance) {
            Home._instance = new Home();
        }
        return Home._instance;
    }
    homePage(){
        Core.instance().content.innerHTML = 'home';
    }

}