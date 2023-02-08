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

  $SpecParam = 1;
  $SpecKodParam = "08.03.01";
  $GroupParam = "102";
  $GodParam = "2022/2023";
  $FO = "ОФО";
  $add_stud_message = "Нет сообщения...";


  echo '<form method="post" action="GroupList.php?SpecParam='.$SpecParam.
                                 '&GroupParam='.$GroupParam.
                                 '&GodParam='.$GodParam.
                                 '&SpecKodParam='.$SpecKodParam.
                                 '&FO='.$FO.
                                 '&AddMessageList='.$add_stud_message.'">';

     echo '<div class="interface1">
          <input class = "button1" type="submit" value="Работать со списком студентов">
          <div class="interface">
          <p class="message_txt">Сообщение: <font color="red">'.$add_stud_message.'</font></p></div>
          </div>';
?>
</form>
</body>
</html>