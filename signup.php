<DOCTYPE! html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="nice.css"/>
</head>
<body	bgcolor="#29363f">
	<div class="signup">
	<form action = "complete.php" method = "post" >
	<h3>Register</h3><br><br>
	Email: 
	 <input class="field" type = "text" name = "loginID" placeholder= "user@example.com" required/><br/><br>
	First Name: 
	<input class="field" type = "text" name = "fName" placeholder="John" required/><br/><br>
	Last Name: 
	<input class="field" placeholder= "Doe" type = "text" name = "lName" required/><br/><br>
	Address: 
	<input class="field" placeholder= "1000 Morris Ave" type = "text" name = "address" required/><br><br>
	State: 
	<input class="field" placeholder= "NJ" list= "state" name = "state">
	<datalist id="state">
                <option value="AL">	
		<option value="AK">
                <option value="AZ">
                <option value="AR">
                <option value="CA">
                <option value="CO">
                <option value="CT">
                <option value="DC">
                <option value="DE">
                <option value="FL">
                <option value="GA">
                <option value="HI">
                <option value="ID">
                <option value="IL">
                <option value="IN">
                <option value="IA">
                <option value="KS">
                <option value="KY">
                <option value="LA">
                <option value="ME">
                <option value="MD">
                <option value="MA">
                <option value="MI">
                <option value="MN">
                <option value="MS">
                <option value="MO">
                <option value="MT">
                <option value="NE">
                <option value="NV">
                <option value="NH">
                <option value="NJ">
                <option value="NM">
                <option value="NY">
                <option value="NC">
                <option value="ND">
                <option value="OH">
                <option value="OK">
                <option value="OR">
                <option value="PA">
                <option value="RI">
                <option value="SC">
                <option value="SD">
                <option value="TN">
                <option value="TX">
                <option value="UT">
                <option value="VT">
                <option value="VA">
                <option value="WA">
                <option value="WV">
                <option value="WI">
                <option value="WY">
	</datalist><br><br>
	
	City: 
	<input class="field" placeholder= "Union" type = "text" name="city" required><br><br>
	Zipcode: 
	<input class="field" placeholder= "07033" type = "text" name="zip" required><br><br>
	Telephone: 	
	<input class="field" placeholder= "8002563415" type = "text" name = "tele" required><br><br>
	Password: 
	<input class="field" type = "password" name = "passwd" required/><br/><br>
	Re-type Password: 
	<input class="field"  type = "password" name = "confirm" required/><br/><br/>
	<input class = "btn" type = "submit" value = "Sign-up">
	
	</form>
	</div>
        </script>

</body>
</html>
