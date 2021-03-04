<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/DesignPassword.css">

    <title>Registeration page</title>
    
  </head>
  <?php
  if(isset($_POST['password']) && !isset($_GET['update']) && !isset($_GET['changePass'])){
   
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $nick = $_GET['nick'];
    $pass = $_POST['password'];
    //new 
    $v = '0';

    $length = 50;    
    $key = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
    //new
    $query = "INSERT INTO users (email,password,nickName,phonenumber,verfied,vkey) values('$email','$pass','$nick','$phone','$v','$key')";
    include "../API/db_connection.php";
    $conn = OpenCon();
   $select = mysqli_query($conn, $query) or exit(mysqli_error($conn));
   header("Location: verify.php?send=1&email=$email");
   exit();
  }

  if(isset($_GET['update']) && isset($_POST['password']) && !isset($_GET['changePass'])){
   
    
    if($_GET['update'] === 'true'){
    $email = $_GET['email'];
    $pass = $_POST['password'];

    $query = "UPDATE users SET password = '$pass' WHERE email = '$email' ";
    include "../API/db_connection.php";
    $conn = OpenCon();
   $select = mysqli_query($conn, $query) or exit(mysqli_error($conn));
   header("Location: http://localhost/hw1/web.php");
   exit();
    }
  }

  
  if(!isset($_GET['update']) && isset($_POST['password']) && isset($_GET['changePass'])){
    
    if($_GET['changePass'] === '1'){
    $email = $_GET['email'];
    $pass = $_POST['password'];

    $query = "UPDATE users SET password = '$pass' WHERE email = '$email' ";
    include "../API/db_connection.php";
    $conn = OpenCon();
   $select = mysqli_query($conn, $query) or exit(mysqli_error($conn));
   header("Location: lists.php");
   exit();
    }
  }
    
  ?>

  <body>
 
  
  <div class="image">
      <a href="lists.php">
      <img src="http://localhost/hw1/CSS/logo.png"  alt="LOGO" class="img-fluid" width="150px" height="150px"></a>
    </div>
    <div class="header">
        <a href="#default" class="logo"></a> 
       
        <div class="header-right">
          <a  id="home" href="http://localhost/hw1/PHP/lists.php">Home</a>
          <a  id="register" href="http://localhost/hw1/PHP/registerPage.php">Register</a>
          <a  id="login" href="http://localhost/hw1/Web.php">Login</a>
        </div>
      </div>
      <div id="first" class="bg-light">
      <div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
        <input type="checkbox" id="checkbox" />
        <div class="slider round"></div>
  </label>
  <em style=" color:white;"> Dark Mode!</em>

</div>
      </div> 


      <section class="middle">
        <div id="middiv" class="mid ">
            <div> 
                <h1 id="Registertitle" style="text-align: center; color: darkblue; font-family :font2; ">Create Password</h1>

            <form id="form1" method="POST">
                <br><br><br>

                <div class="form-group">

                  <label for="Password">Password :</label>
                  <input type="password" name="password" class="form-control" id="Password"  style="width: 300px;" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required >
                </div>
                <div class="form-group">
                  <label for="Password2" > Retype Password : </label>
                  <input type="password" class="form-control" style="width: 300px;"  id="Password2" required >
                </div>
                <div class="WrongLabel " id="wrong">
                    <label id="wrongLabel"></label>
                    <label id="wrong2"></label>
                </div>
                <button type="button"   value="Open Window" class="btn btn-primary" onclick="checkPassword()" id="button1" style="width: 100px; position:relative; left:100px;">Register</button>
                <br><br>
                <div id="message"  >
                    <h6>Password must contain the following:</h6>
                    <p id="letter" class="invalid">A lowercase letter</p>
                    <p id="capital" class="invalid">A capital (uppercase) letter</p>
                    <p id="number" class="invalid">A number</p>
                    <p id="length" class="invalid">Minimum 5 characters</p>
                    <br>
                  </div>

              </form>
            </div>
        </div>
      </section>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- class="btn btn-primary" -->
      <script>

    
          $(document).ready(function() {
              if (window.location.href.indexOf("update") > -1) {
                $("#Registertitle").text("Reset Password");
                $("#button1").html("Reset");
              }
              if (window.location.href.indexOf("changePass") > -1) {
                $("#Registertitle").text("Change Password");
                $("#button1").html("Change");
                $("#register").hide();
                $("#login").hide();

              }
            });
       
        var myInput = document.getElementById("Password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");
        var input2 = document.getElementById("Password2");
        
        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
          document.getElementById("message").style.display = "block";
        }
        
        if(input2.onfocus && document.getElementById("message").style.display=="block"){
            document.getElementById("message").style.display = "block";
        }

        if(input2.onblur && myInput.onblur){

            document.getElementById("message").style.display = "none";
        }
        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
          document.getElementById("message").style.display = "none";
        }
        input2.onfocus = function(){
            document.getElementById("message").style.display = "block";
        }
        
        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
          // Validate lowercase letters
          var lowerCaseLetters = /[a-z]/g;
          if(myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
          } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }
        
          // Validate capital letters
          var upperCaseLetters = /[A-Z]/g;
          if(myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
          } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
          }
        
          // Validate numbers
          var numbers = /[0-9]/g;
          if(myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
          } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
          }
        
          // Validate length
          if(myInput.value.length >= 5) {
            length.classList.remove("invalid");
            length.classList.add("valid");
          } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
          }
        }

            function checkPassword(){

                var pass1 = document.getElementById("Password");
                var pass2 = document.getElementById("Password2");
                var label = document.getElementById("wrongLabel");
                var label2 = document.getElementById("wrong2");
                var mess1 = document.getElementById("letter").classList;
                var mess2 = document.getElementById("capital").classList;
                var mess3 = document.getElementById("number").classList;
                var mess4 = document.getElementById("length").classList;

                document.getElementById("Password").style.borderColor = "inherit";
                document.getElementById("Password2").style.borderColor = "inherit";

            if(pass1.value.length == 0 || pass2.value.length == 0){
                label.innerHTML = "Field can not be empty.";
                label2.innerHTML ="";

                if(pass1.value.length == 0)
                document.getElementById("Password").style.borderColor = "red";
                else
                document.getElementById("Password").style.borderColor = "inherit";

                if(pass2.value.length == 0)
                document.getElementById("Password2").style.borderColor = "red";
                else
                document.getElementById("Password2").style.borderColor = "inherit";


            }else if(mess1.value == "invalid" || mess2.value =="invalid" || mess3.value == "invalid" || mess4.value == "invalid"){
                label2.innerHTML = "Please match the requested format";
                label.innerHTML ="";
                document.getElementById("Password").style.borderColor = "red";
                document.getElementById("Password2").style.borderColor = "red";

                // document.getElementById("wrongLabel").style.left="-30px";            
                //     document.getElementById("wrongLabel").style.position ="relative";

            }
            else if(pass1.value == pass2.value){
                label.innerHTML ="";
                label2.innerHTML ="";
                


                let email = "<?php echo $_GET['email'] ?>";
       
               

               

                
               
                document.getElementById("form1").setAttribute("method","post");
                document.getElementById("form1").submit();

                
                
            }else{
                label.innerHTML = "Passwords don't match !";
                document.getElementById("Password").style.borderColor = "red";
                document.getElementById("Password2").style.borderColor = "red";

                label2.innerHTML ="";

            }
        }

        const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

function switchTheme(e) {
if (e.target.checked) {
  trans();
    document.documentElement.setAttribute('data-theme', 'dark');
    localStorage.setItem('theme', 'dark'); //add this

}
else {
  trans();
    document.documentElement.setAttribute('data-theme', 'light');
    localStorage.setItem('theme', 'light'); //add this

}    
}

  toggleSwitch.addEventListener('change', switchTheme, false);

  function trans(){

      document.documentElement.classList.add("transition");
      window.setTimeout(()=> {
        document.documentElement.classList.remove("transition");},1000) ;
      };

      const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

if (currentTheme) {
document.documentElement.setAttribute('data-theme', currentTheme);

if (currentTheme === 'dark') {
    toggleSwitch.checked = true;
}
}



        </script>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <footer id="foot" class="page-footer font-small blue text-white static-bottom">

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">©Copyright:
        Mohamad + Saleh : Web Based 2020
      </div>
      <!-- Copyright -->
    
    </footer>
    <!-- Footer -->
</body>
</html>