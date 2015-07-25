<?
if ($_SERVER['QUERY_STRING']) {
 header("Location: awstats.pl?config=".$_SERVER['QUERY_STRING']);
} else {
 header("Location: awstats.pl");
}
?>
