<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../CSS/listStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>PETEK - Home</title>
  </head>
  <body>
    
  <div class="image">
      <a href="lists.php">
      <img src="../CSS/logo.png"  alt="LOGO" class="img-fluid" width="150px" height="150px"></a>
    </div>
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




      <?php
session_start();

$cookielie;

// -----------------------Targil 3 ( Homework 3)---------------------------- there is more (line 153)
// $logins = array(
//  "saleh@gmail.com" => 123456,
//  "saleh123@gmail.com" => 123,
// 'demo' => 'demo',
//  );
//  $username = NULL;
// (!isset($_COOKIE['email'])){
//   header("Location: Web.php");
//  exit();
// }
if (isset($_COOKIE['email']))
{

    require_once ('../API/db_connection.php');

    $conn = OpenCon();
    if (isset($_SESSION['user']))
    {
        $user = $_SESSION['user'];
        $value;
        $sql = "SELECT cookie FROM users WHERE email = '$user'";
        $result = $conn->query($sql);
        if ($row = mysqli_fetch_assoc($result))
        {
            $value = $row['cookie'];
        }

        if ($_COOKIE['email'] === $value)
        {
            $cookielie = $value;
        }

        else
        {
            $_SESSION = array();
            setcookie(session_name() , '', time() - 42000, '/');
            unset($_COOKIE['email']);
            setcookie('email', null, time() - 3600);
            session_destroy();
            header("Location: lists.php");
            exit();
        }

    }
}

if (isset($_SESSION['user']))
{
    $username = $_SESSION['user'];
}
if (isset($_GET['login']))
{

    if ($_GET['login'] == 'no')
    {
        $_SESSION = array();
        setcookie(session_name() , '', time() - 42000, '/');
        session_destroy();
        header('Location: http://localhost/HW1/Web.php');
        exit();
    }
}

if (isset($_GET['logout']) && $_GET['logout'] == 'yes')
{

    if (isset($_COOKIE['email']))
    {
        $conn = OpenCon();
        $user = $_SESSION['user'];
        $empty = NULL;
        $cokval = $_COOKIE['email'];
        $sql = "UPDATE users SET cookie = '$empty' WHERE email = '$user'";
        $result = $conn->query($sql);
        unset($_COOKIE['email']);
        setcookie('email',null, time() - 3600,'/');
        $_SESSION = array();
        setcookie(session_name() , '', time() - 42000, '/');
        session_destroy();
        $username = NULL;
        header('Location: http://localhost/HW1/php/lists.php');
        $username = NULL;
        exit();

    }
    else if (!isset($_COOKIE['email']) && isset($_SESSION['user']))
    {

        $_SESSION = array();
        unset($_COOKIE[session_name() ]);
        $_SESSION = array();
        setcookie(session_name() , '', time() - 42000, '/');
        session_destroy();

        $username = NULL;
        $path = dirname( dirname(__FILE__)) + "/Web.php";
        header('Location: http://localhost/HW1/Web.php');
        exit();

    }

}

if ((!isset($_POST) || !isset($_POST['email']) || !isset($_POST['password'])) && !isset($_SESSION['user']) && !isset($_COOKIE['email']))
{

    $_SESSION = array();
    setcookie(session_name() , '', time() - 42000, '/');
    session_destroy();

    header('Location: http://localhost/HW1/Web.php');
    exit();
}
else if (isset($_POST['email']) && isset($_POST['password']) && !isset($_SESSION['user']) && !isset($_COOKIE['email']))
{

    // -----------------------Targil 3 ( Homework 3)----------------------------
    /*   $found = "false";
            foreach($logins as $key => $value){
            if(isset($_POST["email"]) && !isset($_SESSION["user"])){
                if(htmlspecialchars($_POST["email"]) == $key){
                    if($_POST["password"] == $value){
                        $username = htmlspecialchars($_POST["email"]);
                        $found = "true";
                        
                        if(isset($_POST["stay"])){
                            if($_POST["stay"] == "on"){
                                setcookie('email',$username,time() + (10 * 365 * 24 * 60 * 60));
                            }
                        }
                        $_SESSION["user"] = $_POST["email"];
                        break;
                    }
                }
            
            }
        } */


    $email = $_POST['email'];
    $password = $_POST['password'];
    include "../API/db_connection.php";
    $conn = OpenCon();
    $select = mysqli_query($conn, "SELECT 'email','password' FROM `users` WHERE `email` = '$email' AND `password` = '$password'") or exit(mysqli_error($conn));
    if (mysqli_num_rows($select))
    {

        //new
        $conn = OpenCon();
        $select = mysqli_query($conn, "SELECT 'email','verfied' FROM `users` WHERE `email` = '$email' AND `verfied` = '0'") or exit(mysqli_error($conn));
        if (mysqli_num_rows($select))
        {
            header("Location: verify.php?email=$email");
            exit();
        }


        $username = htmlspecialchars($_POST["email"]);
        if (isset($_POST["stay"]))
        {
            if ($_POST["stay"] == "on")
            {
                $randomsecretnumber = rand(10, 100000);
                setcookie('email', ((string)$randomsecretnumber) , time() + (10 * 365 * 24 * 60 * 60), "/");
                $sql = "UPDATE users SET cookie = '$randomsecretnumber' WHERE email = '$email'";
                $result = $conn->query($sql);

            }
        }
        $_SESSION['user'] = $username;
    }
    else
    {
        $_SESSION = array();
        setcookie(session_name() , '', time() - 42000, '/');
        session_destroy();
        header('Location: http://localhost/HW1/Web.php?error=yes');
        exit();

    }
}
    if(isset($_GET['changepass'])){
        if($_GET['changepass'] == '1'){

            header("Location: createPassword.php?email=$username&changePass=1");
            exit(); 

        }
    }


?>

       
      <div class="container-fluid d-flex h-100 flex-column  ">
      <div class="row flex-fill d-flex justify-content-start" id="background">
        <div class="col-2 bg-primary marg1" id="marg"><col-3></div>
        <div class="col-8" id="mid">
          <div id="whiteDiv">            
            <div class="form-inline well" style=" margin-left: 1em;" id="listO">
                <label for="sel1" style="font-size: large;" ><strong>Select list:</strong></label>
                <select class="form-control" id="sel1" style="position: relative; width: 100px; margin-left:10px;" >
                <option value="0">None</option>
                <option v-for="list in lists">{{list.listID}}</option>
                    
                 
                    
                </select>
                <button class="btn btn-primary" id="BtnAddList" style="margin-left:10px;">Add List</button>
                &nbsp&nbsp&nbsp&nbsp
                <input type="checkbox" id="dup" name="vehicle1" value="duplicate">
                &nbsp&nbsp
                <label for="vehicle1"> Duplicate</label><label id="ListAdded"> &nbsp&nbsp <strong>List added !</strong> </label><br>    
                
              </div>
              <form id="form2">
                
                <div class="col-sm-12" id="listItem2"> <div id="list1" class="mt-2" >
                  <!-- <h3 id="listname" style="right: 0.5em; position: absolute; color: rgba(109, 109, 109, 0.89);">List 1</h3> -->
                  <button type="submit"   class="btn btn-success" id="buttonList3" style="width: 200px; position:relative;   ">Add Item</button> </div>
    
                  
                </form>
                  <div class="dodo" style=" border-top: 1px solid rgba(41, 40, 40, 0.253); margin-top: 20px; ">
                    <table class="table" id="table1">
                      <thead id = "T-head" class="thead-light">
                        <tr>
                          <th scope="col">Item name</th>
                          <th scope="col" style="text-align:center;">Quantity</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody id="tbid0">
                      <tr v-for="item in filterAtoBnonB"><td id='namet'>{{item.itemName}}</td><td style="text-align:center;"><input type='number' id='quan' class='quantity1' style='width: 50px; text-align: center;' value='1' ></td><td style='text-align: right;'><a href="#" class="btnBuyNow">Buy now</a>&nbsp|&nbsp
               <a href="#" class="btnRemove">Remove</a></td></tr> 
                      </tbody>
                    </table>
                  </div>
                  <div class="contrainer" id="border" style="border-top: 1px solid rgba(0, 0, 0, 0.233); margin-top: 5cm; text-align: center;">
                    <span style="align-content: center; color: rgba(0, 0, 0, 0.5);">Purchased items</span>
                    <table id="table2" class="table table-hover" style="text-align: left; background-color: rgba(31, 218, 47, 0.308); margin-top: 7px;">
       
                      <tbody id="tbid2">
                      <tr v-for="item in filterAtoB"><td class="nameu">{{item.itemName}} x{{item.quan}}</td><td style='text-align: right;'><a href="#" class="btnUndo">Undo</a></td></tr>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>

            </div>








        <div class="col-2 bg-primary marg" id = "marg"></div>
      </div>
      </div>

      <div class="modal" tabindex="-1" role="dialog" id="ModalAddItem">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Item to List</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"  class='exitButton'>&times;</span>
              </button>
            </div>
            <form id="lolo">
            <div class="modal-body" id="autocomplete">
             
              <label for="itemName">Item Name : </label>
              <input type="text" name="itemName" id="itemNameField"  maxlength='30' style="width: 200px;" required="required" list="suggestion">
              <label for="itemName" id="ErrorLabel"><strong>Item is already in the list</strong></label>
              <datalist id="suggestion">
                <option v-for="item in suggested" :value="item.itemName"></option>
              </datalist>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="BtnAddItem">Add Item</button></form>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
          </div>
        </div>
      </div>


      <div class="modal" tabindex="-1" role="dialog" id="ModalRemove">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Are You Sure ?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class='exitButton'>&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label id="modalp">You Are About To Remove</label>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="rem">Remove</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>








    
      <!-- Footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
  </body>
  <footer id="foot" class="page-footer bg-dark font-small blue text-white static-bottom">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">©Copyright:
      Mohamad + Saleh : Web Based 2020
    </div>
    <!-- Copyright -->
  
  </footer>
          
        
          
          
          
       <script >
       
  





    //{
    //     "ID": 1,
    //     "Name": "Milk",
    //     "Quantity": 1,
    //     "Bought": false

    // }];
    // const itemsInList = [];
    // const  = [];


        var alllists = [];
        let itemsName = [];
        let boughtItems = [];
        let notboughtItems = [];

        var machine1 = new Vue({
            el:"#suggestion",
            data:{
            suggested: itemsName


            },
          
        methods:{
            updateItemArray: function(event) {
                    var self=this;
                    self.suggested = itemsName;
                   
        

            }


        }        
        });

    var machine = new Vue({
            el:"#whiteDiv",
            data:{
            boughtitems: boughtItems,
            notboughtitems: notboughtItems,
            lists : alllists


            },
            computed: {
            filterAtoB : function(event) {
                var self=this;
                return self.boughtitems.sort((a, b) => { return b.itemName - a.itemName;});
            },
            filterAtoBnonB : function(event) {
                var self=this;
                return self.notboughtitems.sort((a, b) => { return b.itemName - a.itemName;});
            }
            },
        methods:{
            updateArray: function(event) {
                var self=this;
                self.boughtitems = boughtItems;
                self.notboughtitems = notboughtItems;
        },
            updateListArray: function(event) {
                    var self=this;
                    self.lists = alllists;
                
        

            }

        }        
        });



    $(document).ready(function() {

        let list = '';
        let itemsInList = [];
        let suggestedItems = [];
        var listnum;


        $.ajax({
            url: 'http://localhost/hw1/API/getListID.php',
            type: 'POST',
            data: {
                email: "<?php echo $_SESSION['user']; ?>"
            },
            dataType: 'JSON',
            success: function(response) {

                var len = response.length;
                listnum = len;
                for (var i = 0; i < len; i++) {

                    var name = {listID:response[i].listID};
                    alllists.push(name);

                }
                machine.updateListArray();
            }



        });


        $.ajax({
            url: '../API/getdisItems.php',
            type: 'POST',
            data: {
                email: "<?php echo $_SESSION['user']; ?>"
            },
            dataType: 'JSON',
            success: function(response) {
                var len = response.length;
                for (var i = 0; i < len; i++) {

                    var name = {itemName:response[i].itemName}
                    console.log(" bata " + name);
                    // list += '<option value="' + name + '"/>';
                    itemsName.push(name);
                    

                }
                machine1.updateItemArray();
            }

        });

        var el = $("#buttonList3");
        el.prop('disabled', 'true');

        var current;

        var win = $(window); //this = window
            if (win.width() >= 720) {
                $("#mid").removeAttr('class', "col-12");
                $("#mid").addClass("col-8");
                $("#marg").show();
            }
            if (win.width() < 720) {

                $("#mid").removeAttr('class', "col-8");
                $("#mid").addClass("col-12");
                $("#marg").hide();


            }

        let toAdd = document.getElementById("suggestion");
        toAdd.innerHTML = list;
        // responive on resize
        $(window).on('resize', function() {
            var win = $(this); //this = window
            if (win.width() >= 720) {
                $("#mid").removeAttr('class', "col-12");
                $("#mid").addClass("col-8");
                $("#marg").show();
            }
            if (win.width() < 720) {

                $("#mid").removeAttr('class', "col-8");
                $("#mid").addClass("col-12");
                $("#marg").hide();


            }
        });

        $('#sel1').on('change', function() {

            itemsInList.splice(0, itemsInList.length)

            var e = $("#sel1 option:selected").text();
            console.log(e);

            if (e === 'None') {
                console.log("is 0");
                var el = $("#buttonList3");
                boughtItems = [];
                notboughtItems = [];
                machine.updateArray();
                el.prop('disabled', true);
            } else {

                boughtItems = [];
                notboughtItems = [];
                machine.updateArray();

                current = $('#sel1').val();
                var el = $("#buttonList3");
                el.prop('disabled', false);

                $.ajax({
                    url: "http://localhost/hw1/API/getItems.php",
                    type: 'POST',
                    data: {
                        email: "<?php echo $_SESSION['user']; ?>",
                        listID: current
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        console.log("lalala");
                        var len = response.length;
                        for (var i = 0; i < len; i++) {
                            var name = response[i].itemName;
                            var state = response[i].states;
                            var quanti = response[i].quan;
                           
                            if (state === "bought") {
                               var item = {itemName:name,quan:quanti};
                                boughtItems.push(item);
                                machine.updateArray();
                                itemsInList.push(name);


                            } else {
                                var item = {itemName:name}
                                notboughtItems.push(item);
                                machine.updateArray();
                                itemsInList.push(name);


                            }


                        }

                    },
                    error: function() {
                    // do action
                }

                });
            }



        });


        $(document).on('click', '.btnUndo', function(e) {

            e.preventDefault();
            let str = $(this).parents("tr").find("td:first").text();
            let name = str.substring(0, str.lastIndexOf(" "));


            $.ajax({
                url: "../API/updateItem.php",
                type: "POST",
                datatype: "json",
                data: {
                    email: "<?php echo $_SESSION['user']; ?>",
                    listID: current,
                    item: name,
                    states: "",
                    quantity : 0
                },
                success: function(response) {

                    for(var i=0;i<boughtItems.length;i++){
                        if(boughtItems[i].itemName === name){
                            break;
                        }
                    }
                    var item = {itemName:boughtItems[i].itemName};
                    notboughtItems.push(item);
                    boughtItems.splice(i,1);
                    machine.updateArray();

                },
                error: function() {
                    // do action
                }
            });


    


        });
        $('#BtnAddList').click(function(e) {
            listnum = parseInt(listnum);
            listnum++;
            console.log(listnum);
            if ($("#dup").prop("checked")) {
                let current = $("#sel1 option:selected").text();
                $.ajax({
                    url: "../API/insertList.php",
                    type: "POST",
                    data: {
                        email: "<?php echo $_SESSION['user']; ?>",
                        listID: listnum
                    },
                    success: function(response) {
                        var newl = {listID:listnum};
                        alllists.push(newl);
                        machine.updateListArray();
                        document.getElementById("ListAdded").style.display = "inline";
                        setTimeout(function () {
                            $("#ListAdded").fadeOut("slow"); },1000);
                    },
                    error: function() {
                        // do action
                    }
                });
                let i = 0;
                for (i = 0; i < itemsInList.length; i++) {

                    $.ajax({
                        url: "../API/addItem.php",
                        type: "POST",
                        datatype: "json",
                        data: {
                            email: "<?php echo $_SESSION['user']; ?>",
                            listID: listnum,
                            item: itemsInList[i]
                        },
                        success: function(response) {
                           
                        },
                        error: function() {
                            // do action
                        }
                    });




                }


            } else {
                $.ajax({
                    url: "../API/insertList.php",
                    type: "POST",
                    data: {
                        email: "<?php echo $_SESSION['user']; ?>",
                        listID: listnum
                    },
                    success: function(response) {
                             var newl = {listID:listnum};
                            alllists.push(newl);
                            machine.updateListArray();  
                            document.getElementById("ListAdded").style.display = "inline";
                            setTimeout(function () {
                            $("#ListAdded").fadeOut("slow"); },1000);  
                    },
                    error: function() {
                        // do action
                    }
                });



            }

        })
        $('#BtnAddItem').click(function(e) {


            let text = $('#itemNameField').val();
            let flag = false;
            if (text.length == 0) {
                $('#BtnAddItem').submit();
            } else {
                $(itemsInList).each(function(index, item) {
                    if (item.toLowerCase() === text.toLowerCase())
                        flag = true;
                });
                if (!flag) {
                    e.preventDefault();



                    $.ajax({
                        url: "../API/addItem.php",
                        type: "POST",
                        datatype: "json",
                        data: {
                            email: "<?php echo $_SESSION['user']; ?>",
                            listID: current,
                            item: text
                        },
                        success: function(response) {

                            var item = {itemName:text};
                            notboughtItems.push(item);

                        },
                        error: function() {
                            // do action
                        }
                    });

                    $("#ModalAddItem").modal('hide');
                    $('#itemNameField').val('');

                    var item = {itemName:text};
                    itemsName.push(item);
                    machine1.updateItemArray();
                    machine.updateArray();

                    let found = 0;
                    for (i = 0; i < itemsInList.length; i++) {
                        if (itemsInList[i] == text) {
                            found = 1;
                            break;
                        }
                    }
                    let found1 = 0;
                    for (i = 0; i < suggestedItems.length; i++) {
                        if (suggestedItems[i] == text) {
                            found1 = 1;
                            break;
                        }
                    }
                    if (found != 1) {
                        itemsInList.push(text);
                    }
                    if (found1 != 1) {
                        suggestedItems.push(text);

                    }

                } else {
                    e.preventDefault();
                    $('#ErrorLabel').show();
                }

            }



        });
        $(document).on('click', '.btnRemove', function(e) {
            let row = $(this).parents("tr");
            let v = row.children(':first').text();
            console.log(v);
            $('#modalp').text("You Are About To Remove " + v + " ?");
            $("#ModalRemove").modal('show');
            let id = $(this).parents("tr").data('id');

            $("#rem").click(function() {
                let i;
                for (i = 0; i < itemsInList.length; i++) {
                    if (itemsInList[i] == v) {
                        break;
                    }
                }
                itemsInList.splice(i, 1);
                
                current = $("#sel1 option:selected").text();

            $.ajax({
                url: "../API/removeItem.php",
                type: "POST",
                data: {
                    email: "<?php echo $_SESSION['user']; ?>",
                    listID: current,
                    itemName: v
                },
                success: function(response) {

                    let i;
                    for (i = 0; i < notboughtItems.length; i++) {
                        if (notboughtItems[i].itemName === v) {
                            break;
                        }
                    }
                    notboughtItems.splice(i, 1);
                    machine.updateArray();

                },
                error: function() {
                    // do action
                }
            });

                $("#ModalRemove").modal('hide');

            });
            

        })

        $(document).on('click', '.btnBuyNow', function(e) {




            let current = $("#sel1 option:selected").text();
            let itemname = $(this).parents("tr").find("td:first").text();
            let quanti = $(this).parents("tr").find("#quan").val();
           
            

            $.ajax({
                url: "../API/updateItem.php",
                type: "POST",
                datatype: "json",
                data: {
                    email: "<?php echo $_SESSION['user']; ?>",
                    listID: current,
                    item: itemname,
                    states: "bought",
                    quantity: quanti
                },
                success: function(response) {

                    for (i = 0; i < notboughtItems.length; i++) {
                        if (notboughtItems[i].itemName === itemname) {
                            break;
                        }
                    }
                    notboughtItems.splice(i,1);
                    var item = {itemName:itemname,quan:quanti};
                    boughtItems.push(item);
                    machine.updateArray();
                    

                },
                error: function() {
                    // do action
                }
            });



        })



        $('#buttonList3').click(function(e) {

            $('#itemNameField').val('');
            $('#ErrorLabel').hide();
            $('#ModalAddItem').modal('show');
            // if($('#itemName').val().length==0){

            //   $('#buttonList3').submit();
            // }
            // else{
            list = '';
           





            e.preventDefault();
        })


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


function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

</script>
        </html>