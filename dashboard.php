<!doctype html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Automatic logout after 10 min of user Inactivity in page using PHP Mysql</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">	   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
<body>
    <div class="container">
	<div class="row" style="margin-top:70px;">
            <?php
    	        include_once('check_user.php');
	    ?>
	    <div class="col-md-12 card text-center" style="padding:50px;">
	        <h3>Bem vindo <span class="text-success"><?php echo ucwords($_SESSION['NAME']); ?>
	        </span> sistema de tempo</h3>
	        <h3>automaticamento o site vai sair a apos 1 munuto sem interação!</h3>
	        <p><a href='logout.php'>Logout</a></p>
	    </div>
        </div>		
    </div>		
</body>
</html>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">   
     	<!-- Modal Header -->
     	<div class="modal-header">
           <h4 class="modal-title">Session vai acabar</h4>       
       	</div>     
	<!-- Modal body -->
    	<div class="modal-body">
           Você nao esta interagindo com o site vai terminar sua sessao automaticamente.
     	</div>     
	<!-- Modal footer -->
	<div class="modal-footer">
	   <a href="index.php" class="btn btn-primary btn-sm">Login again</a>     		
	</div>     
     </div>
  </div>
</div>
<script type="text/javascript">
  
setInterval(check_user,60 * 1000);

function check_user(){
    $.ajax({
	url:'check_user.php',
   	method:'POST',      	
   	data:'type=logout',
   	success:function(result){ 
   	    if (result == "logout") {
	   	$("#myModal").modal({
	           backdrop: 'static',
	   	   keyboard: false,
	        });
	    setTimeout(function(){
	       $('#myModal').modal('hide')
	          window.location.href="logout.php";
	       }, 10000);				
	   }      	
   	}
   });
}

</script>