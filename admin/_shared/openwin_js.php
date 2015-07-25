<script language="JavaScript">
function WinOpen(seite,nam,winW,winH)
{
   le=(screen.availWidth/2)-(winW/2);
   to=(screen.availHeight/2)-(winH/2);
   para = 'toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width='+winW+',height='+winH+',left='+le+',top='+to+'';
   win=window.open(seite,nam,para);
}
function WinOpen2(seite,winW,winH)
{
   le=(screen.availWidth/2)-(winW/2);
   to=(screen.availHeight/2)-(winH/2);
   para = 'toolbar=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width='+winW+',height='+winH+',left='+le+',top='+to+'';
   win=window.open(seite,'MAIN',para);
}
</script>