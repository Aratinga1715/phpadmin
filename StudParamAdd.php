<!DOCTYPE html>
<html>
<!-- комментарий -->
<head>
  <meta charset="utf-8" />
  <title>Список студентов</title>
  <style>
   .colortext { font-family: 'Tahoma';
    font-size: 13pt;  margin: 5px;
    background-color: rgb(226,255,200);
    color: navy;
   }
   ttable {
    font-size: 13pt;  margin: 5px;
    background-color: #ffffaf;
    color: navy;
   }
   tTABLE {
    width: 300px;
    border: 2px solid black;
    background: #778899;
    color: white;
   }
   TABLE {
    font-size: 13pt;
    width: 850px;
    border: 2px solid black;
    background-color: #ffffaf;
    color: navy;
    text-align: center; padding: 2px; margin-left: auto; margin-right: auto; margin-bottom: 4px;
   }
   TD, TH {
    text-align: center;
    padding: 2px;
    background-color: #ffafff;
    color: navy;
    border: 1px solid navy;
   }
   TH {
    color: white;
    background-color: #FF1177;
   }
   .button1 { font-family: 'Tahoma';
           background-color: #008CBA; font-size: 22px; padding: 6px 10px;
           border-radius: 10px; border: 1px solid #4CAF50; color: yellow;
           cursor: pointer; text-align: center;
           }
  .button1:hover { box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.39); }
  div { font-family: 'Tahoma'; font-size: 16pt; 
        color: green; background-color: rgb(250,240,130); width: auto; text-align: center; margin: 3px; padding: 4px; }
  div:hover { font-family: 'Tahoma';
      box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.39); }
  .interface  { font-family: 'Tahoma'; font-size: 16pt; color: navy; background-color: rgb(250,240,130); 
                padding: 5px; width: auto; margin-top: 5px; margin-bottom: 5px; margin-left: auto; margin-right: auto; }
  .interface1 { font-family: 'Tahoma'; font-size: 16pt; color: navy; background-color: rgb(230,250,130); 
                padding: 5px; width: auto; margin-top: 5px; margin-bottom: 5px; margin-left: auto; margin-right: auto; }
  </style>
</head>
<body class="colortext">
<?php
  $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $permitted_numbs = '0123456789';

  $LastName  = trim($_POST['LastName']);
  $FirstName = trim($_POST['FirstName']);
  $OtchName  = trim($_POST['OtchName']);

  require_once('MyConnect.php'); MyConnectOtvet();
  if ( !$ConnectOtvet )
  {
      echo '<form method="post" action="GroupList.php?SpecParam='.$_GET['SpecParam'].
                                 '&GroupParam='.$_GET['GroupParam'].
                                 '&GodParam='.$_GET['GodParam'].
                                 '&SpecKodParam='.$_GET['SpecKodParam'].
                                 '&AddMessage='.$AddMessage.
                                 '&LastName='. $LastName.
                                 '&FirstName='.$FirstName.
                                 '&OtchName='. $OtchName.
                                 '&FO='.$_GET['FO'].'">';
      $AddMessage = "ошибка соединения с сервером...";
      echo'<input hidden type = "text" name="Return" value = "Yes">';
      echo '<div class="interface1" style="margin-top: -28px;"><font color="red">Сообщение: </font>'.$AddMessage.
           ' <input class = "button1" type="submit" value="В ы х о д">'; 
      echo '</div>';
      echo '</form>';
      exit();
  }
  if ( $ConnectOtvet )
  {
  $db_table = 'students';
  // Проверка повтора студента:
  $myquery = 'select `LastName`, `FirstName`, `OtchName` from '.$db_table.
         ' where `fo` = "'.$_GET['FO'].
           '" and `kod_spec` = "'.$_GET["SpecKodParam"].
           '" and kod_group = "'.$_GET['GroupParam'].
           '" and kod_god   = "'.$_GET['GodParam'].
           '" and LastName  = "'.$LastName.
           '" and FirstName = "'.$FirstName.
           '" and OtchName  = "'.$OtchName.'"';
   $res = $mysqli->query($myquery);
   $flag = true; 
   if ( $res ) { } 
        else { $AddMessage = "ошибка выполнения запроса..."; $flag = false; }
   if ( $res )
   {
      if ( $res->num_rows == 0 ) { }
      else { $AddMessage = "такой студент в группе уже есть..."; $flag = false; }
   }
}  // Есть connect...
if ( $flag )
{
  //пишем в группу нового студента:
  $Log = substr(str_shuffle($permitted_chars), 0, 10);
  $Pas = substr(str_shuffle($permitted_numbs), 0, 10);
  if ( ($LastName == '')||($FirstName == '')||($OtchName == '') )
       { $AddMessage = 'поля ФИО - пустые, добавления нет...'; }
       else
       {
	$query_max = 'select max(id_stud) MaxId from '.$db_table;
        $result_max = $mysqli->query($query_max);
        if ( $result_max )
        {
          if ( $result_max->num_rows == 1 )
          {
            if ( $row = $result_max->fetch_assoc() )
               { $idSpec = $row['MaxId']; }
            else { $idSpec = 0; }
          }
          else { $idSpec = 0; }
          $newIdSpec = $idSpec + 1; //die('->'.$newIdSpec);
          // есть новый номер...
          $query_ins = 'INSERT INTO '.$db_table.
                ' (id_stud, fo, kod_god, kod_spec, kod_group, LastName, FirstName, OtchName, login, password) VALUES ('.
		        '"'.$newIdSpec.'"'.','.
                '"'.$_GET["FO"].'"'.','.
                '"'.$_GET["GodParam"].  '"'.','.'"'.$_GET["SpecKodParam"].'"'.','.
                '"'.$_GET["GroupParam"].'"'.','.'"'.$LastName.'"'.','.
                '"'.$FirstName.         '"'.','.'"'.$OtchName.'"'.','.
                '"'.$Log.               '"'.','.'"'.$Pas.'"'.
                ')';
          $res_ins = $mysqli->query($query_ins);
          if ( !$res_ins ) { $AddMessage = 'ошибка добавления...'; }
	}
	else { $AddMessage = 'ошибка доступа к данным...'; }
       }
    if ( ($LastName == '')||($FirstName == '')||($OtchName == '') )
       {$AddMessage = 'поля ФИО - пустые, добавления нет...';}
    else
    if ( ( !$res_ins ) || ( !$result_max ) ) { $AddMessage = 'студент '.
                                          $LastName.' '.$FirstName.' '.$OtchName.' - не добавлен (ошибка запроса)...'; }
    else { $AddMessage = 'студент '.$LastName.' '.$FirstName.' '.$OtchName.' - добавлен...'; }
}
else { }
     $path = 'GroupList.php?SpecParam='.$_GET['SpecParam'].
                                 '&GroupParam='.$_GET['GroupParam'].
                                 '&GodParam='.$_GET['GodParam'].
                                 '&SpecKodParam='.$_GET['SpecKodParam'].
                                 '&AddMessage='.$AddMessage.
                                 '&LastName='. $LastName.
                                 '&FirstName='.$FirstName.
                                 '&OtchName='. $OtchName.
                                 '&FO='.$_GET['FO'];
      echo '<form method="post" action="'.$path.'">';
      echo '<input hidden type = "text" name="Return" value = "Yes">';
      echo '<div class="interface1" style="margin-top: -26px;"><font color="red">Сообщение: </font>'.$AddMessage.
           '<input class = "button1" type="submit" value="В ы х о д"></div>'; 
      echo '</div>';
      echo '</form>';
?>
</body>
</html>