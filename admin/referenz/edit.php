<?

require_once("../_shared/config.inc.php");
include_once("../_shared/func.inc.php");
open_db($db_host,$db_user,$db_passw,$datbase);

echo "<html>\n";
echo "<head>\n";
echo "<meta http-equiv=\"Content-Language\" content=\"de\">\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1252\">\n";
echo "<title></title>\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../style.css\">\n";
include("../_shared/openwin_js.php");
include("../_shared/checktext_js.php");
echo "</head>\n";

for ($x = 0; $x < 6; $x++) {
	if (${"f_pic_rem_".$x}) {
		if (!$id) {
			$idx = get_newid("referenz");
			$img_nam = $idx."_".$x;
		} else {
			$img_nam = $id."_".$x;
		}
		unlink($img_ref.$img_nam."_sm.jpg");
		unlink($img_ref.$img_nam."_lg.jpg");
		$pics = explode("#",$picstr);
		$pics[$x] = "-";
		$picstr = implode("#",$pics);
		${"f_pic_title_".$x} = "---";
	}
}

for ($x = 0; $x < 6; $x++) {
	if (${"f_pic_view_".$x}) {
		if (!$id) {
			$idx = get_newid("referenz");
			$img_nam = $idx."_".$x;
		} else {
			$img_nam = $id."_".$x;
		}
		$img_info = getimagesize($img_ref.$img_nam."_lg.jpg");
		$img_w = $img_info[0] + 20;
		$img_h = $img_info[1] + 60;
		echo "<script language=\"javascript\">WinOpen('/_php/viewer.php?path=".$pic_ref."&id=".$img_nam."','viewer',".$img_w.",".$img_h.")</script>";
	}
}

for ($x = 0; $x < 6; $x++) {
	if (${"f_upl_".$x}) {
		if (${"f_pic_".$x}) {
			if (!$id) {
				$idx = get_newid("referenz");
				$img_nam = $idx."_".$x;
			} else {
				$img_nam = $id."_".$x;
			}
			$pic = img_upload($img_ref,${"f_pic_".$x},${"f_pic_".$x."_name"});
			img_resize($img_ref,$pic,$img_nam,$img_w_sm,$img_w_lg);
			if ($picstr) {
				$pics = explode("#",$picstr);
			}
			for ($y = 0; $y < 6; $y++) {
				if (!$pics[$y]) {
					$pics[$y] = "-";
				}
			}
			$pics[$x] = $pic;
			$picstr = implode("#",$pics);
			unset($add_img[$x]);
		}
	}
}

for ($x = 0; $x < 6; $x++) {
	if (${"f_pic_repl_".$x}) {
		$add_img[$x] = "on";
	}
}

if ($f_cancel) {
	echo "<script language=\"javascript\">self.location.href='list.php'</script>";
	exit;
}

if ($f_save) {
	if (!$f_name) {
		echo "<script language=\"javascript\">WinOpen('request.php?&msg=0','request',520,40)</script>";
	} else {
		if (!is_null($f_pos)) {
			update_data("referenz","pos=pos+1","pos>=".$f_pos);
			$pos = $f_pos;
		}
		if (!$pos) {
			$pos = 0;
		}
		if (!$id) {
			$id = get_newid("referenz");
		}
		for ($x = 0; $x < 6; $x++) {
			if (${"f_pic_title_".$x}) {
				$pic_tits[$x] = ${"f_pic_title_".$x};
			} else {
				$pic_tits[$x] = "---";
			}
		}
		$pic_titstr = implode("#",$pic_tits);
		$fields = implode(",",get_field_names("referenz"));
		$vals = "'".$id."','".addslashes($f_name)."','".addslashes($f_txt)."','".addslashes($pic_titstr)."','".$picstr."','".$pos."'";
		replace_data("referenz",$fields,$vals);
		echo "<script language=\"javascript\">self.location.href='list.php'</script>";
		exit;
	}
}

if ($init == "do") {
	$data = get_row("referenz","id,name,txt,img_titles,imgs,pos","id=".$id);
	$f_name = $data['name'];
	$f_txt = $data['txt'];
	$pos = $data['pos'];
	if ($data['img_titles']) {
		$pic_tits = explode("#",$data['img_titles']);
		for ($x = 0; $x < count($pic_tits); $x++) {
			${"f_pic_title_".$x} = $pic_tits[$x];
		}
	}
	$picstr = $data['imgs'];
	$init = "done";
} else {
	$list = get_arr("referenz","name,pos","","pos","");
}

echo "<body>\n";
echo "<div align=\"center\">\n";
echo "<center>\n";
echo "<form method=\"POST\" action=\"$PHP_SELF\" enctype=\"multipart/form-data\" name=\"edit_form\">\n";
echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">\n";
echo "<input type=\"hidden\" name=\"pos\" value=\"".$pos."\">\n";
echo "<input type=\"hidden\" name=\"picstr\" value=\"".$picstr."\">\n";
echo "<table border=\"0\" cellpadding=\"0\" width=\"770\" cellspacing=\"1\">\n";
echo "<tr>\n";
echo "<td width=\"110\" height=\"20\"></td>\n";
echo "<td width=\"110\" height=\"20\"></td>\n";
echo "<td width=\"110\" height=\"20\"></td>\n";
echo "<td width=\"110\" height=\"20\"></td>\n";
echo "<td width=\"110\" height=\"20\"></td>\n";
echo "<td width=\"110\" height=\"20\"></td>\n";
echo "<td width=\"110\" height=\"20\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"770\" colspan=\"7\" bgcolor=\"".$navcol."\" align=\"center\" height=\"25\">";
echo "<p class=\"txt_nav\">Referenzprojekte - Detail</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"770\" colspan=\"7\" height=\"30\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"110\" bgcolor=\"".$navcol."\" height=\"25\" align=\"center\"><p class=\"txt_nav_sm\">Titel</td>\n";
echo "<td width=\"660\" bgcolor=\"".$titcol."\" height=\"25\" align=\"center\" colspan=\"6\">\n";
echo "<input type=\"text\" class=\"in_line_650\" name=\"f_name\" value=\"".htmlentities($f_name)."\" maxlength=\"64\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"770\" colspan=\"7\" height=\"10\" bgcolor=\"".$titcol."\"></td>\n";
echo "</tr>\n";
$pics = explode("#",$picstr);
for ($x = 0; $x < 6; $x++) {
	echo "<tr>\n";
	echo "<td width=\"110\" bgcolor=\"".$navcol."\" height=\"25\" align=\"center\"><p class=\"txt_nav_sm\">Bild ".($x+1)."</td>\n";
	if (($add_img[$x] == "on") OR ((!$pics[$x]) OR ($pics[$x] == "-"))) {
		echo "<td width=\"440\" bgcolor=\"".$titcol."\" height=\"25\" align=\"center\" colspan=\"4\">\n";
		echo "<input type=\"file\" class=\"in_file\" name=\"f_pic_".$x."\"></td>\n";
		echo "<td width=\"110\" bgcolor=\"".$navcol."\" align=\"center\" height=\"25\">\n";
		echo "<input type=\"submit\" value=\"Übernehmen\" class=\"button_1\" name=\"f_upl_".$x."\"></td>\n";
		echo "<td width=\"110\" bgcolor=\"".$navcol."\" align=\"center\" height=\"25\"></td>\n";
	} else {
		echo "<td width=\"330\" bgcolor=\"".$titcol."\" height=\"25\" align=\"center\" colspan=\"3\">\n";
		echo "<p class=\"txt_menu\">".$pics[$x]."</td>\n";
		echo "<td width=\"110\" bgcolor=\"".$navcol."\" align=\"center\" height=\"25\">\n";
		echo "<input type=\"submit\" value=\"Vorschau\" class=\"button_1\" name=\"f_pic_view_".$x."\"></td>\n";
		echo "<td width=\"110\" bgcolor=\"".$navcol."\" align=\"center\" height=\"25\">";
		echo "<input type=\"submit\" value=\"Ersetzen\" class=\"button_1\" name=\"f_pic_repl_".$x."\"></td>\n";
		echo "<td width=\"110\" bgcolor=\"".$navcol."\" align=\"center\" height=\"25\">";
		echo "<input type=\"submit\" value=\"Löschen\" class=\"button_1\" name=\"f_pic_rem_".$x."\"></td>\n";
	}
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td width=\"110\" bgcolor=\"".$navcol."\" height=\"25\" align=\"center\"><p class=\"txt_nav_sm\">Bild ".($x+1)." Titel</td>\n";
	echo "<td width=\"550\" bgcolor=\"".$titcol."\" height=\"25\" align=\"center\" colspan=\"5\">\n";
	echo "<input type=\"text\" class=\"in_line_540\" name=\"f_pic_title_".$x."\" value=\"".htmlentities(${"f_pic_title_".$x})."\" maxlength=\"32\"></td>\n";
	echo "<td width=\"110\" bgcolor=\"".$navcol."\" height=\"25\"></td>\n";
	echo "</tr>\n";
	if (bcmod($x + 1,3) == 0){
		echo "<tr>\n";
		echo "<td width=\"770\" colspan=\"7\" height=\"10\" bgcolor=\"".$titcol."\"></td>\n";
		echo "</tr>\n";
	}
}
echo "<tr>\n";
echo "<td width=\"110\" bgcolor=\"".$navcol."\" height=\"60\" align=\"center\"><p class=\"txt_nav_sm\">Text</td>\n";
echo "<td width=\"550\" bgcolor=\"".$titcol."\" height=\"60\" align=\"center\" colspan=\"5\">\n";
echo "<textarea class=\"in_txt_540\"  name=\"f_txt\" id=\"f_txt\" ";
echo "onKeyDown=\"charCounter('f_txt', 500, 'charCount');\" ";
echo "onKeyUp=\"charCounter('f_txt', 500, 'charCount');\" ";
echo "onChange=\"charCounter('f_txt', 500, 'charCount');\">".htmlentities($f_txt)."</textarea></td>\n";
echo "<td width=\"110\" bgcolor=\"".$navcol."\" align=\"center\" height=\"25\" class=\"txt_nav_sm\">";
echo "<script language=\"javascript\">counterOutput('f_txt', 500, 'charCount')</script></td>\n";
echo "</tr>\n";
echo "<tr>\n";
if (($list != 0) AND (!$id)) {
	echo "<tr>\n";
	echo "<td width=\"110\" bgcolor=\"".$navcol."\" height=\"25\" align=\"center\"><p class=\"txt_nav_sm\">Sortierung</td>\n";
	echo "<td width=\"550\" bgcolor=\"".$titcol."\" height=\"25\" align=\"center\" colspan=\"5\">\n";
	echo "<select name=\"f_pos\" class=\"drop_540\">\n";
	echo "<option value=\"0\">An den Anfang der Liste</option>\n";
	for ($x = 0; $x < count($list); $x++) {
		echo "<option value=\"".($list[$x]['pos'] + 1)."\">nach ".$list[$x]['name']."</option>\n";
	}
	echo "</select></td>\n";
	echo "<td width=\"110\" bgcolor=\"".$navcol."\" height=\"25\" align=\"center\"></td>\n";
	echo "</tr>\n";
}
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"550\" bgcolor=\"".$navcol."\" height=\"25\" align=\"center\" colspan=\"5\"></td>\n";
echo "<td width=\"110\" bgcolor=\"".$navcol."\" height=\"25\" align=\"center\">\n";
echo "<input type=\"submit\" value=\"Abbrechen\" class=\"button_1\" name=\"f_cancel\"></td>\n";
echo "<td width=\"110\" bgcolor=\"".$navcol."\" height=\"25\" align=\"center\">\n";
echo "<input type=\"submit\" value=\"Übernehmen\" class=\"button_1\" name=\"f_save\"></td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</form>\n";
echo "</center>\n";
echo "</div>\n";
echo "</body>\n";
echo "</html>\n";
mysql_close;

?>
