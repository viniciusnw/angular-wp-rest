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

app.config(function ($stateProvider) {

    $stateProvider.state( 
        {   
            name: "home",
            url: "",
            templateUrl: 'views/pages/home.html',
            controller: 'Home as home'
        }
    );
});