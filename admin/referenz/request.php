<?

require_once("../_shared/config.inc.php");
include_once("../_shared/func.inc.php");

if ($f_ok) {
	echo "<script language=\"javascript\">window.close(this)</script>";
}

switch($msg) {
	case 0:
		$message_1 = "Sie müssen einen Projekt-Titel eingegeben!";
		$message_2 = "";
	break;
}

echo "<html>\n";
echo "<head>\n";
echo "<title>System-Mitteilung</title>\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../style.css\">\n";
echo "</head>\n";
echo "<body onload=\"self.focus()\">\n";
echo "<div align=\"center\">\n";
echo "<center>\n";
echo "<form name=\"rem_form\" method=\"POST\">\n";
echo "<table border=\"0\" width=\"500\" cellpadding=\"0\" cellspacing=\"0\">\n";
echo "<tr>\n";
echo "<td width=\"100%\" height=\"10\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"100%\" align=\"center\" height=\"25\" bgcolor=\"".$menucol."\">";
echo "<p class=\"txt_alert\">".$message_1."</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"100%\" align=\"center\" height=\"30\"><p class=\"txt_note\">".$message_2."</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"100%\" align=\"center\" height=\"25\" bgcolor=\"$navcol\">";
echo "<input type=\"submit\" value=\"OK\" class=\"button_1\" name=\"f_ok\"</td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</form>\n";
echo "</center>\n";
echo "</div>\n";
echo "</body>\n";
echo "</html>\n";

?>