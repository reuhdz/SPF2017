<DOCTYPE! html>
<?php
  $cookie_name ="user";
  $cookie_value = $_POST['user'];  
  require 'dbconnection.php';
  $conn = Connect();
  $user = $conn->real_escape_string($_POST['user']);
  $passwd = $conn->real_escape_string($_POST['passwd']);
  $encrypt = crypt($passwd, 'monkey');
  $query ="select loginid,fname,lname,passwd from employee where loginid='$user'";
  //print "$query <br/>\n";
  $result = $conn->query($query);
  $row_ct=$result->num_rows;

  echo "number of rows: $row_ct <br>\n";

  if ($row_ct==1) {       
    while($row = $result->fetch_assoc()){
      if($row['passwd'] == $encrypt){   
        print "Hello ". $row['fname']. " " . $row['lname']; 
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");         
      }
      else{
        print "Password is wrong";
      }
    }
  }
  else {
    echo "User is not in the system<br>";
  }
  
  $result->close();
  $conn->close(); 
?>
<html>
<head>
  <title>Welcome!</title>
  <link rel="stylesheet" type="text/css" href="nav.css">
  <link rel="stylesheet" type="text/css" href="image.css">
  <script src="nav.js"></script>
  
</head>
<body>
  <br>  
  <div class="container">
    <div class ="dropdown">

      <button class = "dropbtn">File</button>
      <div class = "dropdown-content">
        <button class="popup" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
        <div id="id01" class="modal">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
          <form class="modal-content animate" action="welcome.php" method="post">
            <div class="container-popup">
              <label><b>Email</b></label>
              <input type="text" placeholder= "Enter Email" name="user" required>
              <label><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="passwd" required>
              <p></p>
              <div class="clearfix">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Login</button>
              </div>
            </div>
          </form>
        </div>
    
    

      <a href="logout.php">Log out</a>

      <button class="popup" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign Up</button><br>
      <div id="id02" class="modal">
        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span>
        <form class="modal-content animate" action="complete.php" method="post">
          <div class="container-popup">
            <label><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="loginID" required>
            <label><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="fName" required>
            <label><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="lName" required>
            <label><b>Address</b></label>
            <input type="text" placeholder="Enter Address" name="address" required>
            <label><b>State</b></label>
            <select id="state" name= "state" required>
            <option value="AL">AL</option>  <option value="AK">AK</option>  <option value="AZ">AZ</option>  <option value="AR">AR</option>
            <option value="CA">CA</option>  <option value="CO">CO</option>  <option value="CT">CT</option>  <option value="DC">DC</option>
            <option value="DE">DE</option>  <option value="FL">FL</option>  <option value="GA">GA</option>  <option value="HI">HI</option>
            <option value="ID">ID</option>  <option value="IL">IL</option>  <option value="IN">IN</option>  <option value="IA">IA</option>
            <option value="KS">KS</option>  <option value="KY">KY</option>  <option value="LA">LA</option>  <option value="ME">ME</option>
            <option value="MD">MD</option>  <option value="MA">MA</option>  <option value="MI">MI</option>  <option value="MN">MN</option>
            <option value="MS">MS</option>  <option value="MO">MO</option>  <option value="MT">MT</option>  <option value="NE">NE</option>
            <option value="NV">NV</option>  <option value="NH">NH</option>  <option value="NJ">NJ</option>  <option value="NM">NM</option>
            <option value="NY">NY</option>  <option value="NC">NC</option>  <option value="ND">ND</option>  <option value="OH">OH</option>
            <option value="OK">OK</option>  <option value="OR">OR</option>  <option value="PA">PA</option>  <option value="RI">RI</option>
            <option value="SC">SC</option>  <option value="SD">SD</option>  <option value="TN">TN</option>  <option value="TX">TX</option>
            <option value="UT">UT</option>  <option value="VT">VT</option>  <option value="VA">VA</option>  <option value="WA">WA</option>
            <option value="WV">WV</option>  <option value="WI">WI</option>  <option value="WY">WY</option>
            </select><br>
            <lable><b>City</b></label>
            <input placeholder="Enter City" type="text" name="city" required>
            <label><b>Zipcode</b></label>
            <input placeholder="Enter Zipcode" type="text" name="zip" required>
            <label><b>Telephone</b></label>
            <input type="text" placeholder="Enter Phone Number" name = "tele" required>
            <label><b>Password</b></label>
            <input type="password" name="passwd" required>
            <label><b>Re-type Password</b></label>
            <input type = "password" name="confirm" required>
            <p></p>

            <div class="clearfix">
              <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
              <button type="submit" class="signupbtn">Sign up</button>
            </div>
          </div>
        </form>
      </div>
      <button class="load" onclick="openTab(event, 'Update')">Update Profile</button>
    </div>
    </div>
    
    <div class="dropdown">
      <button class="dropbtn">Edit</button>
      <div class="dropdown-content">
        <button class="load" onclick="openTab(event, 'Add')">Add Client</button><br>
        <button class="load" onclick="openTab(event, 'View')">View Clients</button><br>
        <button class="load" onclick="openTab(event, 'Edit')">Edit Clients</button>
      </div>
    </div>  

    <div class="dropdown">
      <button class="dropbtn">Image</button>
      <div class="dropdown-content">
        <button class="load" onclick="openTab(event, 'Upload')">Upload Image</button><br>
        <button class="load" onclick="openTab(event, 'Library')">Library</button><br>
        <button class="load" onclick="openTab(event, 'Test')">Test</button>
      </div>
    </div>  
    <button class="btn" onclick="openTab(event, 'Options')">Options</button>
    <button class="btn" onclick="openTab(event, 'Help')">Help</button>
  </div>
</div>
  
  <div id = "Update" class="tabcontent">
    <object type="text/html" data="http://yoda.kean.edu/~hernareu/spf_2017/updateprofile.php" width="100%" height="260px" style="overflow: auto; border: 0px"></object>
  </div>
  <div id = "Add" class="tabcontent">
    <object type="text/html" data="http://yoda.kean.edu/~2017spf/Shean/addInformation.html" width="100%" height="360px" style="overflow: auto;border:0px"></object>
  </div>

  <div id = "View" class="tabcontent">
    <object type="text/html" data="http://yoda.kean.edu/~2017spf/Shean/viewInformation.php" width="100%" height="400px" style="overflow: auto; border:0px"></object>
  </div>

  <div id="Edit" class="tabcontent">
    <object type="text/html" data="http://yoda.kean.edu/~2017spf/Shean/displayInformation.php" width="100%" height="350px" style="overflow: auto; border:0px"></object>
  </div>

  <div id = "Upload" class="tabcontent">
    <object type="text/html" data="http://yoda.kean.edu/~2017spf/Shean/uploadImage.html" width="100%" height="510px" style="overflow: auto;border:0px"></object>   
  </div>

  <div id="Library" class="tabcontent">
    <object type="text/html" data="http://yoda.kean.edu/~2017spf/Shean/displayImage.php" width="100%" height="600px" style="overflow: auto; border: 0px"></object>
  </div>
  
  <div id="Test" class="tabcontent">
    <h3>Image Processing</h3>
    <object type="text/html" data="http://yoda.kean.edu/~hernareu/spf_2017/imageProcessing.html" width="100%" height="580px" style="overflow: auto; border:0px"></object>
  </div>

  <div id = "Options" class="tabcontent">
    <h3>Options</h3>
  </div>

  <div id ="Help" class="tabcontent">
    <h3>Help</h3>
  </div>
</body>
</html>