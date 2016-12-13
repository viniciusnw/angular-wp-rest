// 
// ---------------------------------------------------------------------------
//
//  # RESTService - App
//
//  Version: 1.0
//  Homepage: *
//  Latest update: 12 Dez, 2016
//  Code~Review: Vinicius Inácio <viniciusnw@hotmail.com>
//  
//  DESC:
//  
//  Consome o Service "REST".
//  Formata os dados para realizar as requisicoes,
//  retorna uma promisse vinda ddo Service "REST"
//  
// ---------------------------------------------------------------------------
//

app.service('ServiceClass', function (RestService) {

    var endpoint = 'wp/v2';

    this.get = function () {
        
        return RestService.REST({
            endpoint: endpoint,
            authorization: false, 
            method: '',
            action: 'posts',
            data: {}
        });
    };
});