<!DOCTYPE html>
<html>
<!-- комментарий -->
<head>
  <meta charset="utf-8" />
  <title>Список студентов</title>
  <style>
   .colortext {
    font-size: 15pt;  
    font-family: 'Tahoma';
    color: green;
    background-color: rgb(226,255,200);
   }
   caption { color: maroon; font-size: 18pt; text-align: center; }
   TABLE { 
    width: 99%;
    border: 1px solid black;
    background-color: silver;
    color: navy;
    text-align: center; margin: auto; padding: 3px; margin-bottom: 3px;}
   TD, TH { 
    font-family: 'Tahoma';
    font-size: 12pt;
    text-align: center;
    padding: 6px 2px;
    background-color: white;
    color: navy;
   }
   TH {
    font-size: 11pt;
    color: navy;
    background-color: #88CCFF;
   }
   .button1 { font-family: 'Tahoma';
           background-color: #008CBA; font-size: 16pt; padding: 6px 15px;
           border-radius: 10px; border: 1px solid #4CAF50; color: yellow;
           cursor: pointer; margin: 6px;
           }
  .button1:hover { box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); }
  div { background-color: rgb(250,240,130); width: auto; text-align: center; }
  div:hover { font-family: 'Tahoma'; box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.39); }
  .center { text-align: center; font-size: 15pt; color: navy;  font-family: 'Arial'; margin-top: 5px; }
  .message_txt { text-align: center; font-family: 'Tahoma';
                 font-size: 15pt; color: navy; margin-top: 2px; margin-bottom: 2px; }
  .interface1 { font-family: 'Tahoma'; font-size: 16pt; color: navy; background-color: rgb(230,250,130); 
                padding: 2px; width: auto; margin-top: 3px; margin-bottom: 3px; margin-left: auto; margin-right: auto; }
  </style>
</head>
<body class="colortext">
<?php
function MyExit($MessExit)
 {
    echo '<form method="post" action="GroupList.php?SpecParam='.$_GET['SpecParam'].
                                 '&GroupParam='.$_GET['GroupParam'].
                                 '&GodParam='.$_GET['GodParam'].
                                 '&SpecKodParam='.$_GET['SpecKodParam'].
                                 '&FO='.$_GET['FO'].
                                 '&AddMessageList='.$MessExit.'">';

    echo '<div class="interface1" style="margin-top: -28px;"><font color="red">Сообщение: </font>'.$MessExit.
        ' <input class = "button1" type="submit" value="В ы х о д"></div>'; 
    exit();
 }
  $add_stud_message = 'нет сообщений...';
  $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $permitted_numbs = '0123456789';
  $A = $_POST['group_list_1']; 
  $mas1 = explode(":", $A);
  if ( count($mas1) < 3 ) 
     { 
       $AddMessage = "список студентов не подготовлен...";
       MyExit($AddMessage);
     };
  $L = count($mas1); 
  $L = intval($L / 3) * 3;
  // **********************************************************
       require_once('MyConnect.php'); MyConnectOtvet();
  // **********************************************************
  if ( !$ConnectOtvet ) { $AddMessage = "ошибка соединения с сервером..."; MyExit($AddMessage); }
  if ( $ConnectOtvet )
  {

//  $db_table = 'students';
  //удаляем прежний список группы:
  $query_delete = 'delete from `students` where  `fo` = "'.$_GET['FO'].'" and `kod_spec` = "'.
                 $_GET['SpecKodParam'].'" and `kod_group` = "'.
                 $_GET['GroupParam'].'"'.' and `kod_god`   = "'.
                 $_GET['GodParam'].'"';
  $res = $mysqli->query($query_delete);
  if ( !$res ) 
  { 
    $continue = false; 
    $AddMessage = "ошибка удаления прежнего списка...";
    MyExit($AddMessage);
  } 
  else 
  { $continue = true; }
  //пишем в группу новый состав:
  // $continue = true; - продолжать цикл...
  for ( $i=0; $i < $L; $i += 3 )
    if ( $continue )
    {
        $query = 'select max(id_stud) MaxId from `students`';
        $result = $mysqli->query($query);
        if ( $result )
        {
          if ( $result->num_rows == 1 )
          {
            if ( $row = $result->fetch_assoc() )
               { $idSpec = $row['MaxId']; }
            else { $idSpec = 0; }
          }
          else { $idSpec = 0; }
          $newIdSpec = $idSpec + 1;
          // есть новый номер...
          $Log = substr(str_shuffle($permitted_chars), 0, 10);
          $Pas = substr(str_shuffle($permitted_numbs), 0, 10);
          $mas1[$i]   = trim($mas1[$i]);
          $mas1[$i+1] = trim($mas1[$i+1]);
          if ( $mas1[$i+1] == '' ) { $mas1[$i+1] = '-'; }
          $mas1[$i+2] = trim($mas1[$i+2]);
          if ( $mas1[$i+2] == '' ) { $mas1[$i+2] = '-'; }
          $query_ins = 'INSERT INTO `students`'.
                ' (id_stud, fo, kod_god, kod_spec, kod_group, LastName, FirstName, OtchName, login, password) VALUES ('.
                '"'.$newIdSpec.'"'.','.
                '"'.$_GET["FO"].'"'.','.
                '"'.$_GET["GodParam"].  '"'.','.'"'.$_GET["SpecKodParam"].'"'.','.
                '"'.$_GET["GroupParam"].'"'.','.'"'.$mas1[$i].'"'.','.
                '"'.$mas1[$i+1].        '"'.','.'"'.$mas1[$i+2].'"'.','.
                '"'.$Log.               '"'.','.'"'.$Pas.'"'.
                ')';
          $res_ins = $mysqli->query($query_ins);
          if ( !$res_ins ) 
          { 
            $continue = false; 
            $AddMessage = "ошибка добавления в список...";
            MyExit($AddMessage);
          } 
        }
        else 
         { 
            $continue = false; 
            $AddMessage = "ошибка выполнения запроса...";
            MyExit($AddMessage);
         }
    }
$add_stud_message = 'новый список создан...';
$myquery =  'select `kod_spec`, `kod_group`, `LastName`, `FirstName`, `OtchName`, `login`, `password`'.
               ' from `students`'.
               ' where `fo` = "'.$_GET['FO'].'" and `kod_spec` = "'.$_GET["SpecKodParam"].
               '" and kod_group = "'.$_GET['GroupParam'].
               '" and kod_god   = "'.$_GET['GodParam'].'"';
$res = $mysqli->query($myquery);
echo '<div class="interface1" style="margin-top: -30px;">';
echo '<font class="message_txt">Учебный год: <font color="red">'.$_GET["GodParam"].'</font>'.
                        '</font>. ФО: <font color="red">'.$_GET['FO'].
                        '</font>. Направление: <font color="red">'.$_GET['SpecKodParam'].
                        '</font>. Группа/подгруппа: <font color="red">'.$_GET['GroupParam'].
                        '</font><BR>Созданный список студентов';
echo '<table class="center">';
echo '<th width="7%">Направление</th><th width="7%">Группа</th><th width="22%">Фамилия</th>
      <th width="18%">Имя</th><th width="22%">Отчество</th><th width="8%">login</th><th width="10%">password</th>';
if ( $res )
{
$ind = 0;
while ( $row = $res->fetch_assoc() )
{
  echo '<tr>';
  echo '<td>'.$row['kod_spec'].'</td>';
  echo '<td>'.$row['kod_group'].'</td>';
  echo '<td>'.$row['LastName'].'</td>';
  echo '<td>'.$row['FirstName'].'</td>';
  echo '<td>'.$row['OtchName'].'</td>';
  echo '<td>'.$row['login'].'</td>';
  echo '<td>'.$row['password'].'</td>';
  echo '</tr>';
  $ind++;
}
echo '</table>';
echo '</div>';
} // $res = Ok...
else { $AddMessage = "ошибка выполнения запроса..."; MyExit($AddMessage); }
}  // Есть connect...
  echo '<form method="post" action="GroupList.php?SpecParam='.$_GET['SpecParam'].
                                 '&GroupParam='.$_GET['GroupParam'].
                                 '&GodParam='.$_GET['GodParam'].
                                 '&SpecKodParam='.$_GET['SpecKodParam'].
                                 '&FO='.$_GET['FO'].
                                 '&AddMessageList='.$add_stud_message.'">';

     echo '<input hidden type="text" readonly name="Dinput1" value="'.$_POST["Dinput1"].'">';
     echo '<input hidden type="text" readonly name="Dinput2" value="'.$_POST["Dinput2"].'">';
     echo '<input hidden type="text" readonly name="Master"  value="'.$_POST["Master"].'">';

     echo '<div class="interface1">
           <p class="message_txt">Сообщение: <font color="red">'.$add_stud_message.'</font>'.
          '<input class = "button1" type="submit" value="В ы х о д"></div>';
?>
</form>
</body>
</html>