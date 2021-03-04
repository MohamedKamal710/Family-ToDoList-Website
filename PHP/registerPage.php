<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../CSS/registerDesign.css">
    <title>Registeration page</title>
    
  </head>

  <body>

 
     
     
     
     

         


            <?php require_once('../API/header.php'); ?>
              <section class="middle">
                <div id="middiv" class="mid ">
            <div> 
                <h1 id="Registertitle" style="text-align: center; color: darkblue; font-family :font2; "><strong>Registeration Page</strong></h1>
            <form id="form1">
                <br><br id="br">
                <label id="success"> You have successfuly registered.<br>
                  You will be redirected to next page in 2 seconds.
                </label>
                <div class="form-group">

                  <label for="exampleInputEmail1">Email :</label>
                  <input type="email" class="form-control" id="exampleInputEmail1"  style="width: 300px;" aria-describedby="emailHelp"  placeholder="email@example.com" required>
                  <i id="icon1" class="fa fa-check-circle"></i>
                  <i id="icon2" class="fa fa-exclamation-circle"></i>
                  <label id="wrong"></label>
                </div>
                <div class="form-group">
                  <label for="nickname" >Nickname : </label>
                  <input type="text" class="form-control" style="width: 300px;"  id="nickname">
                  <label class ="optional"for="nickname" style="color: gray; ">(Optional)</label>
                </div>
                <div class="form-group">
                    <label for="phoneNum">Phone Number : </label>
                    <input type="text" class="form-control" style="width: 300px; "  id="phoneNum">
                    <label class="optional" for="nickname" style="color: gray; display: inline-block;    text-align: right;">(Optional)</label>

                  </div>
                  <br>
                
                <button id="regBut" type="button" class="btn btn-primary"  style="width: 120px; position:relative;margin-left:30%">Register</button>
              </form>
            </div>
        </div>
      </section>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

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
    //  $(document).on('click', '#regBut', function(e) {
      $("#regBut").click(function(e){

          e.preventDefault();
            var email = document.getElementById("exampleInputEmail1").value;
            var label = document.getElementById("wrong");
            label.innerText ="";
            document.getElementById("exampleInputEmail1").style.borderColor = "inherit";
            document.getElementById("icon2").style.visibility="hidden";
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            document.getElementById("exampleInputEmail1").style.borderColor = "inherit";
            if(email.length == 0){
              document.getElementById("exampleInputEmail1").style.borderColor = "red";
              document.getElementById("icon2").style.visibility="visible";
              label.innerText = "Please fill out this field."
            }else if(!emailPattern.test(email)){
              document.getElementById("exampleInputEmail1").style.borderColor = "red";
              document.getElementById("icon2").style.visibility="visible";
              label.innerText = "Please enter a valid email address"
            }
            else{

              var tempEmail = null;

              $.ajax({
            url: 'http://localhost/hw1/API/getUsers.php',
            type: 'POST',
            data: {
                email: email
            },
            dataType: 'JSON',
            success: function(response) {

              if(response.length == 1){
                console.log("Hhh");
                tempEmail = response[0].email;
                var label = document.getElementById("wrong");
                label.innerText ="Email Already Exists";
                label.style.display = "inline";
                document.getElementById("exampleInputEmail1").style.borderColor = "red";
              }
              else {
                
                document.getElementById("icon1").style.visibility="visible";
              document.getElementById("icon1").style.top="12.5cm";
              document.getElementById("exampleInputEmail1").style.borderColor = "rgb(11, 216, 11)";
              var nickname = document.getElementById("nickname").value;
              var phone = null;
              if(document.getElementById("phoneNum").value.length != 0){
                if(document.getElementById("phoneNum").value.match(/^[0-9]+$/) != null){
                  phone = document.getElementById("phoneNum").value;
                  document.getElementById("success").style.display = "inline-block";
                  setTimeout(() => {  window.location.href ="createPassword.php?email=" + email + "&phone=" + phone + "&nick=" + nickname; }, 2000);
                }
                else {
                  label.innerText = "Phone number only digits !"
                }
              }
              else {
                document.getElementById("success").style.display = "inline-block";
                setTimeout(() => {  window.location.href ="createPassword.php?email=" + email + "&phone=&nick=" + nickname; }, 2000);
              }             
              document.getElementById("br").style.display="none";
            }




              

     
                
            }



        });

            }

   
          });

        });

        const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

        function switchTheme(e) {
    if (e.target.checked) {
      trans();
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark'); 

    }
    else {
      trans();
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light'); 

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

    

</html>