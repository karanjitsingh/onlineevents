<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.js"></script>
<script>
$(document).ready(function() {
$.getJSON('generate.php', function(data) {
   $.each(data.show, function(i, d){            
  var id=d.SId;
  var color=d.Color;
  if(color==1)
  {
  $("#"+id).css('background','rgb(46,254,46)');
  }
  if(color==0)
  {
  $("#"+id).css('background','rgb(255,0,0)');
  }
  if(color==3)
  {
  $("#"+id).css('background','blue');
  }
  if(color==2)
  {
  $("#"+id).css('background','#795548');
  }
  if(color==4)
  {
  $("#"+id).css('background','orange');
  }
  if(color==5)
  {
  $("#"+id).css('background','purple');
  }
});
});
});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" href="test.css" />
</head>

<body>
<table border="3" width="200" height="100" cellspacing="0">
  <tr>
  <td id="11" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="12" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="13" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="14" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="15" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="16" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  </tr>
  <tr>
  <td id="21" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="22" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="23" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="24" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="25" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="26" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  </tr>
  <tr>
  <td id="31" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="32" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="33" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="34" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="35" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="36" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  </tr>
  <tr>
  <td id="41" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="42" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="43" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="44" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="45" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="46" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  </tr>
  <tr>
  <td id="51" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="52" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="53" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="54" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="55" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="56" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  </tr>
  <tr>
  <td id="61" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="62" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="63" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="64" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="65" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  <td id="66" ondrop="drop(event,id)" ondragover="allowDrop(event)" style="border-radius:6px;" height="30px" width="30px" align="center" valign="center"></td>
  </tr>
  
 </table>
</div>
</body>
</html>
