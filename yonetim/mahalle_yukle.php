<?php
include"session.php";
include"baglanti.php";

header("Content-Type: text/html; charset=iso-8859-9");
echo "<label>Mahalle </label>
<select id='model' title='Modeli Seçiniz' name='mahalle_id' class='form-control'>";
$ilce_id=$_POST['ilce'];
if($ilce_id){
	
	$sorgu=$veritabani->prepare("select * from mahalle where ilce_id='$ilce_id' order by mahalle_ad");
	$sorgu->execute();
	while($sonuc=$sorgu->fetch()){
		$mahalle_id=$sonuc['mahalle_id'];
		$mahalle_ad=$sonuc['mahalle_ad'];
		?>
		<option value="<?php echo $mahalle_id;  ?>"> <?php echo $mahalle_ad; ?></option>
		<?php } 
}
echo "</select>";
?>