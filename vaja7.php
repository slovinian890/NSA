<?php

function napolni($n){
    $t = [];
    $s=0;
    for($i=0;$i<$n;$i++){
        $q=array();
        if($s==0){
            $q[]= '*';
            for($j=0;$j<$n-1;$j++){
            $q[]= '0';
            }

        $t[$i]=$q;
        $s++;

        continue;
        }

        if($s!=0){
            for($j=0;$j<$s;$j++){
            $q[]= '6';    
            }
            $q[]= '*';
        }
            for($j=0;$j<$n-$s-1;$j++){
                $q[]= '0'; 
            }

        $t[$i]=$q;
        $s++;
    }
izpis($t,$n);
}
function izpis($t,$n){
    echo"<style>
        table, td{
            border:2px solid black;
            padding-left:10px;
            padding-right:10px;
            text-align:center;

        }
        table{
            border-collapse:collapse;
        }
    
    </style>";
    echo"<table>";
    for($i=0;$i<$n;$i++){
        echo"<tr>";
        for($j=0;$j<$n;$j++){
            echo"<td>{$t[$i][$j]}</td>";
        }
        echo"</tr>";

    }

    echo"</table><br><br><br>";
    izpis2($t,$n);
}

function izpis2($t, $n){
    echo"<style>
    table, td{
        border:2px solid black;
        padding-left:10px;
        padding-right:10px;
        text-align:center;

    }
    table{
        border-collapse:collapse;
    }

</style>";
echo"<table>";
    $s=0;
    for($i=0;$i<$n;$i++){
        echo"<tr>";
        for($j=0;$j<$n;$j++){
            if(0==$i-$j){
            echo"<td style='background-color:green;'>{$t[$i][$j]}</td>";
            continue;
            }
            if($t[$i][$j]==6){

                echo"<td style='background-color:red;'>{$t[$i][$j]}</td>";
            }
            if($t[$i][$j]==0){
                echo"<td style='background-color:blue;'>{$t[$i][$j]}</td>";
            }
        }
        echo"</tr>";
    
    }
    echo"</table><br><br><br>";

}

$w=rand(2,8);
echo"$w <br>";
napolni($w);



echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";

function napolni21(){
    $t=array();
    $w=0;
    for($j=0;$j<20;$j++){
    $q=rand(1,10);
    $t[]=$q;
        $w+=$q;
    }
    print_r($t);
    echo"<br><br> anjvecji je: $w<br><br>";
prepis($t,$w);
}
function prepis($t,$w){
    $e=array();
    for($j=0;$j<20;$j++){
        $r=$w-$t[$j];
        $e[]=$r;
    }

    print_r($e);
    izpis32($t, $e);
}
function izpis32($t, $e){
    echo"<br>";    echo"<br>";
    echo"<style>
    hr{
        border:2px solid red;
        width:80%;
    }
    .c1, .c12{
        border:1x solid grey;
        background-color: silver;
        color:white;
        padding-left:10px;
        padding-right:10px;
        text-align:center;
    }
    table{
        border-collapse:collapse;
        margin-left:auto; margin-right:auto;
    }
    .c2, .c22{
        border:2px dashed blue;
        background-color:lightblue;
        font-size:14px;
        padding-left:10px;
        padding-right:10px;
        text-align:center;
    }

</style>";
echo"prvi izpis: <br>";
echo"<table class='c1'><tr>";
for($j=0;$j<20;$j++){
    echo"<td class='c12'>{$t[$j]}</td>";
}
echo"</tr></table><br>";
echo"<table class='c1'><tr>";
for($j=0;$j<20;$j++){
    echo"<td class='c12'>{$e[$j]}</td>";
}
echo"</tr></table><br>";
echo"<hr><br>";
echo"drugi izpis: <br>";

$d=array_reverse($t);
$g=array_reverse($e);



echo"<table class='c2'><tr>";
for($j=0;$j<20;$j++){
    echo"<td class='c22'>{$d[$j]}</td>";
}
echo"</tr></table>";

echo"<table class='c2'><tr>";
for($j=0;$j<20;$j++){
    echo"<td class='c22'>{$g[$j]}</td>";
}
echo"</tr></table><br>";

}
napolni21();

echo"<br>";
echo"<br>";
echo"<br>";



function pretvorba(){
    $q=array();
    for($i=0;$i<8;$i++){
$r=rand(1,0);
        $q[]=$r;
    }

    $desetiska=0;
    $dvojiska =(string)implode('',$q);

    $e=0;
    for($i=0;$i<8;$i++){
        if(1==$q[$i]){
        $desetiska += 2**$e;

        }
        $e++;
    }


    echo"$desetiska  in <br>";
    print_r($q);
    echo"<br><br><br><br>";
    echo"<style>
    table, td{
        border:2px solid black;
        padding-left:10px;
        padding-right:10px;
        text-align:center;

    }
    table{
        border-collapse:collapse;
    }

</style>";
echo"<table>";
    echo"<tr><td>dvojisko</td><td>desetisko</td></tr>";
    echo"<tr><td>$dvojiska</td><td>$desetiska</td></tr>";
echo"</table>";

drugapretvorba($dvojiska, $desetiska);
}
function drugapretvorba($dvojiska, $desetiska){
if($dvojiska[0]==0){
   echo"ni negativna";
   return; 
}
else{
    $desetiska *= (-1);
    echo"<br><br><br><br>";
    echo"<style>
    table, td{
        border:2px solid black;
        padding-left:10px;
        padding-right:10px;
        text-align:center;

    }
    table{
        border-collapse:collapse;
    }

</style>";
echo"<table>";
    echo"<tr><td>dvojisko</td><td>desetisko</td></tr>";
    echo"<tr><td>$dvojiska</td><td>$desetiska</td></tr>";
echo"</table>";
}

}
pretvorba();

echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";

function jakec(){
    $t=[];
    for($i=0;$i<10;$i++){
       $s= chr(rand(97,122));
        $t[]=$s;
    }
    print_r($t);
    $e=(string)implode('',$t);
    $samo='';
    $so='';
    for($i=0;$i<10;$i++){
        if($t[$i]=='a'||$t[$i]=='e'||$t[$i]=='i'||$t[$i]=='o'||$t[$i]=='u'){
            $samo.=$t[$i];
        }
        else{
            $so.=$t[$i];
        }
     }
    $samo1=strlen($samo);
    $so1=strlen($so);
    $j=0;
    $z=ord($t[0]);
    for($i=0;$i<10;$i++){
        if(ord($so[$i])<$z){
            $j=$i;
            $z=ord($so[$i]);
        }
    }
    echo"<br>Beseda: $e<br>samoglasnikki: $samo dolzina je: $samo1 <br> soglasniki: $so dolzina je: $so1<br> prvi soglasnik po abecedi {$t[$j]}";
}
jakec();


echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
$t = [
    "Žan" => ["Špageti", "Rižota", "Palačinke"],
    "Špela" => ["Piščanec", "Njoki", "Jota", "Čežana"],
    "Črt" => ["Zrezek", "Štruklji", "Krompirček","Čevapčiči"],
    "Živa" => ["Lazanja", "Juha", "Rižev narastek"],
    "Tjaša" => ["Ocvrti sir", "Šopska solata", "Jabolčni zavitek"],
    "Miha" => ["Goveja juha", "Dunajski zrezek", "Sladoled"],
];
function razvrsti6(&$t) {
    $slo = collator_create("sl_SI");


    uksort($t, function($a, $b) use ($slo) {
        return collator_compare($slo, $a, $b);
    });

    foreach ($t as &$foods) {
        usort($foods, function($a, $b) use ($slo) {
            return collator_compare($slo, $a, $b);
        });
    }
}
razvrsti6($t);
print_r($t);
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";

$t=array("bela","modra","bela","rdeča","zelena","bela","rdeča","zelena","bela");

function stevecbarv($t){
    $ta=[];
    for($i=0;$i<count($t);$i++){
        if(isset($ta[$t[$i]])){
            $ta[$t[$i]]++;
        }
        else{
            $ta[$t[$i]]=1;
        }
    }
    print_r($ta);
    pogostost($ta);
}
function pogostost($ta){
    echo"<br>";
    echo"<br>";
    echo"<br>";

    asort($ta);
    print_r($ta);
    echo"<br>";
$r=max($ta);
$g=min($ta);
    echo"<br>najpogostje: $r";
    echo"<br>najmanjkrat: $g";
}
stevecbarv($t);

?>