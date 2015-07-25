<?

require_once("../_shared/config.inc.php");
include_once("../_shared/func.inc.php");
open_db($db_host,$db_user,$db_passw,$datbase);
$data = get_row("referenz","name,pos,imgs","id='".$id."'");

if ($f_cancel) {
	echo "<script language=\"javascript\">window.close(this)</script>";
	exit;
}

if ($f_rem) {
	if ($data['imgs']) {
		$pics = explode("#",$data['imgs']);
		for ($x = 0; $x < 6; $x++) {
			if ($pics[$x] != "---") {
				unlink($img_ref.$id."_".$x."_sm.jpg");
				unlink($img_ref.$id."_".$x."_lg.jpg");
			}
		}
	}
	remove_data("referenz","id=".$id);
	update_data("referenz","pos=pos-1","pos>".$data['pos']);
	mysql_close;
	echo "<script language=\"javascript\">window.opener.location.href='list.php'</script>";
	echo "<script language=\"javascript\">window.close(this)</script>";
}

echo "<html>\n";
echo "<head>\n";
echo "<title>Eintrag löschen</title>\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../style.css\">\n";
echo "</head>\n";
echo "<body onload=\"self.focus()\">\n";
echo "<div align=\"center\">\n";
echo "<center>\n";
echo "<form name=\"rem_form\" method=\"POST\">\n";
echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\">\n";
echo "<table border=\"0\" width=\"500\" cellpadding=\"0\" cellspacing=\"0\">\n";
echo "<tr>\n";
echo "<td width=\"100%\" height=\"10\" colspan=\"2\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"100%\" align=\"center\" height=\"25\" colspan=\"2\" bgcolor=\"".$titcol."\">";
echo "<p class=\"txt_alert\">Eintrag \"".$data['name']."\" löschen?</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"100%\" align=\"center\" height=\"20\" colspan=\"2\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"50%\" align=\"center\" height=\"25\" bgcolor=\"".$navcol."\">";
echo "<input type=\"submit\" value=\"Abbruch\" class=\"button_1\" name=\"f_cancel\"</td>\n";
echo "<td width=\"50%\" align=\"center\" height=\"25\" bgcolor=\"".$navcol."\">";
echo "<input type=\"submit\" value=\"Löschen\" class=\"button_1\" name=\"f_rem\"</td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</form>\n";
echo "</center>\n";
echo "</div>\n";
echo "</body>\n";
echo "</html>\n";