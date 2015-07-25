<?

require_once("../admin/_shared/config.inc.php");
include_once("../admin/_shared/func.inc.php");

open_db($db_host,$db_user,$db_passw,$datbase);
$data = get_arr("referenz","id,name,txt,img_titles,imgs","","pos","");

echo "<html>\n";
echo "<head>\n";
echo "<meta http-equiv=\"Content-Language\" content=\"de\">\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1252\">\n";
echo "<title>Mitarbeiter</title>\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/style.css\">\n";
include("../admin/_shared/openwin_js.php");
echo "<body>\n";
echo "<div align=\"center\">\n";
echo "<center>\n";
echo "<table border=\"0\" cellpadding=\"2\" width=\"711\" cellspacing=\"0\">\n";
if ($data != 0) {
	for ($x = 0; $x < count($data); $x++) {
		echo "<tr>\n";
		echo "<td width=\"711\" height=\"20\" colspan=\"3\"></td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td width=\"711\" align=\"center\" bgcolor=\"".$col_1."\" colspan=\"3\">\n";
		echo "<p class=\"txt_mb_c\">".$data[$x]['name']."</td>\n";
		echo "</tr>\n";
		if ($data[$x]['imgs']) {
			$pics = explode("#",$data[$x]['imgs']);
			$pic_tits = explode("#",$data[$x]['img_titles']);
			for ($y = 0; $y < 2; $y++) {
				$pic_row = array_slice($pics,$y * 3,3);
				$tit_row = array_slice($pic_tits,$y * 3,3);
				if (($pic_row[0] == "-") && ($pic_row[1] == "-") && ($pic_row[2] == "-")) {
				} else {
					echo "<tr>\n";
					for ($i = 0; $i < 3; $i++) {
						echo "<td width=\"237\" align=\"center\" bgcolor=\"".$col_1."\">";
						if ($pic_row[$i] != "-") {
							$img_info = getimagesize($pic_ref.$data[$x]['id']."_".($i + $y * 3)."_lg.jpg");
							$view_w = $img_info[0] + 20;
							$view_h = $img_info[1] + 60;
							echo "<a href=\"javascript:WinOpen('viewer.php?path=".$pic_ref."&id=".$data[$x]['id']."&nr=".($i + $y * 3)."','viewer',".$view_w.",".$view_h.")\">";
							echo "<img border=\"0\" src=\"".$pic_ref.$data[$x]['id']."_".($i + $y * 3)."_sm.jpg\">";
						}
						echo "</td>\n";
					}
					echo "</tr>\n";
					if (($tit_row[0] == "---") && ($tit_row[1] == "---") && ($tit_row[2] == "---")) {
					} else {
						echo "<tr>\n";
						for ($i = 0; $i < 3; $i++) {
							echo "<td width=\"237\" align=\"center\" bgcolor=\"".$col_1."\" height=\"30\">\n";
							if ($tit_row[$i] != "---") {
								echo "<p class=\"txt_sm_c\">".$tit_row[$i]."</p>";
							}
							echo "</td>\n";
						}
						echo "</tr>\n";
					}
				}
			}
		}
		echo "<tr>\n";
		echo "<td width=\"711\" bgcolor=\"".$col_1."\" colspan=\"3\">\n";
		echo "<p class=\"txt_m\">".nl2br($data[$x]['txt'])."</td>\n";
		echo "</tr>\n";
	}
} else {
	echo "<tr>\n";
	echo "<td width=\"711\" height=\"20\" align=\"center\" colspan=\"3\"><p class=\"txt_mb\">Seite in Arbeit...</td>\n";
	echo "</tr>\n";
}
echo "</table>\n";
echo "</center>\n";
echo "</div>\n";
echo "</body>\n";
echo "</html>\n";
mysql_close;

?>
