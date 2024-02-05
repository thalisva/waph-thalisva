var shown=false;
function showhideEmail()
{
  if (shown){
  	document.getElementById('email').InnerHTML = "show my email";
  	shown = false;
  }else{
  var myemail= "<a href='mailto:thalisva" + "@" +
               "mail.uc.edu'>thalisva" + "@" + "mail.uc.edu</a>";
    document.getElementById('email').innerHTML = myemail;
    shown = true;           
  }

}