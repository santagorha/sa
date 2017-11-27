

<?php

  $ldap_dn = "uid=".$_POST["username"].",ou=People,dc=example,dc=com";
  $ldap_password = $_POST["password"];
 $ldap_host= "127.0.0.1";
  $ldap_port = 389;
  
  $ldap_con = ldap_connect($ldap_host,$ldap_port);
   ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);

  if(@ldap_bind($ldap_con,$ldap_dn,$ldap_password))
    echo "Authenticated";
  
            else
    echo"<script> alert('Usuario o clave incorrecta. Vuelva a digitarlos por favor.'); window.location.href='index.php'; </script>";
  //
?>


