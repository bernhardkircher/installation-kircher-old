<?

function open_db($host,$user,$pass,$datb){
	$db = @mysql_connect($host,$user,$pass) or die(mysql_error());
	@mysql_select_db($datb,$db) or die(mysql_error());
}

function get_arr($table,$fields,$wher,$ord,$lim) {
	if ($wher) {
		$cond = " WHERE ".$wher;
	}
	if ($ord) {
		$ordby = " ORDER BY ".$ord;
	}
	if ($lim) {
		$limt = " LIMIT ".$lim;
	}
	$str = "SELECT ".$fields." FROM ".$table.$cond.$ordby.$limt;
	if ($result = mysql_query("$str")) {
		for($x = 0;$x < mysql_num_rows($result);$x++) {
			$array[$x] = mysql_fetch_array($result);
		}
		return $array;
	} else {
		return 0;
	}
}

function get_row($table,$fields,$wher) {
	$str = "SELECT ".$fields." FROM ".$table." WHERE ".$wher;
	if ($result = mysql_query("$str")) {
		$array = mysql_fetch_array($result);
		return $array;
	} else {
		return 0;
	}
}

function get_field_names($table){
	$result = mysql_query("SELECT * FROM ".$table);
	for($x = 0; $x < mysql_num_fields($result); $x++){
		$arr[$x] = mysql_field_name($result,$x);
	}
	return $arr;
}

function update_data($table,$field_val,$def) {
	$str = "UPDATE ".$table." SET ".$field_val." WHERE ".$def;
	mysql_query("$str");
}

function insert_data($table,$fields,$vals) {
	$str = "INSERT INTO ".$table." (".$fields.") VALUES (".$vals.")";
	mysql_query("$str");
}

function replace_data($table,$fields,$vals) {
	$str = "REPLACE INTO ".$table." (".$fields.") VALUES (".$vals.")";
	mysql_query("$str");
}

function remove_data($table,$def) {
	$str = "DELETE FROM ".$table." WHERE ".$def;
	mysql_query("$str");
}

function get_newid($table) {
	$arr = get_arr($table,"id","","id DESC",1);
	$new_id = $arr[0]['id'] + 1;
	return $new_id;
}

function checkform($secondname,$mail,$dat) {
	if ((!$secondname) && (!$error)) {
		$error = "Nachname";
	}
	if ((!$mail) && (!$error)) {
		$error = "eMail";
	}
	if ((!$dat) && (!$error)) {
		$error = "Datum";
	}
	if (!$error) {
		return "ok";
	} else {
		return $error;
	}
}

function img_upload($upl_dir,$src,$src_nam) {
	$img_info = getimagesize($src);
	if ($img_info[2] == 2) {
		set_time_limit(60);
		$path = dirname($PATH_TRANSLATED).$upl_dir;
		$source = $src;
		$source_name = $src_nam;
		$dest = $path.$source_name;
		if (copy($source,$dest)) {
			$upload = 1;
		} else {
			echo "<script language=\"javascript\">alert(\"Fehler: Bild konnte nicht kopiert werden!\")</script>";
		}
		@unlink($source);
	} else {
		echo "<script language=\"javascript\">alert(\"Fehler: Bild ist nicht im  JPG-Format!\")</script>";
	}
	return basename($dest);
}

function img_resize($path,$src_im,$id,$sm_w,$lg_w) {
	$img_info = getimagesize($path.$src_im);
	$org_w = $img_info[0];
	$org_h = $img_info[1];
	$sm_h = floor($sm_w / ($org_w / $org_h));
	$lg_h = floor($lg_w / ($org_w / $org_h));
	$new_im = imagecreatetruecolor($sm_w,$sm_h);
	$cop_im = imagecreatefromjpeg($path.$src_im);
	imagecopyresampled($new_im,$cop_im,0,0,0,0,$sm_w,$sm_h,$org_w,$org_h);
	imagejpeg($new_im,$path.$id."_sm.jpg",80);
	$new_im = imagecreatetruecolor($lg_w,$lg_h);
	$cop_im = imagecreatefromjpeg($path.$src_im);
	imagecopyresampled($new_im,$cop_im,0,0,0,0,$lg_w,$lg_h,$org_w,$org_h);
	imagejpeg($new_im,$path.$id."_lg.jpg",80);
	@unlink($path.$src_im);
}

?>