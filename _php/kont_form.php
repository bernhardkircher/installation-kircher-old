<?

if ($f_send) {
	$name = $f_name;
	$sender = "From: ".$f_mail."<".$f_mail.">";
	$reply = "Reply-To: ".$f_name."<".$f_mail.">";
	$header = $sender."\r\n".$reply."\r\n"; 
	$header = str_replace("<br>","\r\n",$header);
	$header = stripslashes(strip_tags($header));
	$header = preg_replace("/(bcc:|cc:)/i","",$header);
	$header.= "X-Sender-IP: ".$REMOTE_ADDR."\r\n";
	$header.= "MIME-Version: 1.0\r\n";
	$header.= "Content-type: text/html; charset=iso-8859-1\r\n";	
	$message = "Anfrage vom ".date(d.".".m.".".Y)." um ".date(H.":".i.":".s)."\r\n\r\n";
	$message.= "Bitte um Infos über: ".$f_info."\r\n";
	if ($f_firm) {
		$message.= "Firma: ".$f_firm."\r\n";
	}
	$message.= "Name: ".$f_name."\r\n";
	if ($f_zip) {
		$message.= "PLZ: ".$f_zip."\r\n";
	}
	if ($f_city) {
		$message.= "Ort: ".$f_city."\r\n";
	}
	if ($f_adr) {
		$message.= "Strasse: ".$f_adr."\r\n";
	}
	if ($f_phone) {
		$message.= "Telefon: ".$f_phone."\r\n";
	}
	if ($f_fax) {
		$message.= "Fax: ".$f_fax."\r\n";
	}
	$message.= "e-Mail: ".$f_mail."\r\n";
	$message.= "Nachricht:\r\n";
	$message.= $f_note."\r\n";
	$message = str_replace("<br>","\r\n",$message);
	$message = stripslashes(strip_tags($message));
	$message = preg_replace("/(bcc:|cc:|to:|from:)/i","",$message);
	mail("office@installation-kircher.at","Formularanfrage",$message,$header);
	echo "<script language=\"javascript\">self.location.href='../kont_conf.htm'</script>";
}

echo "<html>\n";
echo "<head>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1252\">\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../style.css\">\n";
echo "<script language=\"JavaScript\">\n";
echo "function form_check() {\n";
echo "if (document.kontakt_form.f_name.value == \"\") {\n";
echo "alert(\"Bitte Namen eingeben!\");\n";
echo "document.kontakt_form.f_name.focus();\n";
echo "return false;\n";
echo "}\n";
echo "if (document.kontakt_form.f_mail.value == \"\") {\n";
echo "alert(\"Bitte Mail-Adresse eingeben!\");\n";
echo "document.kontakt_form.f_mail.focus();\n";
echo "return false;\n";
echo "}\n";
echo "}\n";
echo "</script>\n";
echo "</head>\n";
echo "<body>\n";
echo "<div align=\"center\">\n";
echo "<center>\n";
echo "<form name=\"kontakt_form\" method=\"post\" action=\"".$PHP_SELF."\" onsubmit=\"return form_check()\">\n";
echo "<table border=\"0\" width=\"280\">\n";
echo "<tr>\n";
echo "<td width=\"100%\" bgcolor=\"#C7C7FE\">\n";
echo "<p class=\"txt_sm_c\">&nbsp;Rot beschriftete Felder sind unbedingt auszufüllen!</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"100%\" bgcolor=\"#C7C7FE\"><p class=\"txt_sm_c\">&nbsp;Bitte um nähere Informationen über<br>\n";
echo "<select name=\"f_info\" class=\"drop_1\">\n";
echo "<option value=\"Allgemein\">Allgemein</option>\n";
echo "<option value=\"Bäder\">Bäder</option>\n";
echo "<option value=\"Badsanierung\">Badsanierung</option>\n";
echo "<option value=\"Heizung\">Heizung</option>\n";
echo "<option value=\"Heizungssanierung\">Heizungssanierung</option>\n";
echo "</select></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"100%\" bgcolor=\"#C7C7FE\"><p class=\"txt_sm_r\">&nbsp;Name<br>\n";
echo "<input type=\"text\" name=\"f_name\" class=\"line_1\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"100%\" bgcolor=\"#C7C7FE\"><p class=\"txt_sm_c\">&nbsp;Firma<br>\n";
echo "<input type=\"text\" name=\"f_firm\" class=\"line_1\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"100%\" bgcolor=\"#C7C7FE\"><p class=\"txt_sm_c\">&nbsp;Adresse<br>\n";
echo "<input type=\"text\" name=\"f_adr\" class=\"line_1\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"100%\" bgcolor=\"#C7C7FE\"><p class=\"txt_sm_c\">&nbsp;PLZ / Ort<br>\n";
echo "<input type=\"text\" name=\"f_zip\" class=\"line_2\"><input type=\"text\" name=\"f_city\" class=\"line_2\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"100%\" bgcolor=\"#C7C7FE\"><p class=\"txt_sm_c\">&nbsp;Telefon / Fax<br>\n";
echo "<input type=\"text\" name=\"f_phone\" class=\"line_2\"><input type=\"text\" name=\"f_fax\" class=\"line_2\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"100%\" bgcolor=\"#C7C7FE\"><p class=\"txt_sm_r\">&nbsp;e-Mail-Adresse<br>\n";
echo "<input type=\"text\" name=\"f_mail\" class=\"line_1\"></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"100%\" bgcolor=\"#C7C7FE\"><p class=\"txt_sm_c\">&nbsp;Anmerkung<br>\n";
echo "<textarea class=\"txtbox\" name=\"f_note\"></textarea></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=\"100%\" bgcolor=\"#C7C7FE\">\n";
echo "<div align=\"left\">\n";
echo "<table border=\"0\" cellpadding=\"0\" width=\"100%\">\n";
echo "<tr>\n";
echo "<td width=\"50%\"><input type=\"reset\" value=\"Löschen\" class=\"form_butt\" name=\"f_reset\"></td>\n";
echo "<td width=\"50%\" align=\"right\"><input type=\"submit\" value=\"Senden\" class=\"form_butt\" name=\"f_send\"></td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</div>\n";
echo "</td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</form>\n";
echo "</center>\n";
echo "</div>\n";
echo "</body>\n";
echo "</html>\n";

?>

