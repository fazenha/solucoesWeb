<?

include('class/mail/sendMail.class.php');
include('class/fileSend/sendFile.class.php');

$userId = 42685;
$sigla = 'PORTAL';
$fileId = 15;

/* -------------------------------------------------------------------------------------------------------------------------------------------- */		
$from='solucoes.web@santander.com.br';
$to= array('fazenha@santander.com.br','jiwahata@santander.com.br');
$cc=array('htpixs@gmail.com','flavio.copola@gmail.com');
$bcc=array('htpixs@gmail.com','flavio.copola@gmail.com');
$ReplyTo='fazenha@santander.com.br';
$subject='[Infraestrutura] Teste de envio do novo Serviço de Email "OK"';

$message='<p>Olá bom dia,</p>
<p>Teste realizado com sucesso!</p>
<p>Obrigado.</p>
<p><a name="_MailAutoSig"><img width="95" height="29" src="file:///C|/Documents and Settings/t677656/Dados de aplicativos/Adobe/Dreamweaver 9/OfficeImageTemp/clip_image001.gif" alt="cid:image001.gif@01CB5F41.89CF2C80"></a><strong> </strong><br>
    <strong>Flavio Copola Azenha</strong>&nbsp;<strong><br>
    </strong>Estratégia e Soluções Contact Center<br>
  Gestão Comercial e Atendimento Multicanal </p>
<p>Rua José de Oliveira Coutinho, 73<br>
  Tel: (11) 3012-8600 R.: 715961 <br>
  <a href="mailto:fazenha@prservicos.com.br">fazenha@santander.com.br </a> </p>
<p><em>Favor levar em conta o  meio-ambiente antes de imprimir este e-mail.<br>
  Por favor tenga en cuenta el medioambiente antes de imprimir este e-mail.<br>
</em><em>Please  consider your environmental responsibility before printing this e-mail. </em> </p>';

/* -------------------------------------------------------------------------------------------------------------------------------------------- */		
$mail=new sendMail($to, $subject, $message, $from);
$file=new fileSend($_FILES, $userId, $sigla);

$mail->addCopia($cc);
//$mail->addCopiaOculta($bcc);
$mail->tracertLog($userId, $sigla);
//$msg=$file->uploadFile();
$attachment=$file->getFile($fileId);
$mail->addAnexo($attachment);
$msg=$mail->execSendMail();
$file->delTmpFile($fileId);

unset($mail);
unset($file);

echo $msg;

?>