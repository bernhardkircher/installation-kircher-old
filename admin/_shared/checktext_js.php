<script language="JavaScript">

var charsToGo;

function charCounter(charInputSrcName, maxCharCount, outputTargetName) {

   // Zugriffsvariablen festlegen
   var charInputSrc = document.getElementById(charInputSrcName);
   var outputTargetSrc = document.getElementById(outputTargetName);

   if (charInputSrc != null) {
      // Länge des Feldinhaltes prüfen
      if (charInputSrc.value.length <= maxCharCount) {
         // Anzahl Restzeichen berechnen und Zeichenanzeige aktualisieren
         charsToGo = maxCharCount - charInputSrc.value.length;
         outputTargetSrc.innerHTML = charsToGo + '&nbsp;Zeichen';
      }
      else 
         // Eingegebenes Zeichen wieder abschneiden
         charInputSrc.value = charInputSrc.value.substring(0, maxCharCount);
         charsToGo = maxCharCount - charInputSrc.value.length;
      }
}

function counterOutput(charInputSrcName, maxCharCount, outputTargetName)
{
   // Zugriffsvariablen festlegen
   var charInputSrc = document.getElementById(charInputSrcName);

   // globale Variable prüfen
   if (charsToGo == null) { 
      // Ausgabewert berechnen
      charsCount = maxCharCount - charInputSrc.value.length; }
   else 
      // Ausgabefeld initialisieren
      charsCount = charsToGo; 
      document.write('<p name=\"' 
      	+ outputTargetName + '\" id=\"' + outputTargetName +'\">' 
        + charsCount + '&nbsp;Zeichen</p>')
}

</script>
