<?php
//var_dump($_ENV);
//print("<PRE>");
//passthru("/bin/PATCH_SUPEE-10415_CE_1.9.2.1_v1-2017-11-27-06-48-49.sh");
//print("</PRE>");
//echo "Done1";



//print("<PRE>");
//$output = shell_exec('sh PATCH_SUPEE-10415_CE_1.9.2.1_v1-2017-11-27-06-48-49.sh');
//echo "<pre>$output</pre>";
//$output = passthru("/bin/bash/PATCH_SUPEE-10415_CE_1.9.2.1_v1-2017-11-27-06-48-49.sh");echo "<pre>$output</pre>";
//print("</PRE>");





	print("<pre>");

	passthru("/bin/bash PATCH_SUPEE-10570_CE_v1.9.2.2_v1-2018-02-28-04-54-05.sh");

	print("</pre>");

	echo"Done";

?>
