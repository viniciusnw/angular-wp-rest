// 
// ---------------------------------------------------------------------------
//
//  # Main - App
//
//  Version: 1.0
//  Homepage: *
//  Latest update: 12 Dez, 2016
//  Code~Review: Vinicius Inácio <viniciusnw@hotmail.com>
//
// ---------------------------------------------------------------------------
//

"use strict";

/*
 * Main module name
 * 
 * @type angular.module.angular-1_3_6_L1749.moduleInstance
 */
var app = angular.module('app', [
    'ui.router',
    'ngCookies',
    'ngAnimate',
    'angular-loading-bar',
    'ui.bootstrap'
]);

/*
 * Contantes
 * 
 */

// App configuration constants
app.constant('$frontendUrl',    'http://localhost:8000');

// url api dev
app.constant('$urlApiLocal',    'http://wp-api/wp-json/wp/v2');

// url api oficial
app.constant('$urlApiOficial',  'http://URL_API_OFICIAL');

/*
 * Url do host Oficial
 * 
 * Ex:
 * Host: http://www.meuhost.com.br
 * app.constant('$urlHostOficial', 'meuhost.com.br');
 */
app.constant('$urlHostOficial', 'URL_HOST_OFICIAL');

/*
 * App initialization
 */
app.run( function( $rootScope ) {
    
    $rootScope.$on('$routeChangeStart', function(event, nextRoute, currRoute) {

    });
});