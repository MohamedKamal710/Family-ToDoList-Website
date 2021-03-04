<?php 
      
      function OpenCon()
          {
         
            $dbhost = "localhost";
            $dbuser = "root";
            $db = "petek";
            $conn = new mysqli($dbhost,$dbuser,"") or die("Connect failed: %s\n". $conn -> error);
              if(!mysqli_select_db($conn,$db)){
                $sql = "CREATE DATABASE  $db";
              // if(mysqli_query($conn, $user)){
                if($conn->query($sql)==TRUE){
              } else{
                  echo "ERROR: Could not able to execute $db. " . mysqli_error($conn);
              }
            }
  
          
            $conn = new mysqli($dbhost,$dbuser,"",$db) or die("Connect failed: %s\n". $conn -> error);
            $sql = "SELECT email FROM users";
            if(!$conn->query($sql)){
              $user = "CREATE TABLE users(
                email VARCHAR(50) PRIMARY KEY,
                password VARCHAR(16) NOT NULL,
                nickName VARCHAR (20),
                phonenumber VARCHAR(9),
                cookie int,
                verfied CHAR,
                vkey VARCHAR(50)
                )";
                if($conn->query($user)===TRUE){
    
                }else{
                  echo "Error creating Table ". $conn->error;
                }
                if(mysqli_query($conn, $sql)){
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
            }
          
        $sql = "SELECT listID FROM lists";
        if(!$conn->query($sql)){
          $list = "CREATE TABLE IF NOT EXISTS lists (
            email VARCHAR(50) NOT NULL,
            listID VARCHAR(16) NOT NULL,
            PRIMARY KEY(email,listID)
            )";
            if($conn->query($list)===TRUE){
    
            }else{
              echo "Error creating Table ". $conn->error;
            }
            if(mysqli_query($conn, $list)){
            } else{
                echo "ERROR: Could not able to execute $list. " . mysqli_error($conn);
            }
        }
            $sql = "SELECT itemName FROM items";
            if(!$conn->query($sql)){
            $item =  "CREATE TABLE IF NOT EXISTS items (
                email VARCHAR(50) NOT NULL,
                listID VARCHAR(16) NOT NULL,
                itemName VARCHAR(30) NOT NULL,
                quantity int,
                states VARCHAR(12) NOT NULL,
                PRIMARY KEY(email,listID,itemName)
                
                )";
                if($conn->query($item)===TRUE){
    
                }else{
                  echo "Error creating Table ". $conn->error;
                }
                if(mysqli_query($conn, $item)){
                } else{
                    echo "ERROR: Could not able to execute $item. " . mysqli_error($conn);
                }
            }

            $sql = "SELECT familyName FROM family";
            if(!$conn->query($sql)){
            $item =  "CREATE TABLE IF NOT EXISTS family (
                familyName VARCHAR(30) NOT NULL,
                managerEmail VARCHAR(50) NOT NULL,
                PRIMARY KEY(familyName, managerEmail)

                )";
                if($conn->query($item)===TRUE){

                }else{
                  echo "Error creating Table ". $conn->error;
                }
                if(mysqli_query($conn, $item)){
                } else{
                    echo "ERROR: Could not able to execute $item. " . mysqli_error($conn);
                }
            }


            $sql = "SELECT familyName FROM itemsInFamilyList";
        if(!$conn->query($sql)){
          $list = "CREATE TABLE IF NOT EXISTS itemsInFamilyList (
            familyName VARCHAR(30) NOT NULL,
            itemName VARCHAR(30) NOT NULL,
            quantity int,
            states VARCHAR(12) NOT NULL,
            PRIMARY KEY(familyName,itemName)
             )";
            if($conn->query($list)===TRUE){
    
            }else{
              echo "Error creating Table ". $conn->error;
            }
            if(mysqli_query($conn, $list)){
            } else{
                echo "ERROR: Could not able to execute $list. " . mysqli_error($conn);
            }
        }


            $sql = "SELECT userEmail FROM memberIn";
            if(!$conn->query($sql)){
            $item =  "CREATE TABLE IF NOT EXISTS memberIn (
                userEmail VARCHAR(50) NOT NULL,
                familyName VARCHAR(30) NOT NULL,
                managerEmail VARCHAR(50) NOT NULL,
                ApproveStatus CHAR NOT NULL,
                PRIMARY KEY(userEmail, familyName,managerEmail)

                )";
                if($conn->query($item)===TRUE){

                }else{
                  echo "Error creating Table ". $conn->error;
                }
                if(mysqli_query($conn, $item)){
                } else{
                    echo "ERROR: Could not able to execute $item. " . mysqli_error($conn);
                }
            }

            $sql = "SELECT checker FROM loaded";
            if(!$conn->query($sql)){
            $item =  "CREATE TABLE IF NOT EXISTS loaded (
                checker int
                )";
                if($conn->query($item)===TRUE){

                }else{
                  echo "Error creating Table ". $conn->error;
                }
                if(mysqli_query($conn, $item)){
                } else{
                    echo "ERROR: Could not able to execute $item. " . mysqli_error($conn);
                }
            }
      
        
            return $conn;
          }
          
          function CloseCon($conn)
          {
          $conn -> close();
          }
   
        ?>