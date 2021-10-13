<?php
class ObtieneMails{
    var $user="tecnologia@devsgo.com.co";
    var $password = "Gordogay12";
    var $imapbox = "{imap.hostinger.co:993/imap/ssl/novalidate-cert}INBOX"; 
    var $fecha="22-JUN-2021";

    function obtieneAsuntosDelMails(){
        $inbox = imap_open($this->imapbox,$this->user,$this->password) or die("No se uedo conectar ".imap_last_error());

        $emails = imap_search($inbox,'SINCE "'.$this->fecha.'"');

        if($emails){
            foreach($emails as $email_number){
                $overview = imap_fetch_overview($inbox,$email_number);
                foreach($overview as $over){
                    if(isset($over->subject)){
                        $asunto = $over->subject;
                        echo utf8_decode($asunto)."<br>";
                    }
                }
            }
        }

    }
}

$obtieneMails = new ObtieneMails();
$obtieneMails->obtieneAsuntosDelMails();
?>