"use_strict";

class Auth{
    static instance(options) {
        if (!Auth._instance) {
            Auth._instance = new Auth(options);
        }
        return Auth._instance;
    }

    loginPage(){
        Core.instance().content.innerHTML='' +
            ' <div class="row">\n' +
            '                <div class="offset-4 col-4">\n' +
            '                   \n' +
            '                        <div class="mb-3">\n' +
            '                            <label for="data_login" class="form-label">Логин</label>\n' +
            '                            <input type="text" class="form-control" id="data_login">\n' +
            '                        </div>\n' +
            '                        <div class="mb-3">\n' +
            '                            <label for="data_password" class="form-label">Пароль</label>\n' +
            '                            <input type="password" class="form-control" id="data_password">\n' +
            '                        </div>\n' +
            '                        <input type="button" value="Войти" id="btnLogin"  class="btn btn-primary">\n' +
            '                    \n' +
            '                </div>\n' +
            '            </div>';

        let btnLogin= Core.instance().content.querySelector('#btnLogin');
        btnLogin.addEventListener("click", (e)=>{
            let data ={};
            data.login= Core.instance().content.querySelector('#data_login').value;
            data.password= Core.instance().content.querySelector('#data_password').value;
            Core.instance().request('login',data);
        })
    }
    handleEvent(e){
        console.log(e);
    }


}