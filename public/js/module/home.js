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
            '      <th scope="col"></th>\n' +
            '      <th scope="col"></th>\n' +
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
                '      <td>'+item.date+'</td>\n' +
                '      <td><button data-id="'+item.id+'" data-actiontype="1" type="button" class="btn btn-success btnProductAction">Приход</button>' +
                '       <button data-id="'+item.id+'" data-actiontype="2" type="button" class="btn btn-danger btnProductAction">Расход</button>' +
                '       <button data-id="'+item.id+'" type="button" class="btn btn-info btnProductActionHistory">История операций</button>' +
                '</td>\n' +
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
        let btnProductAction= Core.instance().content.querySelectorAll('.btnProductAction');
        for (let i = 0, len = btnProductAction.length; i < len; i++) {
            btnProductAction[i].addEventListener("click", ()=>{
                let productID=btnProductAction[i].getAttribute('data-id');
                let actionType=btnProductAction[i].getAttribute('data-actiontype');
                let text ='';
                if(actionType==1){
                    text='Приход';
                }else {
                    text='Расход';
                }
                let quantity  = prompt(text+' - Колличество');
                let data ={};
                data.productid = productID;
                data.actiontypeid = actionType;
                data.quantity = quantity
                Core.instance().request('addActionProduct',data);
            }, false);
        }
        let btnProductActionHistory = Core.instance().content.querySelectorAll('.btnProductActionHistory');
        for (let i = 0, len = btnProductActionHistory.length; i < len; i++) {
            btnProductActionHistory[i].addEventListener("click", ()=>{
                let data ={};
                data.productid = btnProductActionHistory[i].getAttribute('data-id');
                Core.instance().request('productActionHistory',data);
            })

        }
    }
    productHistory(data){
        let  historyModal =  document.querySelector('#historyModal');
        historyModal.style.display = 'block';
        let closeModal =document.querySelector('#historyModal');
        closeModal.addEventListener('click',()=>{
            historyModal.style.display = 'none';
        })
        let tableHtml='';
        data.forEach((item) => {
            let text ='';
            if(item.actiontypeid==1){
                text='Приход';
            }else {
                text='Расход';
            }
            tableHtml+='<tr>\n' +
                '      <th scope="row">'+item.id+'</th>\n' +
                '      <td>'+text+'</td>\n' +
                '      <td>'+item.quantity+'</td>\n' +
                '      <td>'+item.login+'</td>\n' +
                '      <td>'+item.date+'</td>\n' +
                '</td>\n' +
                '    </tr>\n';
        });
        document.querySelector('#historyTable').innerHTML=tableHtml;
    }

}