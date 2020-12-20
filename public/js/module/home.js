"use_strict";

class Home{
    static instance() {
        if (!Home._instance) {
            Home._instance = new Home();
        }
        return Home._instance;
    }
    homePage(data){

        Core.instance().content.innerHTML = '<br>' +
            '<h3>Товары<button id="btnAddProduct" type="submit" style="float: right" class="btn btn-primary">Добавить товар</button></h3> ' +
            '<table class="table">\n' +
            '  <thead>\n' +
            '    <tr>\n' +
            '      <th scope="col">#</th>\n' +
            '      <th scope="col">Название</th>\n' +
            '      <th scope="col">Колличество</th>\n' +
            '      <th scope="col">Дата добавления</th>\n' +
            '    </tr>\n' +
            '  </thead>\n' +
            '  <tbody id="productTable">\n' +

            '  </tbody>\n' +
            '</table>';
        let tableHtml='';
        data.forEach((item) => {
            tableHtml+='    <tr>\n' +
                '      <th scope="row">'+item.id+'</th>\n' +
                '      <td>'+item.name+'</td>\n' +
                '      <td>'+item.quantity+'</td>\n' +
                '      <td></td>\n' +
                '    </tr>\n';
        });
        Core.instance().content.querySelector('#productTable').innerHTML=tableHtml;
        let btnAddProduct= Core.instance().content.querySelector('#btnAddProduct');
        btnAddProduct.addEventListener("click", (e)=>{
            let name  = prompt('Название');
            if(name!==null){
                let data ={};
                data.name= name;
                Core.instance().request('addProduct',data);
            }
        })
    }

}