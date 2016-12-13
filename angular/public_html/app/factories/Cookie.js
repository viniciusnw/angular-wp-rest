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

app.factory('Cookie', function ( $cookies ){
    
    var key = 'cookie';
    
    //Factory
    return{
        
        set: function( key, value, options ){
            $cookies.put( key, value, options );
        },
        
        get: function( key ){
            return $cookies.get( key );
        },
        
        remove: function( key ){
        
            $cookies.remove( key );
        }
    };
});
