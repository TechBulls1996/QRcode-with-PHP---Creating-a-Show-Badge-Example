<?php


$img = [
"fabtech" => "fabtech.jpg",
"boiler" => "Boiler.jpg",
"coatindia" => "coatIndia.jpeg",
"istfe" => "ISTFE.jpg",
];

$hash = $_REQUEST['hash'];
$name = $_REQUEST['name'];
$type = $img[$_REQUEST['type']];
$email = $_REQUEST['email'];

$qrImg = file_get_contents('https://acem7.com/badge/qrcoder/myQrcode.php?id='.$hash);

?>
<html>
<head>
<title>Download Badge - Fabtech</title>


<style>

body {
font-family: sans-serif;
}

.main {
    position: relative;
    margin: auto;
    width: 556px;
    max-width: 95%;
    height: 740px;
    background-image: url(./img/<?=$type?>);
    background-size: 100% 100%;
        
}
div#qrcode {
    position: absolute;
    bottom: 22%;
    width:100%; 
    background-image:url('https://acem7.com/badge/qrcoder/temp/<?= $hash ?>.png');
    height: 200px;
    width: 200px;
    background-size: cover;
    display: block;
    margin: auto;
    left: 30%;
}


h2 {
    position: absolute;
    bottom: 8%;
    font-size: 38px;
    text-align: center;
    width: 100%;
}


<?php
if($_REQUEST['type'] == 'boiler'){
?>
div#qrcode {
    bottom: 35%;
    } 
h2 {
    bottom: 25%;
    font-size:32px;
    }
<?php
}
?>



@media( max-width:800px){
.main{
    height: 510px;
    }
div#qrcode img { 
    height: 180px;
}

h2 {
    bottom: 7%;
    font-size: 28px;
    }
    
<?php
if($_REQUEST['type'] == 'boiler'){
?>
.main {
    height: 549px;
    }
    h2 {
        bottom: 22%;
        font-size: 26px;
    }
    
    div#qrcode {
    bottom: 32%;
}
<?php
}
?>
}
</style>
</head>
<body>

<div class="main"> 
<h2><?= $name; ?> </h2> 
<div id="qrcode" class="m-auto"></div>

</div>

</body>
</html>
<?php
if(isset($email)){
    $url = "https://acem7.com/badge/?type=fabtech&name=".$_REQUEST['name']."&hash=".$_REQUEST['hash'];

   // Multiple recipients 
    $to  = 'soroutlove1996@gmail.com, shikha@acem7.com, support@acem7.com, '.$email;
    // Subject
    $subject = 'Your '.$_REQUEST['type'].' Visitor Badge';

    // To send HTML mail, the Content-type header must be set
    $headers = array(
    'From' => 'ACEXM7 - Event Management Company since 2015 <notification@acem7.com>',
    'Reply-To' => 'shikha@acem7.com, support@acem7.com',
    'X-Mailer' => 'PHP/' . phpversion(),
    'MIME-Version' => '1.0',
    'Content-type' => 'text/html; charset=iso-8859-1',
    );
$heightParent = '680px';
$heightChild = '620px';
$padtop = '24.5%';

if($_REQUEST['type'] == 'boiler'){
    $heightParent = '780px';
    $heightChild = '740px';
    $padtop = '25%';
}
$htmlContent = ' 
    <html> 
    <head> 
        <title>Download Your Visitor\'s Badge</title> 
    </head> 
    <body> 
        <b>Dear  '.$name.', <br> Your Registration ID: '.$hash.' </b> 
        <p>We thank you for registering online to visit India biggest Expo. Our Team will reach out to you very soon. if you have any query you can contact us on support@acem7.com or 011 4912 1069</p>
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr> 
                <td>
                <div style="background-image:url(https://acem7.com/badge/img/'.$type.'); margin: auto; width: 556px;  max-width: 95%; height: '.$heightParent.'; padding-top: '.$padtop.'; background-repeat: no-repeat;background-size: 100% '.$heightParent.';  margin-top: 20px;"> 
        
                <img src="https://acem7.com/badge/qrcoder/temp/'.$hash.'.png" style="display:block; margin:auto; width:200px; height:200px; "/>
                <h2 style="font-size:38px;text-align:center;margin-top: 0px;margin-bottom: 0px;">'.$name.' </h2> 
        
                </div>
                </td> 
            </tr> 
            
        </table> 
    </body> 
    </html>'; 

    // Mail it
    $mail = mail($to, $subject, $htmlContent, $headers);
  
}
?>