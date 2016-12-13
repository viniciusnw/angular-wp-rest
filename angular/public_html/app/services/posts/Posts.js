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
//  retorna uma promisse vinda do Service "REST"
//  
// ---------------------------------------------------------------------------
//

app.service('Posts', function (RestService) {

    var endpoint = 'posts';

    this.get = function () {
        
        return RestService.REST({
            endpoint: endpoint,
            method: 'GET'
        });
    };
});