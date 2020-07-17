<?
    $Email=$_POST['mail'];
    $subject = 'Recuperação da password';

    $bound_text = "----*%$!$%*";
    $bound = "--".$bound_text."\r\n";
    $bound_last = "--".$bound_text."--\r\n";

    $headers = "From: luis.goncalves.lg.98@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n" .
            "Content-Type: multipart/mixed; boundary=\"$bound_text\""."\r\n" ;

    $message = " you may wish to enable your email program to accept HTML \r\n".
            $bound;

    $message .=
    'Content-Type: text/html; charset=UTF-8'."\r\n".
    'Content-Transfer-Encoding: 7bit'."\r\n\r\n".
    '
<!-- here is where you format the email to what you need, using html you can use whatever style you want (including the use of images)-->
            <BODY BGCOLOR="White">
            <body>
            <div Style="align:center;">
            <p>
            <img src="IMAGE_URL" alt= "IMAGE_NAME">
            </p>
            </div>
            </br>
            <div style=" height="40" align="left">

            <font size="3" color="#000000" style="text-decoration:none;font-family:Lato light">
            <div class="info" Style="align:left;">

            <p>information here<!--(im sure you know how to write html ;))--></p>

            <br>

            <p>Date:            </p>

                            </div>

            </br>
            <p>-----------------------------------------------------------------------------------------------------------------</p>
           
            </font>
            </div>
            </body>
        '."\n\n".
    


     $bound_last;

    $sent = mail($Email, $subject, $message, $headers); // finally sending the email


}
?>