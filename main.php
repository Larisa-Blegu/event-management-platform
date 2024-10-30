<!DOCTYPE html>
<html>
<head>
    <title>Academia de evenimente</title> 
<style>
    html, body {
        height: 100%;
    
    }
    body{
        background-image:url('imgfundal.jpg');
        background-size: 100% 130%;
    }
    h1{
        font-family:Cambria;
        font-size: 35px;
        text-shadow: 2px 2px pink;
        text-align: center;
    }
    p{
        text-align: center;
        font-family: Cambria;
        font-size: 17px;
        font-style: italic;
    }
    #btn  {
            text-align: right;
            margin-top: 20px;
        }

    #btn a {
            display: inline-block;
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #ffe4c4; 
            text-decoration: none;
            color: #000; 
            border-radius: 5px; 
        }

    .mainpoza{
        width: 50%;
        float: left;
    }

    img{
        border-radius: 50%;
        width: 300px; 
        height: 300px; 
        
    }
    #poza1{
        width: 42%;
        float: left;
        margin-top: 100px;
        margin-left: 40px;
    }
    #poza2{
        width: 42%;
        float: left;
        margin-top: 10px;
        margin-left: 40px;
    }
</style>
</head>

<body>
<div id="btn">
        <a href="register.php"> SignUp</a>
        <a href="login.php">LogIn</a>
</div>
    <h1>Evenimente</h1>
    <br>
    <p><b>Bine ați venit pe site-ul nostru "Evenimente", destinația ta online pentru evenimente de neuitat și experiențe inedite! Suntem pasionați să aducem laolaltă comunitatea și evenimentele de calitate, și să oferim o platformă ușor accesibilă pentru rezervări rapide și sigure. </b></p>
    <br>
     <div class="mainpoza">
        <img src="mainpoza1.png" id="poza1">
        <img src="mainpoza2.png" id="poza2">
    </div>
    <div class="mainpoza">
        <img src="mainpoza3.png" id="poza2">
        <img src="mainpoza4.png" id="poza1">
    </div>
</body>
</html>