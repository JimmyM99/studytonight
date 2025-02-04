<?php 

function br() {
    echo "<br/>";
}
function no_vowels($a){
    if (is_string($a)){
        $length=strlen($a);
        $chars = explode("",$a);
        $vowels=0;

        for($i=0;$i<$length;$i++){
            if($chars[$i]=="a" || $chars[$i]=="e" || $chars[$i]=="i" || $chars[$i]=="o" || $chars[$i]=="u"){
                $vowels++;
            }
        }

        return $vowels;
    }else{
        return "$a is not a string!";
    }
}

function max($a){
    $max = 0;

    foreach($a as $b){
        if($max<$b){
            $max=$b;
        }
    }

    return $max;
}

function min($a){
    
    $min = 0;
    foreach($a as $b){
        if($min>$b){
            $min=$b;
        }
    }
    return $min;
}

function sort_desc($b){

    if(is_array($b)){
        $length = sizeof($b);
        $c = $b;
        $num=0;

        for($i=0;$i<$length;$i++){
            if($c[0]==min($c)){
                array_shift($c);
            }else{
                $temp=$c[0];
                array_shift($c);
                array_push($c,$temp);
            }
        }

    }else{
        return "$b is not an  array!";
    }
}

function reverse($c){

}
?>