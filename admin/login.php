<?

require("config_inc.php");
include("_shared/openwin_js.php");

if ( ($f_user != $user) or ($f_pass != $passw) ) {
	include ("login_err.php");
} else {
	echo "<script language=\"javascript\">WinOpen2('idx_frset.php',850,600)</script>\n";
	echo "<script language=\"javascript\">self.location.href='index.php'</script>\n";
}

?>