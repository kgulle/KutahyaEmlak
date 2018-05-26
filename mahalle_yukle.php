<meta http-equiv="content-type" content="text/html; charset=iso-8859-9" />

<?php
	
include"yonetim/baglanti.php";


echo "<label for='country'>Mahalle </label>
<select id='mahalle' name='mahalle_id' class='show-menu-arrow selectpicker'>";
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
echo "<option value='x'> Farketmez</option></select>";
?>