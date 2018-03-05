
<?php
$EmailTo = "ace_in_the_hole_multisport@laurarains.webhostingforstudents.com";
$Subject = "Registration";
$Name = trim(stripslashes($_POST['name'])); 
$EmailFrom = trim(stripslashes($_POST['email'])); 
$Phone = trim(stripslashes($_POST['phone'])); 
$EmergencyName = trim(stripslashes($_POST['emergency-name']));
$EmergencyPhone = trim(stripslashes($_POST['emergency-phone']));
$Participant = trim(stripslashes($_POST['participant']));
$Shirt = trim(stripslashes($_POST['shirt']));
$SaturdayEvents = trim(stripslashes($_POST['saturday-events']));
$SundayEvents = trim(stripslashes($_POST['sunday-events']));
$current_date = date("Y-m-d"); 

$validationOK=true;
if ($EmailFrom=="") $validationOK=false;
if ($Name=="") $validationOK=false;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
  exit;
}

$myFilePath = "registration/";
$myFileName = "form-data.csv";
$myPointer = fopen ($myFilePath.$myFileName, "a+");
$form_data = $current_date . "," . $Subject . "," . $Name . "," . $EmailFrom . ","  . $Phone . "," . $Participant . "," . $Shirt . "," . $SaturdayEvents . "," . $SundayEvents . ","  . $EmergencyName . "," . $EmergencyPhone . "\n";
fputs ($myPointer, $form_data);
fclose ($myPointer);

$Body = "";
$Body .= "name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "email: ";
$Body .= $EmailFrom;
$Body .= "\n";
$Body .= "phone: ";
$Body .= $Phone;
$Body .= "\n";
$Body .= "emergency-name: ";
$Body .= $EmergencyName;
$Body .= "\n";
$Body .= "emergency-phone: ";
$Body .= $EmergencyPhone;
$Body .= "\n";
$Body .= "participant: ";
$Body .= $Participant;
$Body .= "\n";
$Body .= "shirt: ";
$Body .= $Shirt;
$Body .= "\n";
$Body .= "saturday-events: ";
$Body .= $SaturdayEvents;
$Body .= "\n";
$Body .= "sunday-events: ";
$Body .= $SundayEvents;
$Body .= "\n";


$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=registered.html\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
}


?>


