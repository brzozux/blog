<?php
include_once 'config.php';
include_once 'glogin.php';
$user ="";
$user_data = "";
$user_chat = "";
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Engineer's Blog</title>
		<!-- Skrypty JS-->
		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/stylechat.css" />
        <!-- Custom CSS -->
        <link href="css/clean-blog.min.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet type='text/css'>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body class="">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <a class="navbar-brand">
					<?php 
						if($_SESSION['logged'] == true){
							db_connect();
							$user_data = get_user_data();
							db_close();
							$user_chat = $user_data['user_name']; 
							echo "Witaj ".$user_data['user_name']; 
						} else if ($_SESSION['access_token'] !=""){
							$user = $service->userinfo->get();
							echo 'Witaj '.$user->name;
							$user_chat = $user->name;
						}
						?>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="about.php">O Mnie<br></a>
                        </li>
                        <li>
                            <a href="contact.php">Kontakt<br></a>
                        </li>
                        <li class="login">
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->
        <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>Engineer's blog<br></h1>
                            <hr class="small">
                            <span class="subheading">Czyli jak zaliczyć dwa przedmioty jednocześnie<br>i zostać inżynierem</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-preview">
                        <a href="post.php" class=""><h2 class="post-title">
                            [ORW] Technologia AJAX<br></h2><h3 class="post-subtitle">
                            Problems look mighty small from 150 miles up</h3></a>
                        <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>
                    </div>
                    <hr>
                    <div class="post-preview">
                        <a href="post.php"><h2 class="post-title">
                            [ORW] Ekstrakcja danych z sieci WWW<br></h2></a>
                        <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 18, 2014</p>
                    </div>
                    <hr>
                    <div class="post-preview">
                        <a href="post.php"><h2 class="post-title">
                            [OOR] Wielowątkowość w aplikacjach WWW - Web Workers</h2><h3 class="post-subtitle">
                            We predict too much for the next year and yet far too little for the next ten.</h3></a>
                        <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on August 24, 2014</p>
                    </div>
                    <hr>
                    <div class="post-preview">
                        <a href="post.php"><h2 class="post-title">
                            [ORW] Frameworki front-endowe</h2><h3 class="post-subtitle">
                            Many say exploration is part of our destiny, but it’s actually our duty to future generations.</h3></a>
                        <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on July 8, 2014</p>
                    </div>
                    <div class="post-preview">
                        <a href="post.php"><h2 class="post-title">
                            [ORW] Zadania okresowe - CRON jobs<br></h2><h3 class="post-subtitle">
                            Many say exploration is part of our destiny, but it’s actually our duty to future generations.</h3></a>
                        <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on July 8, 2014</p>
                    </div>
                    <hr>
                    <!-- Pager -->
                    <ul class="pager">
                        <li class="next">
                            <a href="#">Starsze posty &rarr;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <ul class="list-inline text-center">
                            <li>
                                <a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-github fa-stack-1x fa-inverse"></i></span></a>
                            </li>
                        </ul>
                        <p class="copyright text-muted">Copyright &copy; Your Website 2014</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="js/clean-blog.min.js"></script>
		
	<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"></span> Chat
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </div>
                </div>
            <div class="panel-collapse collapse" id="collapseOne">
                <div class="panel-body">
                    <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
									<small class="pull-right text-muted"></small>
                                    <strong class="primary-font">
									<?php echo $user_chat;?>
									</strong> 
                                </div>
                                <div class="message_box" id="message_box"></div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input name="message" id="message" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button type="submit" id="send-btn" class="btn btn-warning btn-sm">Send</button>
                        </span>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<script language="javascript" type="text/javascript"> 
$(document).ready(function(){
	//create a new WebSocket object.
	var wsUri = "ws://localhost:9000/daemon.php";	
	websocket = new WebSocket(wsUri);
	
		$('#send-btn').click(function(){ //use clicks message send button	
		var mymessage = $('#message').val(); //get message text
		
		if(mymessage == ""){ //emtpy message?
			alert("Enter Some message Please!");
			return;
		}
		
		//prepare json data
		var msg = {
		message: mymessage,
		};
		//convert and send data to server
		websocket.send(JSON.stringify(msg));
	});
	
	//#### Message received from server?
	websocket.onmessage = function(ev) {
		var msg = JSON.parse(ev.data); //PHP sends Json data
		var type = msg.type; //message type
		var umsg = msg.message; //message text

		if(type == 'usermsg') 
		{
			$('#message_box').append("<span class=\"user_message\">"+umsg+"</span>");
		}
		
		$('#message').val(''); //reset text
	};
	
	websocket.onerror	= function(ev){$('#message_box').append("<p class=\"system_error\">Error Occurred - "+ev.data+"</p>");}; 
	websocket.onclose 	= function(ev){$('#message_box').append("<p class=\"system_msg\">Connection Closed</p>");}; 
});
</script>
    </body>
</html>
