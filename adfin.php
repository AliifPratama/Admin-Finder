<?php

print "   
	
 ▄▄▄      ▓█████▄   █████▒██▓ ███▄    █ ▒███████▒▓█████ ▒██   ██▒
▒████▄    ▒██▀ ██▌▓██   ▒▓██▒ ██ ▀█   █ ▒ ▒ ▒ ▄▀░▓█   ▀ ▒▒ █ █ ▒░
▒██  ▀█▄  ░██   █▌▒████ ░▒██▒▓██  ▀█ ██▒░ ▒ ▄▀▒░ ▒███   ░░  █   ░
░██▄▄▄▄██ ░▓█▄   ▌░▓█▒  ░░██░▓██▒  ▐▌██▒  ▄▀▒   ░▒▓█  ▄  ░ █ █ ▒ 
 ▓█   ▓██▒░▒████▓ ░▒█░   ░██░▒██░   ▓██░▒███████▒░▒████▒▒██▒ ▒██▒
 ▒▒   ▓▒█░ ▒▒▓  ▒  ▒ ░   ░▓  ░ ▒░   ▒ ▒ ░▒▒ ▓░▒░▒░░ ▒░ ░▒▒ ░ ░▓ ░
  ▒   ▒▒ ░ ░ ▒  ▒  ░      ▒ ░░ ░░   ░ ▒░░░▒ ▒ ░ ▒ ░ ░  ░░░   ░▒ ░
  ░   ▒    ░ ░  ░  ░ ░    ▒ ░   ░   ░ ░ ░ ░ ░ ░ ░   ░    ░    ░  
      ░  ░   ░            ░           ░   ░ ░       ░  ░ ░    ░  
           ░                            ░                        
       
                                                                   
             ########### Admin Finder ##############
             #        Total : 4001 list            #
             #  Visit My Website : www.zexmap.me   #
             #######################################
";           

echo "Enter Your Site  : ";
$target = trim(fgets(STDIN));
$list = "zexlist.txt";
if(!preg_match("/^http:\/\//",$target) AND !preg_match("/^https:\/\//",$target)){
	$targetnya = "http://$target";
}else{
	$targetnya = $target;
}

$buka = fopen("$list","r");
$ukuran = filesize("$list");
$baca = fread($buka,$ukuran);
$lists = explode("\r\n",$baca);

foreach($lists as $login){
	$log = "$targetnya/$login";
	$ch = curl_init("$log");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	if($httpcode == 200){
		 $handle = fopen("result.txt", "a+");
		fwrite($handle, "$log\n");
		print "\n\n [".date('H:m:s')."] Mencoba : $log => Found\n";
	}else{
		print "\n[".date('H:m:s')."] Mencoba : $log => Not Found";
	}
}
  
?>
