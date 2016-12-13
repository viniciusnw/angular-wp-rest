// 
// 
// ---------------------------------------------------------------------------
//
//  # Routes - App
//
//  Version: 1.0
//  Homepage: *
//  Latest update: 12 Dez, 2016
//  Code~Review: Vinicius Inácio <viniciusnw@hotmail.com>
//
// ---------------------------------------------------------------------------

app.config(function($routeProvider){
    
    $routeProvider
        
        // Rota Inicial
        .when('/home',{
            // Template html
            templateUrl:  'views/pages/home.html',
            // Controller
            controller:   'Home',
            // Instancia do controller
            controllerAs: 'home',
            // Parametros
            data: {
                access: 'public'
            }
        })
        
        /* ==========================================
         * 
         * Rota DEFAULT
         * 
         * Rota default, quando alguma rota não for 
         * encontrada
         * ==========================================
         */
        .otherwise({
            redirectTo: '/home'
        });
});