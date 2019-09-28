<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<?php
  echo"<style>";
    include "wowstyle.css";
  echo"</style>";

  include "include/style1.php";
set_time_limit(0);
	$i=1;
	while ($i < 13  )
	{
	
	$url[$i]="https://us.api.blizzard.com/data/wow/playable-class/".$i."?namespace=static-us&locale=es_es&access_token=USo0ork8iMfE5pY53sjgfOJGHJ6RksdTw5";
     $ch[$i] = curl_init();
     curl_setopt_array($ch[$i],[
         CURLOPT_URL => $url[$i],
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data[$i]=curl_exec($ch[$i]);
    curl_close($ch[$i]);

    $e[$i]=json_decode($data[$i]);

    $jefes=$e[$i]->name;
    $poder=$e[$i]->specializations;
    
    $poder1=$poder[0]->name;
    $poder2=$poder[1]->name;
    }

?>


<body>

<!-- These variables help keep track of the input name and ID-->
<!-- currentTab helps keep track of each individual input-->
<!-- tabControlName is used as a unique identifier for the accordion-->
<?php
echo"  
  <ul>
   <li>
     <!-- Using radio inputs means only one can be selected at a time-->
    <!-- The ID must be unique so the label will point to the input-->
     <input id='rad1' type='radio' name='rad' checked='checked'/>
     <label for='rad1'>
       <div>Just keep going with longer text</div>
     </label>
     <div class='accslide'>
       <div class='content'>
         <h1>Just keep going with longer text</h1>
         <p>Lorem ipsum...</p>
       </div>
     </div>
   </li>
   <li>
   ";
?>
    <!-- Using radio inputs means only one can be selected at a time-->
    <!-- The ID must be unique so the label will point to the input-->
    <input id="rad2" type="radio" name="rad"/>
    <label for="rad2">
      <div>Second panel</div>
    </label>
    <div class="accslide">
      <div class="content">
        <h1>Second panel</h1>
        <p>Lorem ipsum...</p>
      </div>
    </div>
  </li>
  <li>
    <!-- Using radio inputs means only one can be selected at a time-->
    <!-- The ID must be unique so the label will point to the input-->
    <input id="rad3" type="radio" name="rad"/>
    <label for="rad3">
      <div>Third panel</div>
    </label>
    <div class="accslide">
      <div class="content">
        <h1>Third panel</h1>
        <p>Lorem ipsum...</p>
      </div>
    </div>
  </li>
  <li>
    <!-- Using radio inputs means only one can be selected at a time-->
    <!-- The ID must be unique so the label will point to the input-->
    <input id="rad4" type="radio" name="rad"/>
    <label for="rad4">
      <div>Fourth panel</div>
    </label>
    <div class="accslide">
      <div class="content">
        <h1>Fourth panel</h1>
        <p>Lorem ipsum...</p>
      </div>
    </div>
  </li>

  <li>
    <!-- Using radio inputs means only one can be selected at a time-->
    <!-- The ID must be unique so the label will point to the input-->
    <input id="rad5" type="radio" name="rad"/>
    <label for="rad5">
      <div>five panel</div>
    </label>
    <div class="accslide">
      <div class="content">
        <h1>Five panel</h1>
        <p>aunñam ipsum...</p>
      </div>
    </div>
  </li>

  <li>
    <!-- Using radio inputs means only one can be selected at a time-->
    <!-- The ID must be unique so the label will point to the input-->
    <input id="rad6" type="radio" name="rad"/>
    <label for="rad6">
      <div>six panel</div>
    </label>
    <div class="accslide">
      <div class="content">
        <h1>six panel</h1>
        <p>auasnñam ipsum...</p>
      </div>
    </div>
  </li>

  <li>
    <!-- Using radio inputs means only one can be selected at a time-->
    <!-- The ID must be unique so the label will point to the input-->
    <input id="rad7" type="radio" name="rad"/>
    <label for="rad7">
      <div>7 panel</div>
    </label>
    <div class="accslide">
      <div class="content">
        <h1>7 panel</h1>
        <p>auasnñam ipsum...</p>
      </div>
    </div>
  </li>

  <li>
    <!-- Using radio inputs means only one can be selected at a time-->
    <!-- The ID must be unique so the label will point to the input-->
    <input id="rad8" type="radio" name="rad"/>
    <label for="rad8">
      <div>8 panel</div>
    </label>
    <div class="accslide">
      <div class="content">
        <h1>8 panel</h1>
        <p>auasnñam ipsum...</p>
      </div>
    </div>
  </li>

  <li>
    <!-- Using radio inputs means only one can be selected at a time-->
    <!-- The ID must be unique so the label will point to the input-->
    <input id="rad9" type="radio" name="rad"/>
    <label for="rad9">
      <div>9 panel</div>
    </label>
    <div class="accslide">
      <div class="content">
        <h1>9 panel</h1>
        <p>auasnñam ipsum...</p>
      </div>
    </div>
  </li>

  <li>
    <!-- Using radio inputs means only one can be selected at a time-->
    <!-- The ID must be unique so the label will point to the input-->
    <input id="rad10" type="radio" name="rad"/>
    <label for="rad10">
      <div>10 panel</div>
    </label>
    <div class="accslide">
      <div class="content">
        <h1>10 panel</h1>
        <p>auasnñam ipsum...</p>
      </div>
    </div>
  </li>

  <li>
    <!-- Using radio inputs means only one can be selected at a time-->
    <!-- The ID must be unique so the label will point to the input-->
    <input id="rad11" type="radio" name="rad"/>
    <label for="rad11">
      <div>11 panel</div>
    </label>
    <div class="accslide">
      <div class="content">
        <h1>11 panel</h1>
        <p>auasnñam ipsum...</p>
      </div>
    </div>
  </li>

  <li>
    <!-- Using radio inputs means only one can be selected at a time-->
    <!-- The ID must be unique so the label will point to the input-->
    <input id="rad12" type="radio" name="rad"/>
    <label for="rad12">
      <div>12 panel</div>
    </label>
    <div class="accslide">
      <div class="content">
        <h1>12 panel</h1>
        <p>auasnñam ipsum...</p>
      </div>
    </div>
  </li>
  
</ul>



</body>