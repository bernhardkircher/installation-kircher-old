<?

require_once("../_shared/config.inc.php");
include_once("../_shared/func.inc.php");

open_db($db_host,$db_user,$db_passw,$datbase);
$data = get_arr("referenz","id,name,pos","","pos","");

echo "<html>\n";
echo "<head>\n";
echo "<meta http-equiv=\"Content-Language\" content=\"de\">\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1252\">\n";
echo "<title></title>\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../style.css\">\n";
include("../_shared/openwin_js.php");
echo "</head>\n";
echo "<body>\n";
echo "<div align=\"center\">\n";
echo "<center>\n";
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
echo "<td width=\"770\" colspan=\"7\" bgcolor=\"".$navcol."\" align=\"center\" height=\"25\">";
echo "<p class=\"txt_nav\">Referenzprojekte</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"770\" colspan=\"7\" height=\"30\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"110\" bgcolor=\"".$navcol."\" height=\"25\" align=\"center\">\n";
echo "<input type=\"button\" value=\"Hinzufügen\" class=\"button_1\" name=\"f_add\" ";
echo "onclick=\"self.location.href='edit.php'\"></td>\n";
echo "<td width=\"660\" bgcolor=\"".$titcol."\" height=\"25\" colspan=\"6\">\n";
echo "<p class=\"txt_menu_sm\">&nbsp;Neues Projekt</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"770\" height=\"25\" colspan=\"7\"></td>\n";
echo "</tr>\n";
if ($data != 0) {
	for ($x = 0; $x < count($data); $x++) {
		echo "<tr>\n";
		echo "<td width=\"770\" bgcolor=\"".$navcol."\" height=\"25\" colspan=\"7\">\n";
		echo "<p class=\"txt_nav\">&nbsp;".$data[$x]['name']."</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td width=\"220\" bgcolor=\"".$titcol."\" height=\"25\" colspan=\"2\"></td>\n";
		echo "<td width=\"330\" bgcolor=\"".$navcol."\" height=\"25\" align=\"center\" colspan=\"3\">\n";
		echo "<select class=\"drop_320\" name=\"f_sort\" ";
		echo "onchange=\"javascript:WinOpen(this.options[this.selectedIndex].value,'sorter',540,60)\">\n";
		echo "<option value=\"\">Sortieren</option>\n";
		if ($data[$x]['pos'] > 0) {
			echo "<option value=\"sort.php?old_pos=".$data[$x]['pos']."&new_pos=0\">An den Anfang</option>\n";
		}
		for ($y = 0; $y < count($data); $y++) {
			if (($data[$y]['id'] != $data[$x]['id']) AND (($data[$y]['pos'] + 1 > $data[$x]['pos']) OR ($data[$y]['pos'] + 1 < $data[$x]['pos']))) {
				if ($data[$x]['pos'] > $data[$y]['pos']) {
					$offset = 1;
				} else {
					$offset = 0;
				}
				echo "<option value=\"sort.php?old_pos=".$data[$x]['pos']."&new_pos=".($data[$y]['pos'] + $offset)."\">nach ".$data[$y]['name']."</option>\n";
			}
		}
		echo "</select></td>\n";
		echo "<td width=\"110\" bgcolor=\"".$navcol."\" height=\"25\" align=\"center\">\n";
		echo "<input type=\"button\" value=\"Löschen\" class=\"button_1\" name=\"f_rem\" ";
		echo "onclick=\"javascript:WinOpen('rem.php?id=".$data[$x]['id']."','remwin',540,120)\"></td>\n";
		echo "<td width=\"110\" bgcolor=\"".$navcol."\" height=\"25\" align=\"center\">\n";
		echo "<input type=\"button\" value=\"Bearbeiten\" class=\"button_1\" name=\"f_edit\" ";
		echo "onclick=\"self.location.href='edit.php?init=do&id=".$data[$x]['id']."'\"></td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td width=\"770\" colspan=\"7\" height=\"25\"></td>\n";
		echo "</tr>\n";
	}
}
echo "</table>\n";
echo "</center>\n";
echo "</div>\n";
echo "</body>\n";
echo "</html>\n";
mysql_close;

?>