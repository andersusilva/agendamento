<?
  $linha=file("contador.txt"); //define arquivo onde ficara gravado os acessos

  if ($var=="jaentrou"){         //verifica cookie
    echo "$linha[0]";            //imprime linha 0 caso cookie existente
  }else{                         //<-+          
  $visitas = $linha[0];          //  |
  $visitas += 1;                 //  |
  $cf=fopen("contador.txt","w"); //  |->incrementa 1 ao contador e exibe linha 0
  fputs($cf,"$visitas");         //  |  se cookie inexistente
  fclose($cf);                   //  |
  // echo "$visitas";               //  |
  }                              //<-+
?>