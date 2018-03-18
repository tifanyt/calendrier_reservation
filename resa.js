
function getJSON(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open('GET', 'bndispo.php', true);
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4) {
      if(xmlhttp.status == 200) {
        var pasdispo = JSON.parse(xmlhttp.responseText);
       
        console.log('AJAXed that stuff!');
        showDispo(pasdispo);
      }
    }
  };
  xmlhttp.send(null);
}


getJSON();






function showDispo(pasdispo){
    var dateoccupee;
   
  for (var i = 0; i < pasdispo.length; i++) {
            console.log(i);
            console.log(pasdispo[i]);
             dateoccupee=pasdispo[i];
            
             let a_changer = document.querySelector('input[data-hour="'+dateoccupee+'"]');
            if(a_changer!=null){
                a_changer.parentElement.style.color = "grey";
          
                 a_changer.disabled=true;
            }
  }
}
