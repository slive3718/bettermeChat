<div id="chats">

</div>

<input type="text" id="chatMsg">
<button id="sendBtn">SEND</button>






<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="http://localhost:3000/socket.io/socket.io.js"></script>

<script>

var socketServer = "http://localhost:3000/";
var socket = io.connect(socketServer);

$(function(){

$('#sendBtn').on('click', function(){
	
	var messageToSend = $('#chatMsg').val();
	
	if(messageToSend == '')
	{
		alert('Please enter some message');
		return false;
	}
	
	//ajax save chat to db
	socket.emit('newMsg', messageToSend);
	
	
});

socket.on('newMsg', function(msg){
	$('#chats').append('Someone: '+msg+'<br>');
})
	
});



</script>