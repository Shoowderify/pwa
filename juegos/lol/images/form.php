<!DOCTYPE html>
<html>
  <head>
  
    <meta charset="utf-8">
    <title>Lolein</title>
	<style>
body  {
  background-image: url("lol.jpg");
  background-color: #cccccc;
}

#todo {

	background-image: url("j.jpg");
  background-repeat: no-repeat;
	 background-size: contain;
	width:  440px;
	margin: 0px 0px 0px 400px;


	
	
}
.todo {
	 margin: 0auto;

	 float:left;
}
#form {
	margin: 0px 0px 0px 60px;
	
}
.form {
	font-size:20px;
	color:white;
	padding: 0px 0px 0px 0px;
}

#resultados {
	width: 300px;
	height: 50px;
	margin:150px 0px 0px 0px;
	
	float:left;
	
}
.resultados {
	font-size:20px;
	color:white;
	padding: 0px 0px 0px 10px;
}
#imagen {
	width: 100px;
	height:100px;
	margin: 100px 0px 0px 0px;

	
	float:right;
}


</style>
  </head>
  
  <body>
  <div id="todo" class="todo">
    <div id="form" class="form">
	
     <form class='' action='./summ1.php' method='post'>
        <label for=''>Nombre</label>
        <input type='text' name='sumonnerName' value='Plugo'>
		
		<select name='region'>
		  <option value="LA2">LAS</option>
		  <option value="LA1">LAN</option>
		  <option value="NA1">NA</option>
		  <option value="BR1">BR</option>
		  <option value="RU">RUSIA</option>
		  <option value="KR">KOREA</option>
		  <option value="EUW1">EUW</option>
		</select>
        <input type='submit' name='' value='Buscar'>
      </form>

   
	
	</div>
  </body>
</html>