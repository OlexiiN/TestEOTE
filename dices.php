<?php

class Dice{
    function roll(){
        return rand(1, $this -> max);
    }
}
/*
* Setback
*/
class Setback extends Dice{
    function __construct(){
        $this -> max = 6;
    }
    
    function result(){
        switch( $this -> roll() ){
            case 1:
            case 2: 
                return "blank";
                break;
            case 3:
            case 4:
                return "failure";
                break;
            case 5:
            case 6: 
                return "threat";
                break;
        }
    }
}
/*
* Boost
*/
class Boost extends Dice{
    function __construct(){
        $this -> max = 6;
    }
    
    function result(){
        switch( $this -> roll() ){
            case 1:
            case 2: 
                return "blank";
                break;
            case 3: 
                return "success";
                break;
            case 4:
                return "success,advantage";
                break;
            case 5:
                return "advantage,advantage";
                break;
            case 6: 
                return "advantage";
                break;
        }
    }
}
/*
* Ability
*/
class Ab extends Dice{
    function __construct(){
        $this -> max = 8;
    }
    
    function result(){
        switch( $this -> roll() ){
            case 1:
                return "blank";
                break;
            case 2: 
            case 3: 
                return "success";
                break;
            case 4:
                return "success,success";
                break;
            case 5:
            case 6:
                return "advantage";
                break;
            case 7:
                return "success,advantage";
                break;
            case 8:
                return "advantage,advantage";
                break;
        }
    }
}

/*
* Dificulty
*/
class Dif extends Dice{
    function __construct(){
        $this -> max = 8;
    }
    
    function result(){
        switch( $this -> roll() ){
            case 1:
                return "blank";
                break;
            case 2: 
                return "failure";
                break;
            case 3: 
                return "failure,failure";
                break;
            case 4:
            case 5:
            case 6:
                return "threat";
                break;
            case 7:
                return "threat,threat";
                break;
            case 8:
                return "failure,threat";
                break;
        }
    }
}

/*
* Dificulty
*/
class Prof extends Dice{
    function __construct(){
        $this -> max = 12;
    }
    
    function result(){
        switch( $this -> roll() ){
            case 1:
                return "blank";
                break;
            case 2: 
            case 3:
                return "success";
                break;
            case 4:      
            case 5:
                return "success,success";
                break;
            case 6:
                return "advantage";
                break;
            case 7:
            case 8:
            case 9:
                return "success,advatage";
                break;
            case 10:
            case 11:
                return "advantage,advantage";
                break;
            case 12:
                return "triumph";
                break;
        }
    }
}

/*
* Challenge
*/
class Ch extends Dice{
    function __construct(){
        $this -> max = 12;
    }
    
    function result(){
        switch( $this -> roll() ){
            case 1:
                return "blank";
                break;
            case 2: 
            case 3:
                return "failure";
                break;
            case 4:      
            case 5:
                return "failure,failure";
                break;
            case 6:
            case 7:
                return "threat";
                break;
            case 8:
            case 9:
                return "failure,threat";
                break;
            case 10:
            case 11:
                return "threat,threat";
                break;
            case 12:
                return "despair";
                break;
        }
    }
}

/*
* Challenge
*/
class Force extends Dice{
    function __construct(){
        $this -> max = 12;
    }
    
    function result(){
        switch( $this -> roll() ){
            case 1:
            case 2: 
            case 3:
            case 4:      
            case 5:
            case 6:
                return "dark";
                break;
            case 7:
                return "dark,dark";
                break;
            case 8:
            case 9:
                return "light";
                break;
            case 10:
            case 11:
            case 12:
                return "light,light";
                break;
        }
    }
}






