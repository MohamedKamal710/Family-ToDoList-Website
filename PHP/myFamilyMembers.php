<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/familyMemberStyle.css">

    <title>My Items</title>
    
  </head>
<body>


<?php

  session_start();
  
  ?>

<body class="d-flex flex-column min-vh-100">
<header>
<div class="image">
      <a href="../PHP/lists.php">
      <img src="../CSS/logo.png"  alt="LOGO" class="img-fluid" width="150px" height="150px"></a>
    </div>
    <!-- <div class="header">
        <a href="#default" class="logo"></a> 
        <div class="header-right">
          <a  href="lists.php">Home</a>
          <a  href="familyList.php">Family List</a>
          <a  href="FamilyMgmt.php">Manage Family</a>
          <a  href="lists.php?changepass=1">Change Password</a>
          <a  href="lists.php?logout=yes">Logout</a>
        </div>
      </div> -->

      <div class="topnav" id="myTopnav">
        <a href="#default" class="logo"></a> 
        <div class="header-right">
          <a  href="lists.php">Home</a>
          <div class="dropdown">
    <button class="dropbtn">Family
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
                    <a  href="familyList.php">Family List</a>
                    <a  href="FamilyMgmt.php">Manage Family</a>
                    <a  href="myFamilyMembers.php"> Family Member</a>
</div>
</div>
          <a  href="lists.php?changepass=1">Change Password</a>
          <a  href="myitems.php">My Items</a>
          <a  href="lists.php?logout=yes">Logout</a>
          <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
      </div>

      <div id="first" class="bg-dark">
      <div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
        <input type="checkbox" id="checkbox" />
        <div class="slider round"></div>
    </label>
    <em style=" color:white;"> Dark Mode!</em>

    </div>

      </div> 
</header>
     <content>
      <div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 d-flex justify-content-center text-center rounded-top border-top" id="upper1" style=" margin-top:50px; ">
          <h2 style="margin:10px; margin-bottom:30px;">My Family Members </h2>
           </div></br></br><br>
        <div class="col-md-1"></div>
</div>
        
    <div class="row" style="">    
    <div class="col-md-1"></div>
    <div class="col-md-10 d-flex justify-content-center text-center" id="upper" >
    <div class="form-inline">
          <label for="fam1" style="font-size: large; text-align:center; " ><strong>Select family:</strong></label>
                <select class="form-control" id="fam1" style="position: relative; width: 300px; margin-left:10px; text-align:center; " >
                <option value="0">None</option>
                   
                </select>
        </div>
        </div>
        
        <div class="col-md-1"></div>
      <!--Table-->
      <div class="col-md-1"></div>
        <div id="middiv" class="col-md-10 d-flex justify-content-center text-center rounded-bottom">
         
 <table id="table1" class="table" style="margin-top:10px;">
 <!--Table head-->
   <thead>
                    <tr>
                    <th scope="col" style="text-align:left;">Email</th>
                    <th scope="col" style="text-align:left;">Nickname</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Remove</th>
                    </tr>
   </thead>
   <!--Table head-->
   <!--Table body-->
   <tbody>
   <tr v-for="member in members"><td id='namet' style="text-align:left;">{{member.memberEmail}}</td><td style="text-align:left;">{{member.memberNickname}}</td><td style="text-align:center;">{{member.memberPhonenumber}}</td><td style='text-align: center;'><a href="#" class="btnRemove">Remove</a></td></tr>
           
     </tbody>
   <!--Table body-->
 </table>
 <!--Table-->
</div>
<div class="col-md-1"></div>
</div>
</div>



  
</content>




<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   
<footer id="foot" class="page-footer bg-dark font-small blue text-white static-bottom mt-auto">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">©Copyright:
  Mohamad + Saleh : Web Based 2020
</div>
<!-- Copyright -->

</footer>

<div class="modal" tabindex="-1" role="dialog" id="ModalRemove">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Rename</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p id="modalp">Type A New Name</p>
              <input class="form-control" id="newName" type="text" required="required" placeholder="New Name">
              <label id="wrong"></label>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="rem">Change Name</button>
            </div>
          </div>
        </div>
      </div>


<script>

let allMembers = [];
let manageList = [];

var machine = new Vue({
     el:"#middiv",
     data:{
       members: allMembers
     },
     computed: {
       filterAtoB : function(event) {
         var self=this;
          return self.members.sort((a, b) => { return b.memberEmail - a.memberEmail;});
    }
     },
methods:{
       updateArray: function(event) {
         var self=this;
          self.members = allMembers;  
},
    updateAddition: function(event) {
              var self=this;
               this.itemtobeAdded = "";
  

    }

 }        
   });


   $(document).on('click', '.btnRemove', function(e) {

            let UserEmail = $(this).parents("tr").find("td:first").html();
            selectedFamilyName = $("#fam1 option:selected").text();

            $.ajax({
                url: "http://localhost/hw1/API/deleteMemberRequest.php",
                type: "POST",
                dateType: "JSON",
                data: {
                    email: "<?php echo $_SESSION['user']; ?>",
                    fname: selectedFamilyName,
                    userEmail: UserEmail
                },success: function(){
                    var length = allMembers.length;
                    for(var i = 0 ; i < length ; i++){
                        if(allMembers[i].memberEmail === UserEmail){
                            break;
                        }
                    }
                    allMembers.splice(i,1);
                    machine.updateArray();
                },error: function(){

                }
            })
   });  

   $.ajax({
            url: "http://localhost/hw1/API/myManageList.php",
            type: "POST",
            dataType: "JSON",
            data: {
              email: "<?php echo $_SESSION['user']; ?>"
            },
            success: function(response){
              var lengthArr = response.length;

              for(var i =0;i < lengthArr ; i++){
                var familyName = response[i].fname;
                manageList.push(familyName);
              }
              getManageList();

            },error: function(){

            }
           });


           function getManageList(){
             var list = document.getElementById("fam1");

            if(manageList.length != 0){
              
              for(var i=0;i<manageList.length ; i++){
                var name = manageList[i];
                $('#fam1').append($('<option>', {
                  text: name
                }));

                }
              }
           }


   $('#fam1').on('change', function() {
         allMembers = [];
           manageList = [];
       selectedFamilyName = $("#fam1 option:selected").text();
       if(selectedFamilyName === "None"){
           allMembers = [];
           manageList = [];
           machine.updateArray();
       }else{
       $.ajax({
           url: "http://localhost/hw1/API/getFamilyMembers.php",
           type: "POST",
           dataType: "JSON",
           data: {
               fname: selectedFamilyName
           },
           success: function(response){
             var length = response.length;
             for(var i = 0 ; i < length ; i++){
                 var mEmail = response[i].email;
                 var mPhone = response[i].phone;
                 var mNick = response[i].nickname;

                 var member = {memberEmail: mEmail ,memberPhonenumber: mPhone ,memberNickname: mNick};
                 allMembers.push(member);
             }
             machine.updateArray();
           },error: function(){

           }
       });
       }
   });


   function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
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


</body>
</html>