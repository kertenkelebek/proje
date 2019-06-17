html, body{
		height: 100%;
		overflow: hidden;
		padding: 0px;
		margin:0px;
		}
		a, p{
		front-size:12px;
		font-family: helvetica;
		}
#container{
	box-shadow: 2px 2px 10px #000000;
	width: 1200px;
	height:90%;
	margin: 2% auto;
	border-radius: 1%;
	overflow: hidden;
}
#menu{
	background: #4CAF50;
	color: white;
	padding: 1%;
	font-size: 20px;

}

   #left-col, #right-col{
	position: relative;
	float: left;
	height: 90%;
}
#left-col{
	width: 30%;
}
#right-col{
	width: 69%;
	border:1px solid #000000;
}
#left-col-container, #right-col-container{
width: 100%;
height: 100%;
margin: 0px auto;
height: 100%;
overflow: auto;
}
.grey-back{
	border:1px solid black;
	padding: 5px;
	background: #efefef;
	margin: 0px auto;
	margin-top: 2px;
	overflow: auto;
}
.image{
float:left: width:50px: height:50px;
margin-right: 5px;
}

#messages-container{
height: 80%;
overflow: auto;
}
.textarea{
width: 99%;
height: 10%;
position: absolute;
bottom: 1%;
margin: 0px auto;
}
.grey-message, .white-message{
border: 1px solid   black;
width: 96%;
padding: 5px;
margin: 2px auto 0;
overflow: auto;
}
.grey-message{
background: grey;
}
#new-message{
	display: none;
	box-shadow: 2px 10px 30px #000000;
	width: 500px;
	position: fixed;
	top: 20%;
	background: white;
	z-index: 2;
	left: 50%;
	transform: translate(-50%,0);
	border-radius: 5px;
	overflow: auto;
}
.m-header, .m-footer{
	background: #4CAF50;
	margin:0px;
	color: white;
	padding: 5px;
}
.m-header{
	font-size: 20px;
	text-align: center;
}
.m-body{
	padding: 5px;
}
.message-input{
	width: 96%;
}