<!DOCTYPE html>
<html>
<!-- комментарий -->
<head>
  <meta charset="utf-8" />
  <title>Работа со списком студентов</title>
  <style>
   .colortext {
    font-size: 15pt;  
    font-family: 'Tahoma';
    margin: 2px; padding: 2px;
    color: navy;
    background-color: #e3e1ef;
   }
   TABLE {
    width: 100%;
    border: 1px solid black;
    color: navy;
    text-align: center; 
	margin-top: 4px; 
	margin-bottom: 4px; 
	padding: 2px; 
	}
   TD, TH { font-family: 'Tahoma';
    text-align: center;
    padding: 2px;
    background-color: white;
    color: navy; 
	font-size: 11pt;
    border: 0px solid navy;
   }
   TH {
    color: navy;
    padding: 2px;
    background-color: rgb(226,255,150); font-size: 10pt;
   }
  .td_color { background-color: #99FF99; }

  .button1 { font-family: 'Tahoma';
           background-color: #008CBA; font-size: 15pt; padding: 4px 15px;
           border-radius: 10px; border: 1px solid #4CAF50; color: yellow;
           cursor: pointer; text-align: center; margin: 4px;
           }
  .button1:hover { box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.39); }

  .button2 { font-family: 'Tahoma';
           background-color: #8C00BA; font-size: 15pt; padding: 4px 15px;
           border-radius: 10px; border: 1px solid #4CAF50; color: yellow;
           cursor: pointer; margin: 4px;
           }
  .button2:hover { box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.39); }

  .button3 { font-family: 'Tahoma';
           background-color: rgba(240,155,140,0.89); font-size: 15pt; padding: 4px 15px;
           border-radius: 10px; border: 1px solid #4CAF50; color: navy;
           cursor: default; text-align: center; margin-top: 2px; margin-bottom: 6px;
           }
  .center { text-align: center; }
  .text_input { font-family: 'Tahoma';
           background-color: #FFFFFF; font-size: 12pt; color: black;
           border-radius: 4px; border: 1px solid navy;
           cursor: pointer; text-align: left; margin: 4px; padding: 5px;
           }
  .text_input:hover { box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); }

  .text_input1 { font-family: 'Tahoma';
           background-color: #FFFFFF; font-size: 12pt;
           border-radius: 4px; border: 1px solid navy; color: black;
           cursor: pointer; text-align: left; margin: 1px; padding: 5px;
           }
  .text_input1:hover { box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19); }

  .center { text-align: center; }
  .message_txt { text-align: center; font-family: 'Tahoma'; width: 90%;
                 font-size: 13pt; color: navy; margin-top: 2px; margin-bottom: 2px; }
  .message_txt_1 { text-align: center; font-family: 'Tahoma';  width: 85%;
                   background-color: #FFFFFF; border: 0px; border: 1px solid black;
                   font-size: 13pt; color: navy; margin-top: 2px; margin-bottom: 2px; }
  div { font-family: 'Tahoma'; font-size: 13pt; color: navy; background-color: #e3e1ef; 
                     width: auto; text-align: center; padding: 3px; margin: 2px; }
  div:hover { box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.39); }

  .div1 { font-family: 'Tahoma'; font-size: 13pt; color: navy; background-color: #e3e1ef; 
                     width: auto; text-align: center; padding: 2px; margin: 2px; }

  .interface  { font-family: 'Tahoma'; font-size: 13pt; color: navy; background-color: #e3e1ef; 
                padding: 3px; width: auto; margin-top: 2px; margin-bottom: 2px; }
  .interface1 { font-family: 'Tahoma'; font-size: 13pt; color: navy; background-color: #e3e1ef; 
                padding: 3px; width: auto; margin-top: 2px; margin-bottom: 2px; }
  .interface2 { font-family: 'Tahoma'; font-size: 13pt; color: yellow; background-color: red; 
                padding: 3px; width: auto; margin-top: 2px; margin-bottom: 2px; }
  .interface_error { font-family: 'Tahoma'; font-size: 13pt; color: yellow; background-color: #FF0066; 
                padding: 3px; width: auto; margin-top: 2px; margin-bottom: 2px; }
  textarea:hover { box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.39); }
  .table_interface1 { font-family: 'Tahoma'; font-size: 13pt; color: navy; background-color: rgba(256,233,210,0.9); 
                padding: 2px; margin-top: 4px; margin-bottom: 4px; }
  </style>

  <script type="text/javascript">

       function Begin()
       { 
         btn_submit.setAttribute('hidden', false);
         if ( window.document.getElementById("_obrab").value == "0" ) 
            { window.document.forms[1].group_list.value = ''; }

         window.document.getElementById("_obrab").disabled = true; 
         window.document.getElementById("_obrab").classList.remove("button1");
         window.document.getElementById("_obrab").classList.add("button3");       
       }

       function ObrabChange()
       { 
         var lst = document.forms[1].group_list.value;
         lst.trim();
         btn_submit.setAttribute('hidden', true);
         if ( lst.length == 0)
         {
           window.document.getElementById("_obrab").disabled = true; 
           window.document.getElementById("_obrab").classList.remove("button1");
           window.document.getElementById("_obrab").classList.add("button3");
         }
         else
         {
           window.document.getElementById("_obrab").disabled = false; 
           window.document.getElementById("_obrab").classList.remove("button3");
           window.document.getElementById("_obrab").classList.add("button1");
         }
       }

       function Done()
            {  
               var A = document.forms[1].group_list.value;
               A = A.split('\n');
               //A = A.trim();
               Acount = A.length;
               if ( Acount > 30) { Acount = 30; }
               window.document.forms[1].group_list.value = '';
               for (var i = 0; i < Acount; i++) {
                   window.document.forms[1].group_list.value = 
                          window.document.forms[1].group_list.value + A[i].trim() + '\n';
               }
                           
               //обработка списка-1:
               window.document.forms[1].group_list_1.value = '';
               for (var i = 0; i < Acount; i++) {
                    //A[i].replace('\n', '');
                    A[i] = A[i].trim();
                    if ( A[i].length > 0 )
                    { //---1
                      L = A[i].indexOf(' ');
                      if ( L > 0 )
                      { //---2
                        LastName = A[i].substr(0, L);
                        LastName.trim(); 
                        Sub = A[i].substr(L+1); 
                        Sub = Sub.trim(); 
                        if ( Sub.length == 0 ) {FirstName = '-'; OtchName = '-';}
                        else
                        {
                          L = Sub.indexOf(' ');
                          if ( L > 0 )
                          {
                             FirstName = Sub.substr(0, L);
                             FirstName.trim();
                             Sub = Sub.substr(L+1);
                             Sub = Sub.trim();
                             OtchName = Sub;
                             if ( OtchName.length == 0 ) {OtchName = '-';}
                          }
                          else
                          { FirstName = Sub.trim(); OtchName = '-'; }
                        }
                      } //---2
                      else
                      { LastName = A[i].trim(); FirstName = '-'; OtchName = '-'; }
                        //alert(LastName + '-' + FirstName + '-' + OtchName + '|');
                        window.document.forms[1].group_list_1.value = 
                           window.document.forms[1].group_list_1.value + 
                           LastName + ':' + FirstName + ':' + OtchName + ':' + '\n';
                    } //---1
               } //цикл for

               var A = window.document.forms[1].group_list_1.value; 
               A = A.split('\n'); 
               Acount = A.length; flag = false;
               for (i=0; i<Acount; i++)
                   {
                     A[i] = A[i].trim();
                     if ( A[i].length > 0 ) { flag = true; }
                   } 
               if ( !flag )
               { 
                 //btn_submit.setAttribute('hidden', true);
                 window.document.forms[1].group_list.value = ''; 
                 window.document.getElementById("btn_submit").hidden = true;
                 document.getElementById("message").value = "список пуст...";
               }
               else
               { 
                 window.document.getElementById("btn_submit").hidden = false;
                 document.getElementById("message").value = "список обработан...";
               }
            }

     function OtmOsob(kol_vo,ind)
       {
         for (let i = 1; i <= kol_vo; i++) 
         {
            document.getElementById('_id_stud'+String(i)).checked = false;
         }
         document.getElementById('_id_stud'+String(ind)).checked = true;
       }

     function AddToSpisok(kol_vo)
       { 
         for (let i = 1; i <= kol_vo; i++) 
         { 
           document.getElementById("stud_list").value += document.getElementById("_LN"+String(i)).value;
           document.getElementById("stud_list").value += ' '+document.getElementById("_FN"+String(i)).value;
           document.getElementById("stud_list").value += ' '+document.getElementById("_ON"+String(i)).value+"\n";
         }
       }

     function OtmResets(kol_vo)
       {
         let K = document.getElementById('_rreset').value;
         for (let i = 1; i <= kol_vo; i++)
         { 
           if  ( K % 2  == 0 ) 
              { document.getElementById('_id_stud'+String(i)).checked = true; }
           else
              { document.getElementById('_id_stud'+String(i)).checked = false; }
         }
         K++; document.getElementById('_rreset').value = K;
       }

    </script>
</head>

<body class="colortext" onload="Begin();">
<?php

  $stud_message = 'нет сообщения...'; $error_message = '';
  $kol_vo = 0;

  if ( isset($_GET['AddMessageList']) ) { $AddMessageList = $_GET['AddMessageList']; }
  else { $AddMessageList = 'нет сообщений...'; }

  if ( (trim($_GET['SpecParam']) == '') || (trim($_GET['GroupParam']) == '') || (trim($_GET['GodParam']) == '') ||
       (trim($_GET['FO']) == '') )
  {
    echo '<form method="post" action="GroupListStart.php?SpecParam='.$_GET['SpecParam'].
                                 '&GroupParam='.$_GET['GroupParam'].
                                 '&GodParam='.$_GET['GodParam'].
                                 '&SpecKodParam='.$_GET['SpecKodParam'].
                                 '&FO='.$_GET['FO'].
                                 '&AddMessage=нет сообщений...">';

    echo '
    <div class="interface1">Ошибка работы со списком студентов
    <input hidden type = "text" name="Return" value = "Yes">
    <input class = "button1" type = "submit" value = "В ы х о д">
    </div></form>'; 
    exit;
  }
      echo '
      <div class="interface1">
      <form method="post" action="GroupListStart.php?SpecParam='.$_GET['SpecParam'].
                                 '&GroupParam='.$_GET['GroupParam'].
                                 '&GodParam='.$_GET['GodParam'].
                                 '&SpecKodParam='.$_GET['SpecKodParam'].
                                 '&FO='.$_GET['FO'].
                                 '&AddMessage=нет сообщений...">';

      echo '
      <input hidden type = "text" name="Return" value = "Yes">Предлагаемый список студентов
      <input class = "button1" type = "submit" value = "В ы х о д">
      </form> 
      </div>';

      require_once('MyConnect.php'); MyConnectOtvet();
      if ( !$ConnectOtvet )
      {
        echo '<div class = "interface_error" style="margin-top: -26px;">
              <p class="center_align">Ошибка соединения с сервером...</p>';
        echo '</div>';
        exit();
      }
      // 07-05-2022
      // Если уже открыт сеанс работы для группы...
      $cont = true; 

      if ( !$cont )
      {
       echo '<div class="interface1" style="margin-top: -26px; padding-top: 13px; padding-bottom: 13px;">
           <font color="red">Сообщение: </font>'.$AddMessage.
          '</div>';
       exit();
      }
    
    echo '
    <input disabled hidden id="_control_clear" type="text" value="0">

    <form method="post" action="StudParam.php?SpecParam='.$_GET['SpecParam'].
                                 '&GroupParam='.$_GET['GroupParam'].
                                 '&GodParam='.$_GET['GodParam'].
                                 '&SpecKodParam='.$_GET['SpecKodParam'].
                                 '&FO='.$_GET['FO'].
				 '&AddMessageList='.$_GET['AddMessageList'].'">';

     echo '<div class="interface1" style="margin-top: -26px;">';
     echo 'Учебный год: <font color="red">'.$_GET['GodParam'].'</font>'.
                                     '. ФО: <font color="red">'.$_GET['FO'].'</font>'.
                                     '. Направление: <font color="red">'.$_GET['SpecKodParam'].'</font>'.
                                     '. Группа/подгруппа: <font color="red">'.$_GET['GroupParam'].'</font></caption>';
    ?>
    <br><font class="message_txt">Образец строки списка: <b><font color="maroon">Иванов Иван Иванович.</font></b>
                                  Ограничение на длину списка группы - <b>30 человек</b></font>
    <br><textarea id="stud_list" rows="5" cols="120" name="group_list" class="colortext" 
                  placeholder="Список пуст..." 
                  style="padding: 5px; background-color: #FFFFFF; width: 90%; height: 200px;
                         font-family: Tahoma; color: black;"
                  onkeydown = "ObrabChange();"></textarea>
    <textarea hidden rows="40" cols="120" name="group_list_1" class="colortext"></textarea>
    <br><font class="message_txt">После ввода списка студентов нажмите на кнопку -></font>
    <input class = "button1" type = "button" name = "obrab" id="_obrab" 
           value = "Обработать список" onclick = "Done();">
    <input id="btn_submit" class = "button1" type = "submit" value = "Запомнить список">
    <BR><font class="message_txt">Сообщение: <input class="message_txt_1" id="message" type="text" disabled = "disabled"
	           value="<?php echo $AddMessageList; ?>" ></font>
    </div>
    </form>

    <form method="post" action="<?php echo 'StudParamAdd.php?SpecParam='.$_GET['SpecParam'].
                                 '&GroupParam='.$_GET['GroupParam'].
                                 '&GodParam='.$_GET['GodParam'].
                                 '&SpecKodParam='.$_GET['SpecKodParam'].
                                 '&FO='.$_GET['FO'].
                                 '&AddMessage=нет сообщений...'; ?>">
    <?php
    $style_dop = '';
    //if ( $sit_margin ) { $style_dop = ''; } else { $style_dop = ' style="margin-top: -26px;"'; }

    echo '<div class="div1"'.$style_dop.'>';
    if ( isset($_GET['AddMessage']) )
      {
       echo '<font class="message_txt"><font color="navy">Добавить ФИО: </font><font color="red">*</font>Фамилия: 
             <input class="text_input" style="width: 19%;" type="text" name="LastName" 
              maxlength="40" value="'.$_GET['LastName'].'">';
       echo '<font color="red"> *</font>Имя: 
             <input class="text_input" style="width: 16%;" type="text" name="FirstName" 
              maxlength="30" value="'.$_GET['FirstName'].'">';
       echo '<font class="message_txt"><font color="red"> *</font>Отчество: 
             <input class="text_input" style="width: 19%;" type="text" name="OtchName"
              maxlength="40" value="'.$_GET['OtchName'].'"></font>';
       echo'<input hidden type = "text" name="Return" value = "Yes"></font>';
       //echo '<hr></hr>';
       echo '<input class = "button1" type="submit" value="+ Добавить студента в группу/подгруппу">';
       echo '<BR><font class="message_txt">Сообщение: <input class="message_txt_1" id="message1" type="text" disabled = "disabled" value="'.$_GET['AddMessage'].'"></font>';
      }
      else
      {
       echo '<font class="message_txt"><font color="navy">Добавить ФИО: </font><font color="red">*</font>Фамилия: 
             <input class="text_input" style="width: 19%;" type="text" name="LastName"
              maxlength="40" value="" placeholder="Не задано">';     
       echo '<font color="red"> *</font>Имя: 
             <input class="text_input" style="width: 16%;" type="text" name="FirstName"
              maxlength="30" value="" placeholder="Не задано">';
       echo '<font class="message_txt"><font color="red"> *</font>Отчество: 
             <input class="text_input" style="width: 19%;" type="text" name="OtchName"
              maxlength="40" value="" placeholder="Не задано"></font>';
       echo'<input hidden type = "text" name="Return" value = "Yes"></font>';
       //echo '<hr></hr>';
       echo '<input class = "button1" type="submit" value="+ Добавить студента в группу/подгруппу">';
       echo '<BR><font class="message_txt">Сообщение: <input class="message_txt_1" id="message1" type="text" disabled = "disabled" value="нет сообщений..."></font>';
      }
    ?>
    <br>
    </div>
    </form>
<?php
  if ( $ConnectOtvet )
  {
   $myquery = 'select `name_spec`, `kod_spec` from `spec` where `id_spec` = '.$_GET['SpecParam'];
   $res = @$mysqli->query($myquery);
   $kod_spec = "0"; $select_povtor = false;
   if ( $res )
   { // таблица направлений прочиталась нормально...
     $ind = 0;
     if ( $row = $res->fetch_assoc() )
     {
       $kod_spec = $row['kod_spec'];
       $ind++;
     }
     $query_list = 'select `id_stud`, `kod_spec`, `kod_group`, `LastName`, `FirstName`, `OtchName`, `login`, 
                        `password` from `students`'.
                ' where `fo` = "'.$_GET['FO'].'" and `kod_spec` = "'.$kod_spec.'" and kod_group = "'.
                           $_GET['GroupParam'].'"'.' and kod_god   = "'.$_GET['GodParam'].'"'.
                ' ORDER BY LastName, FirstName, OtchName';
     $stud_res = @$mysqli->query($query_list);
     if ( ( $stud_res ) && ( $ind > 0 ) )
     { 
        $kol_vo = $stud_res->num_rows; $select_povtor = true;
        if ( $kol_vo == 0 ) { $stud_message = 'список студентов пуст...'; }
        if ( $kol_vo > 0 )
        {
        $path_name = 'PassChange.php?SpecParam='.$_GET['SpecParam'].
                             '&GroupParam='.$_GET['GroupParam'].
                             '&GodParam='.$_GET['GodParam'].
                             '&SpecKodParam='.$_GET['SpecKodParam'].
                             '&FO='.$_GET['FO'];
        echo '<div class="interface1" style="margin-top: 2px;">';
        echo '<form method="post" action="'.$path_name.'">';

        echo '<input class = "button1" value = "Изменить логины-пароли" type = "submit">';
        echo'<hr></hr>';
        echo '</form>';

        echo '<form method="post" action="">';

        $flag_error = true; // какое-нибудь сообщение будет...
        $done_oper  = false; // операции не было...
        if ( isset($_POST['Del_Stud']) )
        {
             $stud_found = false;
             for ($i=1; $i<=$_POST['nStudCount']; $i++)
             {
               if ( isset($_POST['id_stud'.$i]) ) { $stud_found = true; }
             }
             if ( !$stud_found )
             {
                $error_message = 'Нет отмеченных студентов...';
             }
             else // Есть отмеченные студенты...
             {
             // Проверки-Удаления...
             $done_oper  = true; // Удаление - Ok?..
             for ($i=1; $i<=$_POST['nStudCount']; $i++)
             {
               if ( isset($_POST['id_stud'.$i]) ) 
               {  
                  $stud_num = $_POST['id_stud'.$i];
                  // Проверяем таблицы:
                  // ------------------- osob_solutions -------------------
                  $flag_1 = false; // удалять нельзя...
                  $query_1 = 'select `id_stud` from `osob_solutions`'.
                         ' where `kod_god` = "'.$_GET['GodParam'].'" and `id_stud` = '.$stud_num;
                  $res_1 = @$mysqli->query($query_1);
                  if ( $res_1 )
                  {
                    $kol_vo1 = $res_1->num_rows;
                    if ( $kol_vo1 == 0 ) { $flag_1 = true; }
                  }
                  // ------------------- povtors -------------------
                  $flag_2 = false; // удалять нельзя...
                  $query_2 = 'select `id_stud` from `povtors`'.
                         ' where `kod_god` = "'.$_GET['GodParam'].'" and `id_stud` = '.$stud_num;
                  $res_2 = @$mysqli->query($query_2);
                  if ( $res_2 )
                  {
                    $kol_vo2 = $res_2->num_rows;
                    if ( $kol_vo2 == 0 ) { $flag_2 = true; }
                  }
                  // ------------------- stud_results -------------------
                  $flag_3 = false; // удалять нельзя...
                  $query_3 = 'select `id_stud` from `stud_results`'.
                         ' where `kod_god` = "'.$_GET['GodParam'].'" and `id_stud` = '.$stud_num;
                  $res_3 = @$mysqli->query($query_3);
                  if ( $res_3 )
                  {
                    $kol_vo3 = $res_3->num_rows;
                    if ( $kol_vo3 == 0 ) { $flag_3 = true; }
                  }
                  // ----------------------- Itog -----------------------
                  if ( ( $flag_1 == true ) && ( $flag_2 == true ) && ( $flag_3 == true ) ) 
                  {
                    // Можно удалять:
                    $query_del = 'delete from `students`'.
                         ' where `kod_god` = "'.$_GET['GodParam'].'" and `id_stud` = '.$stud_num;
                    $res_del = @$mysqli->query($query_del);
                    if ( $res_del )
                    {
                    }
                    else
                    {
                      $error_message = 'Были ошибки удаления или удаление не было возможным...'; $flag_error = true;
                      $done_oper  = false;
                    }
                  } // Можно удалять
                  else
                  {
                    $error_message = 'Были ошибки удаления или удаление не было возможным...'; $flag_error = true;
                    $done_oper  = false;
                  }
               } // Студент отмечен...
             } // Цикл по студентам
             if ( $done_oper ) { $error_message = 'Удаление выполнено успешно...'; }
             } // Есть отмеченные студенты...
        } // Удаляем студента ?

     if ( isset($_POST['FIO_Change']) )
     { 
       $stud_found = false;
       for ($i=1; $i<=$_POST['nStudCount']; $i++)
       {
          if ( isset($_POST['id_stud'.$i]) ) { $stud_found = true; $stud_num = $_POST['id_stud'.$i]; }
       }
       if ( !$stud_found )
         {
            $error_message = 'Нет отмеченного студента...'; $flag_error = true;
         }       
       if ( ( $_POST['nStudCount'] > 0 ) && ( $stud_found ) )
       { 
         $new_LN = trim($_POST['new_LN']);
         $new_FN = trim($_POST['new_FN']);
         $new_ON = trim($_POST['new_ON']);
         if ( ($new_LN == '') || ($new_FN == '') || ($new_ON == '') )
         {
            $error_message = 'Для выбранного студента задайте новые Фамилию, Имя и Отчество...'; 
            $flag_error = true;
         }
         else
         {
           $query_update = 'UPDATE `students` SET `LastName`  ="'.$new_LN.'"'.','.
                                                ' `FirstName` ="'.$new_FN.'"'.','.
                                                ' `OtchName`  ="'.$new_ON.'"'.
                          ' where `kod_god` = "'.$_GET['GodParam'].'" and `id_stud` = '.$stud_num;
           $res_update = $mysqli->query($query_update);
           if ( !$res_update ) 
              {
                 $error_message = 'Ошибка замены ФИО (возможно, повтор ФИО)...'; 
                 $flag_error = true;
              }
           else
              {
                 $error_message = 'Замена ФИО выполнена успешно...';
                 $flag_error = true;
                 $done_oper  = true;
              }
         }
       } // Студент найден
     } // Меняем ФИО
        if ( isset($_POST['new_LN']) )
           {
             $new_LN = trim($_POST['new_LN']);
             $new_FN = trim($_POST['new_FN']);
             $new_ON = trim($_POST['new_ON']);
             echo '<font class="message_txt"><font color="navy">Изменить ФИО:</font>
                                  <font color="red">*</font>Фамилия:<input class="text_input1" name="new_LN" type="text" 
                                  style="width: 19%;" maxlength="40" value="'.$new_LN.'">
                                  <font color="red">*</font>Имя:<input class="text_input1" name="new_FN" type="text" 
                                  style="width: 16%;" maxlength="30" value="'.$new_FN.'">
                                  <font color="red">*</font>Отчество:<input class="text_input1" name="new_ON" type="text" 
                                  style="width: 19%;" maxlength="40" value="'.$new_ON.'"></font>';
           }
        else
           {
             echo '<font class="message_txt"><font color="navy">Изменить ФИО:</font>
                                  <font color="red">*</font>Фамилия: <input class="text_input1" name="new_LN" type="text" 
                                  style="width: 19%;" maxlength="40" placeholder="Не задано">
                                  <font color="red">*</font>Имя: <input class="text_input1" name="new_FN" type="text" 
                                  style="width: 16%;" maxlength="30" placeholder="Не задано">
                                  <font color="red">*</font>Отчество: <input class="text_input1" name="new_ON" type="text" 
                                  style="width: 19%;" maxlength="40" placeholder="Не задано"></font>';
           }
        //echo'<hr></hr>';
        echo '<input class = "button1" value = "Изменить ФИО выбранного студента" type = "submit" name="FIO_Change">';
        echo '<input class = "button2" value = "Удалить выбранных студентов" type = "submit" name="Del_Stud">';
        $kol_vo = 0;
        $select_povtor = false; // повторное чтение - успешно?
//     if ( $done_oper )
       { 
       $myquery = 'select `name_spec`, `kod_spec` from `spec` where `id_spec` = '.$_GET['SpecParam'];
       $res = @$mysqli->query($myquery);
       $kod_spec = "0";
       if ( $res ) // таблица направлений прочиталась...
       {
         $ind = 0;
         if ( $row = $res->fetch_assoc() )
            {
              $kod_spec = $row['kod_spec'];
              $ind++;
            }
         $stud_query = 'select `id_stud`, `kod_spec`, `kod_group`, `LastName`, `FirstName`, `OtchName`, `login`, 
                        `password` from `students`'.
                        ' where `fo` = "'.$_GET['FO'].'" and `kod_spec` = "'.$kod_spec.'" and kod_group = "'.
                           $_GET['GroupParam'].'"'.' and kod_god   = "'.$_GET['GodParam'].'"'.
                        ' ORDER BY LastName, FirstName, OtchName';
         $stud_res = @$mysqli->query($stud_query);
         if ( ( $stud_res ) && ( $ind > 0 ) )
             {
                 $select_povtor = true; // повторное чтение - успешно
                 $kol_vo = $stud_res->num_rows;
                 if ( $kol_vo == 0 )
                 { 
                   $error_message = 'Список студентов пуст...'; 
                   $flag_error = true;
                 }
             }
         else
             { 
                 $error_message = 'Ошибка чтения или данных нет...'; 
                 $flag_error = true;
             }
       }
       else
         { 
           $error_message = 'Ошибка чтения или данных нет...'; 
           $flag_error = true;
         }
     } // ( !$flag_error ) && ( $done_oper )

        if ( ( $flag_error ) && ($error_message != '') )
        {
        echo '<div class="interface_error">';
        echo '<font class="center">'.$error_message.'</font>';
        echo '</div>';
        }

        if ( $kol_vo > 0 )
        {
        echo '<table align="center">';
        $ind = 1;
        echo '<th>№</th><th>Отм</th><th>Направление</th><th>Группа</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>login</th><th>password</th>';
        while ( $row = $stud_res->fetch_assoc() )
        {
          echo '<tr>';
          echo '<td width="3%" style="font-size: 11pt;">'.$ind.'</td>';
          echo '<td class="td_color" width="5%"><input type="checkbox" name="id_stud'.$ind.'" id="_id_stud'.$ind.
                     '" value='.$row['id_stud'].'></td>';
          echo '<td width="11%">'; echo $row['kod_spec'];  echo '</td>';
          echo '<td width="9%">';  echo $row['kod_group']; echo '</td>';
          echo '<td width="27%">'; echo $row['LastName'];  echo '</td>';
          echo '<td width="15%">'; echo $row['FirstName']; echo '</td>';
          echo '<td width="20%">'; echo $row['OtchName'];  echo '</td>';

          echo '<input hidden type="text" value="'.$row['LastName'].'" name="LastName'.$row['id_stud'].'">';
          echo '<input hidden type="text" value="'.$row['FirstName'].'" name="FirstName'.$row['id_stud'].'">';
          echo '<input hidden type="text" value="'.$row['OtchName'].'" name="OtchName'.$row['id_stud'].'">';

          echo '<td width="10%">'; echo $row['login']; echo '</td>';
          echo '<td width="12%">'; echo $row['password']; echo '</td>';
          echo '</tr>';
          $ind++;
        }
        echo '</table>';
        $stud_message = 'данные успешно прочитаны...';
        } // $kol_vo > 0
        $ind--;
        echo '<input hidden class="message_txt" name="nStudCount" type="text" value="'.$ind.'">';
        echo '</form>';
     }
     else
     { $stud_message = 'список студентов пуст...'; }
     } // $res = Ok...
     else
     {
       $stud_message = 'ошибка чтения данных...';
       echo '<div class="interface">';
       echo '<font class="center">Ошибка чтения данных...</font>';
       echo '</div>';
     }

     if ( $_GET['StudMessage'] ) { $stud_message = $_GET['StudMessage']; }
     if ( $kol_vo == 0) { $dop_style=' style="margin-top: 2px;"'; } else { $dop_style=''; }
     echo '<div class="interface1"'.$dop_style.'>';
     echo '<font class="message_txt">Сообщение: </font><input class="message_txt_1" id="message2" type="text" 
              disabled = "disabled" value="'.$stud_message.'">';
     echo '</div>';

     // Список группы:
     if ( $kol_vo > 0 )
     {
        $path_name = 'Report1.php?SpecParam='.$_GET['SpecParam'].
                             '&GroupParam='.$_GET['GroupParam'].
                             '&GodParam='.$_GET['GodParam'].
                             '&SpecKodParam='.$_GET['SpecKodParam'].
                             '&FO='.$_GET['FO'];
        echo '<form method="post" action="'.$path_name.'">';
        echo '<input type="text" hidden name = "rreset" id="_rreset" value="0">';
        echo '<div class="interface1">';
        echo '<input class="button1" name="OtmAll" value="Отметить всех" type= "button" onclick="OtmResets('.$kol_vo.');">';
        //echo '<input class = "button1" value = "Список группы/подгруппы - документ MS Word" type = "submit">';
        echo '</div>';
        echo '</form>';
     }
   } // таблица направлений прочиталась
   else // таблица направлений не прочиталась...
   {
      $stud_message = 'ошибка чтения данных...';
      echo '<div class="interface_error">';
      echo '<font class="center">Ошибка чтения данных...</font>';
      echo '</div>';
   }
  } // Есть connect...
?>
</body>
</html>

