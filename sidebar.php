<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

<!--Start Message code-->
  
	<script>
	function submitVal(){
		var username = document.getElementById('username').value;
		var mobileNumber = document.getElementById('mobile_number').value;
		// var message = document.getElementById('message').value;
		//window.location = "http://103.16.101.52:8080/sendsms/bulksms?username=ams1-pitdemo&password=12345&type=0&dlr=1&destination=919096751112&source=FREEDM&message="+username+''+mobileNumber+''+message;

		// jQuery REST trial
		$.ajax({
    	url: 'http://103.16.101.52:8080/sendsms/bulksms?username=pit6-imatessms&password=imatessm&type=0&dlr=1&destination=919860269054&source=imates&message=PuneLicAgents WebSMS%0AName: '+username+'%0AContact No.: '+mobileNumber,
    	type: 'POST',
    	//data: 'ID=1&Name=John&Age=10', // or $('#myform').serializeArray()
    	data:username+"-"+mobileNumber,
    	complete: function(){
			window.location.href="thank-you.php";
		}
		
});
	    
	   
	}
	/*
	function next(){
		window.location = "http://www.google.com";
	}
	*/
    </script>
  <!--End Message code-->

</head><!--/head-->
<body>
     
                <div class="col-md-3 sidebar" >

     
  <h3>Get Call Back..!!</h3> 
    <form method="post"> 
    <div class="form-group">
    <input class="form-control" placeholder="Enter Name" type="text" name="name" id="username"  required> </div> 
    <div class="form-group">
    <input class="form-control" placeholder="Enter Contact Number" type="text" name="phone" id="mobile_number" required> </div>
	    
    <input type="button" value="Send" class="btn btn-success contact-button" onClick="submitVal()">
    <input type="reset"  class="btn btn-warning" name="reset" value="Reset" />
    </form>
                
      <h3>Find</h3>               
      <p><a href="lic-agents.php"><span class="glyphicon glyphicon-chevron-right"></span> LIC Agents</a></p> 
      <p><a href="lic-development-officers.php"><span class="glyphicon glyphicon-chevron-right"></span> LIC Development Officers</a></p>
       
      <h3>Important</h3>               
      <p><a href="Blog/index.php"><span class="glyphicon glyphicon-chevron-right"></span> Blog</a></p> 
      <p><a href="branch-list.php"><span class="glyphicon glyphicon-chevron-right"></span> Branch List</a></p> 
      <p><a href="download-forms.php"><span class="glyphicon glyphicon-chevron-right"></span> Download Forms</a></p> 
      <p><a href="register.php"><span class="glyphicon glyphicon-chevron-right"></span> Want to Register?</a></p> 
      <br>
      <a href="apply-for-lic-agent.php"><button type="button" class="btn btn-danger blink_me">Apply for Lic Agency & Get Offer</button></a>  
      <br>
      <br>
      <a href="apply-for-lic-agent.php"><img src="images/apply-for-lic-agent.jpg" width="100%" alt="logo"></a>                
                    <p class="gap"></p>
                </div> 
 
      
 
</body>
</html>