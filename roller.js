$('#roll_form').submit(function( event ){
    event.preventDefault();
    console.clear();
    
    var user = $('#user').val(),
        boost_number = $('#boost').val(),
        setback_number = $('#setback').val(),
        ab_number = $('#ab').val(),
        dif_number =  $('#dif').val(),
        prof_number = $('#prof').val(),
        ch_number = $('#ch').val(),
        force_number = $('#force').val(),

        boost = new Boost(),
        setback = new Setback(),
        ab = new Ab(),
        dif = new Dif(),
        prof = new Prof(),
        ch = new Ch(),
        force = new Force(), 
        result_str = '';
    
    // Boost
    for( var i=1; boost_number >= i; i++ ){
        result_str += boost.result()+"," ;
    }
    
    // Setback
    for( var i=1; setback_number >= i; i++ ){
        result_str += setback.result()+"," ;
    }
    
    // Ability
    for( var i=1; ab_number >= i; i++ ){
        result_str += ab.result()+"," ;
    }
    
    // Dificulty
    for( var i=1; dif_number >= i; i++ ){
        result_str += dif.result()+"," ;
    }
    
    // Proficiency
    for( var i=1; prof_number >= i; i++ ){
        result_str += prof.result()+"," ;
    }
    
    // Challenge
    for( var i=1; ch_number >= i; i++ ){
        result_str += ch.result()+"," ;
    }
    
    // Force
    for( i=1; force_number >= i; i++ ){
        result_str += force.result()+"," ;
    }
   
    console.log("RESULT: " + result_str);
    
    // Count results 
    var result_arr = result_str.split(','),
    
        success_count = 0,
        failure_count = 0,
        advantage_count = 0,
        threat_count = 0,
        triumph_count = 0,
        despair_count = 0,
        light_count = 0,
        dark_count = 0;
        
    console.log(result_arr);

    for(var j=0; j<result_arr.length; j++){
        if (result_arr[j] == 'success' ){
            success_count++;
        }
    }
    for(var j=0; j<result_arr.length; j++){
        if (result_arr[j] == 'failure' ){
            failure_count++;
        }
    }
    for(var j=0; j<result_arr.length; j++){
        if (result_arr[j] == 'advantage' ){
            advantage_count++;
        }
    }
    for(var j=0; j<result_arr.length; j++){
        if (result_arr[j] == 'threat' ){
            threat_count++;
        }
    }
    for(var j=0; j<result_arr.length; j++){
        if (result_arr[j] == 'triumph' ){
            triumph_count++;
        }
    }
    for(var j=0; j<result_arr.length; j++){
        if (result_arr[j] == 'despair' ){
            despair_count++;
        }
    }
    for(var j=0; j<result_arr.length; j++){
        if (result_arr[j] == 'light' ){
            light_count++;
        }
    }
    for(var j=0; j<result_arr.length; j++){
        if (result_arr[j] == 'dark' ){
            dark_count++;
        }
    }
    
    console.log("------------------");
    console.log(
        "succe " + success_count,
        "\nfailu " + failure_count,
        "\nadvan " + advantage_count,
        "\nthrea " + threat_count,
        "\ntrium " + triumph_count,
        "\ndespa " + despair_count,
        "\nlight " + light_count,
        "\ndark_ " + dark_count
    );
    
    console.log("************************");
    
    // Compare negative and positive results
    //
    success_count = success_count - failure_count;
    advantage_count = advantage_count - threat_count;
    
    // successes and failures
    if( success_count > 0 ){
        for( var l=0; success_count > l; l++){
            console.log("SUCCESS");
        }
    } else if (success_count < 0  ) {
        for( var l=0; Math.abs(success_count) > l; l++ ){
            console.log("FAILURE");
        }
    }
    
    // advantages and threats
    if( advantage_count > 0 ){
        for( var l=0; advantage_count > l; l++){
            console.log("ADVANTAGE");
        }
    } else if (advantage_count < 0  ) {
        for( var l=0; Math.abs(advantage_count) > l; l++ ){
            console.log("THREAT");
        }
    }
    
    // triumphs
    for( var l=0; triumph_count > l; l++ ){
            console.log("TRIUMPH");
        }
     
    // despairs   
    for( var l=0; despair_count > l; l++ ){
            console.log("DESPAIR");
        }
    // lights    
    for( var l=0; light_count > l; l++ ){
            console.log("LIGHT");
        }
    
    // darks    
    for( var l=0; dark_count > l; l++ ){
            console.log("DARK");
        }
    
    
    return false;
}); // function end


// Reset form fields
$('#reset').click(function(){
   $('#roll_form').find('input[type=number]').val('0'); 
});