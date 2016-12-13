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
//  DESC: 
//   
//  Formata um array com referencia de outro.
//  Recebe um array default e outro de argumetos,
//  caso o array de argumentos não possua os mesmos indices do default
//  o indice é criado com o valor do default
// 
// ---------------------------------------------------------------------------
//

app.factory('SetDefaultArgs', function (){
    
    // Factory
    return{
        
        set: function( defaults, args ){
            
            for(var d in defaults ){
                
                for(var a in args ){
                    
                    if( d == a ){
                        
                        if( args[a] ){
                            
                            defaults[d] = args[a];
                        }
                    }
                }
            }
            
            return defaults;
        }
    };
});
