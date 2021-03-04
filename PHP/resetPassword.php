<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/resetPasswordDesign.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Reset Password</title>
    
  </head>
  <!-- <script>
          function regsuccess(){
          var email1 = "<?php echo $_GET['email']; ?>";
          var nick1 = "<?php echo $_GET['nick']; ?>";
          var phone1 = "<?php echo $_GET['phone']; ?>";
          document.getElementById("success").style.display = "inline-block";
          setTimeout(() => {  window.location.href ="createPassword.php?email=" + email1 + "&phone=" + phone1 + "&nick=" + nick1; }, 2000);

          
        }
  </script> -->
  <body>



            <?php require_once('../API/header.php'); ?>
              <section class="middle">
                <div id="middiv" class="mid ">
            <div> 
                <h1 id="Registertitle" style="text-align: center; color: darkblue; font-family :font2; "><strong>Reset Password</strong></h1>
            <form id="form1"><br>
                <br><br id="br">
                <div class="form-group">
                <p id="parag" >Forgot your password ? Please enter your email.<br>You will receive a link to create a new Password via email.</p>
                
                <p id="sentLink"></p>
                  <label id="sentLink" for="exampleInputEmail1">Email :</label>
                  <input type="email" class="form-control" id="exampleInputEmail1"  style="width: 300px;" aria-describedby="emailHelp"  placeholder="email@example.com" required>
                  <i id="icon1" class="fa fa-check-circle"></i>
                  <i id="icon2" class="fa fa-exclamation-circle"></i>
                  <label id="wrong"></label>
                </div>
                  
                
                <button id="regBut" type="button" class="btn btn-primary"  style="width: 100px; position:relative; left:10em; ">Reset</button>
              </form>
            </div>
        </div>
      </section>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



      <footer id="foot" class="page-footer font-small blue text-white static-bottom">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
          Mohamad + Saleh : Web Based 2020
        </div>
        <!-- Copyright -->

      </footer>
      <!-- Footer -->

</body>


<script>  

        $(document).ready(function(){
     $(document).on('click', '#regBut', function(e) {
            var email1 = document.getElementById("exampleInputEmail1").value;
            var label = document.getElementById("wrong");
            label.innerText ="";
            document.getElementById("exampleInputEmail1").style.borderColor = "inherit";
            document.getElementById("icon2").style.visibility="hidden";
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            document.getElementById("exampleInputEmail1").style.borderColor = "inherit";
            if(email1.length == 0){
              document.getElementById("exampleInputEmail1").style.borderColor = "red";
              document.getElementById("icon2").style.visibility="visible";
              label.innerText = "Please fill out this field."
            }else if(!emailPattern.test(email1)){
              
              document.getElementById("exampleInputEmail1").style.borderColor = "red";
              document.getElementById("icon2").style.visibility="visible";
              label.innerText = "Please enter a valid email address";
            }else{
              let name12 = null;
              $.ajax({
                url: "../API/getUsers.php",
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            email: email1
                        },
                        success: function(response) {
                          if(response.length!=0){
                             name12 = response[0].email;
                            emailFound(name12);
                          }else{
                            emailNotFound();
                          }
                        },
                        error: function() {
                            // do action
                        }
              });
              
             
                            // if(document.getElementById("phoneNum").value.length != 0){
              //   if(document.getElementById("phoneNum").value.match(/^[0-9]+$/) != null){
              //     phone = document.getElementById("phoneNum").value;
              //     window.location.href="registerPage.php?email=" + email + "&phone=" + phone + "&nick=" + nickname;
              //   }
              //   else {
              //     label.innerText = "Phone number only digits !"
              //   }
              }
                      
              // document.getElementById("br").style.display="none";
            
          });

          function emailFound(receiver){
                document.getElementById("icon1").style.visibility="visible";
              document.getElementById("icon1").style.top="12.5cm";
              document.getElementById("exampleInputEmail1").style.borderColor = "rgb(11, 216, 11)";
              document.getElementById("sentLink").style.visibility="visible";
              document.getElementById("exampleInputEmail1").style.visibility="hidden";
              document.getElementById("regBut").style.visibility='hidden';
              document.getElementById("sentLink").innerHTML = "<br><br> A link has been sent to your email in order to reset your password !";
              // }else{
              // 
              // }
              var linkTo = "http://localhost/hw1/PHP/createPassword.php?email=" + receiver +"&update=true";
              $.ajax({
                url: "../API/sendEmail.php",
                type: "POST",
                dataType: "JSON",
                data: {
                  sentTo: receiver ,
                  link: linkTo
                },
                success: function(response) {
                         console.log("SDsds");
                        },
                        error: function() {
                          console.log("tatat");                          
                        }
              });
              $("body").css("overflow", "hidden");
          }

          function emailNotFound(){
            var label = document.getElementById("wrong");

            document.getElementById("exampleInputEmail1").style.borderColor = "red";
              document.getElementById("icon2").style.visibility="visible";
              label.innerText = "email doesn't exist !";
          }
              
          
        });

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
<?php 
     
     include "../API/db_connection.php";
      $conn = OpenCon();
     if(isset($_GET['email'])){
     $email = $_GET['email'];
     $select = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email` = '$email'") or exit(mysqli_error($conn));
      if(mysqli_num_rows($select)) {
        echo $email;
        //erro
      }
      else { ?>
      <script>
        regsuccess();
      </script>
         <?php }
     }
    ?>
    

</html>