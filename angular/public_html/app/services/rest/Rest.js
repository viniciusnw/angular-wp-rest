// 
// ---------------------------------------------------------------------------
//
//  # REST - App
//
//  Version: 1.0
//  Homepage: *
//  Latest update: 12 Dez, 2016
//  Code~Review: Vinicius Inácio <viniciusnw@hotmail.com>
//  
//  DESC:
//  
//  Service padrão para requisicoes REST( POST, GET, OPTION, PUT, DELETE ).
//  Retorna uma promisse
//  
//  https://developer.wordpress.org/rest-api/reference/#rest-api-developer-endpoint-reference
//  
// ---------------------------------------------------------------------------
//

app.service('RestService', function ($http, $urlApiLocal, $urlApiOficial, $urlHostOficial, Token, $location, SetDefaultArgs) {

    /* *
     * Servicos REST
     * 
     * @param @endpoint      {String}:  Endpoit padrao vindo do service
     * @param @authorization {bool}:   Envio do toke
     * @param @method        {String}:   GET, POST, PUT, DELETE
     * @param @action        {String}: Complemento da url
     * @param @data          {Json}:   Array de dados para envio
     *
     * @returns Promessa das requisicoes
     */
    this.REST = function ( args ) {
        
        /*
         * Formata o parametro com os dados default e/ou os dados enviados
         */
        args = SetDefaultArgs.set({
            endpoint: '',
            authorization: false, 
            method: 'POST',
            action: '',
            data: {}
        }, args);
        
        /*
         * Defalt Headers for requests
         * Monta o header de acordo com o endpoit solicitado
         */
        var defaultHeaders = {
            'Content-Type': 'application/json; charset=UTF-8',

            // Envia o token na requisicao caso seja necessario
            'Authorization': (function () {

                if (args.authorization) {
                    return 'Bearer ' + Token.get();
                }
            })()
        };
        
        /*
         * Seta o array base para a requisicao
         */
        var config = {
            'method': args.method,
            // Url da Api
            'url': (function () {

                var host = $location.host();

                // Acesso Oficial
                if (host == $urlHostOficial || host == 'www.' + $urlHostOficial ) {

                    return $urlApiOficial;
                }
                // Acesso localhost
                else {

                    return $urlApiLocal;
                }
            })() + '/' + args.endpoint + '/' + args.action,
            'headers': defaultHeaders,
            'data': args.data
        };

        /*
         * Cria e retorna a promisse
         */
        return $http(config)
                // Requisicao completa
                .success( getCustomerComplete )
                // Verificação de erro a nivel de falha de requisicao
                .error( getCustomerFailed )
                // Finally
                .finally( function() {
                    console.log("Finished Resquest!");
                });
    };

    /*
     * Success Resquest ajax
     */
    function getCustomerComplete(response) {

        console.log(response);
    }

    /*
     * Failed Resquest ajax
     */
    function getCustomerFailed( response, status, b, request ) {

        // Error
        console.log('Request Error!!');
        console.log(response);
        console.log(request);
    }
});