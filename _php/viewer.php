<?

require_once("../admin/_shared/config.inc.php");

if ($nr != NULL) {
	if (file_exists($path.$id."_".$nr."_lg.jpg")) {
		$pic = $path.$id."_".$nr."_lg.jpg";
	}
} else {
	if (file_exists($path.$id."_lg.jpg")) {
		$pic = $path.$id."_lg.jpg";
	}
}

echo "<html>\n";
echo "<head>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1252\">\n";
echo "<title>-</title>\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/style.css\">\n";
echo "</head>\n";
echo "<body style=\"margin-left: 10; margin-top: 10\" onload\=self.focus()\">\n";
echo "<div align=\"center\">\n";
echo "<center>\n";
if ($pic) {
	echo "<p><img border=\"0\" src=\"".$pic."\"></p>\n";
} else {
	echo "<p class=\"txt_mb\">Kein Bild gefunden!</p>\n";
}
echo "<p><input type=\"button\" value=\"Schliessen\" class=\"form_butt\" onclick=\"javascript:window.close(this)\"></p>\n";
echo "</center>\n";
echo "</div>\n";
echo "</body>\n";
echo "</html>\n";

?>
