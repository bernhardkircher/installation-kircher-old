<?

require("config_inc.php");

echo "<html>\n";
echo "<head>\n";
echo "<title>Auswahl</title>\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">\n";
echo "</head>\n";
echo "<body>\n";
echo "<div align=\"center\">\n";
echo "<center>\n";
echo "<table border=\"0\" cellpadding=\"0\" width=\"770\" cellspacing=\"0\">\n";
echo "<tr>\n";
echo "<td width=\"110\" align=\"center\" height=\"30\" bgcolor=\"$navcol\">";
echo "<input type=\"button\" value=\"Referenzen\" class=\"button_1\" ";
echo "onclick=\"top.frames[1].location.href='referenz/list.php'\"></td>\n";
echo "<td width=\"110\" align=\"center\" height=\"30\" bgcolor=\"$navcol\"></td>\n";
echo "<td width=\"110\" align=\"center\" height=\"30\" bgcolor=\"$navcol\"></td>\n";
echo "<td width=\"110\" align=\"center\" height=\"30\" bgcolor=\"$navcol\"></td>\n";
echo "<td width=\"110\" align=\"center\" height=\"30\" bgcolor=\"$navcol\"></td>\n";
echo "<td width=\"110\" align=\"center\" height=\"30\" bgcolor=\"$navcol\"></td>\n";
echo "<td width=\"110\" align=\"center\" height=\"30\" bgcolor=\"$navcol\">";
echo "<input type=\"button\" value=\"Beenden\" class=\"button_1\" onclick=\"top.close()\"></td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</div>\n";
echo "</center>\n";
echo "</body>\n";
echo "</html>\n";

?>