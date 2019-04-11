

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Calculadora</title>
    <style type="text/css">
	
        body{
         background-color:gainsboro;   
                       
            }   
      
		fieldset{
			width: 30em;
			height: 30em;
			background-color:lavender;
			margin: 0 auto;
			
		}

		 

	</style>
</head>
 
<body>
<fieldset>
<h2>CALCULADORA</h2>
 <form title="Formulário Teste" id="formteste" name="formteste" action="calcular.php" method="GET">
    
   Valor 1: <input name="a" type="number" step="any" value="<? echo $a ?>"/><br />
   Valor 2: <input name="b" type="number" step="any" value="<? echo $b ?>"/>
   <br /><br />
     
   Selecione uma operação:<br />
     
     <select name="operacao">
     
     <option>Somar</option>
      <option>Subtracao</option>
     <option>Multiplicacao</option>
     <option>Divisao</option>
     <option>Potência</option>
     <option>Porcentagem</option>
     <option>Raiz</option>
     <option>Fatorial</option>
     
     
     </select>
   
   
    <br /><br />
   <input name="calcular" type="submit" value="Calcular"/>
  
   <br /><br />
</form>
    
    
    
 </fieldset>

</body>
 

</html>
 


 