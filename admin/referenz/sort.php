<?

echo "<html>\n";
echo "<head>\n";
echo "<title>Liste sortieren</title>\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../style.css\">\n";
echo "</head>\n";
echo "<body>\n";
echo "<div align=\"center\">\n";
echo "<center>\n";
echo "<form name=\"sort_form\" method=\"POST\">\n";
echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n";
echo "<tr>\n";
echo "<td width=\"500\" height=\"20\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"500\" height=\"30\" bgcolor=\"".$menucol."\" align=\"center\"><p class=\"txt_note\">Sortiere Beiträge...</td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</form>\n";
echo "</center>\n";
echo "</div>\n";
echo "<body onload=\"self.focus()\">\n";
echo "</html>\n";

require_once("../_shared/config.inc.php");
include_once("../_shared/func.inc.php");
open_db($db_host,$db_user,$db_passw,$datbase);

$entries = get_arr("referenz","id","","pos","");
$sort_entry = $entries[$old_pos];
$dummy = array_splice($entries,$old_pos,1);
for ($x = count($entries); $x > $new_pos; $x--) {
	$entries[$x] = $entries[$x-1];
}
$entries[$new_pos] = $sort_entry;
for ($x = 0; $x < count($entries); $x++) {
	$id = $entries[$x]['id'];
	update_data("referenz","pos=".$x,"id=".$id);
}
mysql_close;

echo "<script language=\"javascript\">window.opener.location.href='list.php'</script>";
echo "<script language=\"javascript\">window.close(this)</script>";

?>