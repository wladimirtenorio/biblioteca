

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Calculadora</title>
</head>
 <style>
    
     fieldset{
         background-color: antiquewhite;
     }
    
    
    
    </style>
<body>
    <fieldset>
    <?php
    if($_GET){
       $a = $_GET["a"];
       $b = $_GET["b"];
       $operacao =$_GET["operacao"];
       $i = $_GET["a"];
       $calc = 1;

    if($operacao == "Somar"){
      $total = $a + $b;
         echo "A soma é: ".$total;
        
    }else if($operacao == "Subtracao"){
        $total = $a - $b;
         echo "A subtração é: ".$total;
        
    }else if($operacao == "Multiplicacao"){
        $total = $a * $b;
         echo "A mutiplicação é: ".$total;
        
    }else if($operacao == "Divisao"){
        $total = $a / $b;
         echo "A divisao é: ".$total;
        
    }else if($operacao == "Potência"){
        $total=pow($a,$b);
         echo "A potência é: ".$total;
        
    }else if($operacao == "Porcentagem"){
        $total = ($a * $b)/100;
         echo "A porcentagem é: ".$total." %";
        
        
    } else if($operacao == "Raiz"){
        if ($a<0 && $b%2!=0){
            $total=pow($a*(-1), 1/$b);
            $total = $total*(-1);
        }else{
           $total=pow($a, 1/$b); 
        }
       echo "A raiz é: ".$total;
       
    }else if($operacao == "Fatorial"){
        while ($i > 1){
        $calc *= $i;
        $i--;
    }

    echo "O Fatorial de $a é : ".$calc;
 
         }
       
    }
       
       
       
        
      
        
        

      
                                           
                                           
                                           
?>


    
    
    
    </fieldset>

  
    
    
</body>
 

</html>
 

