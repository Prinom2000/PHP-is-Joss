<!DOCTYPE html>
<html>

<head>
    <style>
        .error {
            color: #FF0001;
        }
    </style>
</head>

<body>

    <?php
    // define variables to empty values  
    $nameErr = $emailErr = $mobilenoErr = $genderErr = $websiteErr = $agreeErr = "";
    $name = $email = $mobileno = $gender = $website = $agree = "";

    //Input fields validation  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //String Validation  
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = input_data($_POST["name"]);
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only alphabets and white space are allowed";
            }
        }
        // $pattern = "/^[0-9]{4}-+[1-3]{1}-+60-+[0-9]{3}+@std\.ewubd\.edu$/";

        //Email Validation   
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = input_data($_POST["email"]);
          
            $pattern = "/^[0-9]{4}+-+[1-3]{1}+-+60+-+[0-9]{3}+@std\.ewubd\.edu$/";

            if (!preg_match($pattern, $email)) {
                $emailErr = "Invalid email format";
            }
        }

        //Number Validation  
        if (empty($_POST["mobileno"])) {
            $mobilenoErr = "Mobile no is required";

        }else{
            $mobileno = trim(input_data($_POST["mobileno"]));
            $mobile_len = strlen($mobileno);

       

            if($mobile_len == 11){

                $pattern = '/01[356789]\d{8}/';
                if(!preg_match($pattern, $mobileno)){
                    $mobilenoErr ="Invalid mobile number";
         
                } 

            }else if($mobile_len == 14){

                $pattern = '/\+8801[356789]\d{8}/';

                if(!preg_match($pattern, $mobileno)){
                    $mobilenoErr ="Invalid mobile number";           
                }

            }else{
                $mobilenoErr ="Mobile no must contain  at least 11 digits.";
            }
        }

        //URL Validation      
        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website = input_data($_POST["website"]);
            // check if URL address syntax is valid  
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                $websiteErr = "Invalid URL";
            }
        }

        //Empty Field Validation  
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = input_data($_POST["gender"]);
        }

        //Checkbox Validation  
        if (!isset($_POST['agree'])) {
            $agreeErr = "Accept terms of services before submit.";
        } else {
            $agree = input_data($_POST["agree"]);
        }
    }
    function input_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Registration Form</h2>
    <span class="error">* required field </span>
    <br><br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name:
        <input type="text" name="name">
        <span class="error">* <?php echo $nameErr; ?> </span>
        <br><br>
        E-mail:
        <input type="text" name="email">
        <span class="error">* <?php echo $emailErr; ?> </span>
        <br><br>
        Mobile No:
        <input type="text" name="mobileno">
        <span class="error">* <?php echo $mobilenoErr; ?> </span>
        <br><br>
        Website:
        <input type="text" name="website">
        <span class="error"><?php echo $websiteErr; ?> </span>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        <input type="radio" name="gender" value="other"> Other
        <span class="error">* <?php echo $genderErr; ?> </span>
        <br><br>
        Agree to Terms of Service:
        <input type="checkbox" name="agree">
        <span class="error">* <?php echo $agreeErr; ?> </span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
        <br><br>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        if ($nameErr == "" && $emailErr == "" && $mobilenoErr == "" && $genderErr == "" && $websiteErr == "" && $agreeErr == "") {
            echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";
            echo "<h2>Your Input:</h2>";
            echo "Name: " . $name;
            echo "<br>";
            echo "Email: " . $email;
            echo "<br>";
            echo "Mobile No: " . $mobileno;
            echo "<br>";
            echo "Website: " . $website;
            echo "<br>";
            echo "Gender: " . $gender;
        } else {
            echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";
        }
    }
    ?>

</body>

</html>