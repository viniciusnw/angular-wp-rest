// 
// 
// ---------------------------------------------------------------------------
//
//  # Factory - App
//
//  Version: 1.0
//  Homepage: *
//  Latest update: 12 Dez, 2016
//  Code~Review: Vinicius Inácio <viniciusnw@hotmail.com>
//
// ---------------------------------------------------------------------------

app.factory('Token', function ( Cookie ){
    
    // Default key cookie token
    var key = 'token';
    
    // Factory
    return{
        
        set: function( token, options){
         
            Cookie.set( key, token, options );
        },
        
        get: function( ){
            return Cookie.get( key );
        },
        
        remove: function(){
            
            Cookie.remove( key );
        }
    };
});
