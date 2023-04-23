<?php
                   

require_once('ini.php');

$error='';
$fio=mysql_real_escape_string(htmlspecialchars(stripslashes(trim($_POST['fio']))));
$email=mysql_real_escape_string(htmlspecialchars(stripslashes(trim($_POST['email']))));
$phone=mysql_real_escape_string(htmlspecialchars(stripslashes(trim($_POST['phone']))));
$address=mysql_real_escape_string(htmlspecialchars(stripslashes(trim($_POST['address']))));

if(empty($fio)){ $error.='Укажите ФИО!<br/>';  }
//if(empty($email)){ $error.='Укажите Email!<br/>';  }
if(empty($phone)){ $error.='Укажите Телефон!<br/>';  }
if(!preg_match('/^[0-9]{10,10}\z/', $phone)) $error.='Пожалуйста, введите действительный 10-значный номер мобильного телефона!<br/>';
if(!empty($email) && !preg_match('/^[0-9a-z]+@[0-9a-z]/', $email)) $error.='Пожалуйста, введите действительный адрес электронной почты!<br/>';


if(empty($error))
{

	mysql_query("insert into `form` set `fio`='$fio', `email`='$email', `phone`='$phone', `address`='$address', `date`='".time()."'  ");
	$last_id=mysql_insert_id();
	$form=mysql_fetch_array(mysql_query("select * from  `form` where `id`='$last_id' "));


	$form['address']=str_replace("\r\n", "<br>", $form['address']);

	?>

	<script>
		$('table').append('<tr><td><?=date('d.m.y H:i:s',$form['date'])?></td><td><?=$form['fio']?></td><td><?=$form['email']?></td><td><?=$form['phone']?></td><td><?=$form['address']?></td></tr>');
		$('input[type="tel"],input[type="text"],textarea').val('');
		$('#form_notice').html('');
	</script>

	<?	
}else
{
?>
	<script>
		$('#form_notice').html('<?=$error?>');
	</script>
<?	
}
