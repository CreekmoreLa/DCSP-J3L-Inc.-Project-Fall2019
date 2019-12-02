function processForm()
{

  var email = document.getElementById('email').value;
  var ismail = "no";
  if (email === ""){
    document.getElementById('emailErr').innerHTML = "Invalid email";
    ismail = "no";
  }
  if (email != "" &&  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) != true){
    document.getElementById('emailErr').innerHTML = "Invalid email";
    ismail = "no";

  }
  if (email != "" &&  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) == true){
    document.getElementById('emailErr').innerHTML = "";
    ismail = "yes";
  }
    var word = document.getElementById('password').value;
    var isword = "no";
    if (word == ""){
      document.getElementById('wordErr').innerHTML = "Incorrect password";
      isword = "no";
    }
    if (name != "" &&  /^[A-Za-z ]+$/.test(name) != true){
      document.getElementById('wordErr').innerHTML = "Your name must consist of letters and white space";
      isname = "no";
    }
    if (name != ""){
      document.getElementById('wordErr').innerHTML = "";
      isname = "yes";
    }
  }
