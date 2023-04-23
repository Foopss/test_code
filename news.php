<?

require_once('ini.php');



?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="reset.css" />
    <link rel="stylesheet" href="style.css" />
    <title></title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="container">
      <div class="content">

        <div class="center-side">
<?
$newsS=mysql_query("select * from `news` order by `date` desc ");
while($news=mysql_fetch_array($newsS))
{
	?>
	<div>
		<br/><p><?=$news['title']?> (<?=date('d.m.y H:i',$news['date'])?>)</p>
		<p><small style="font-size:12.9px;"><?=$news['text']?></small></p><br/><hr>
	</div>
	
	<?
}
?>

        </div>
      </div>
    </div>


  </body>
</html>
