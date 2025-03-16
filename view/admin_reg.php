<!DOCTYPE html>
<html>
<head>
    <title>E-Pharmacy admin reg
    </title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.ico">
</head>

<body>
  <h1> E-Pharmacy </h1>
  <hr>
  <h2> Admin Registration </h2>

    <form action="action.php" method="post">
        <table>
  <h4> Personal Informations  </h4>
    <tr>
        <td>Full Name: </td><td> <input type="text" name="Full Name "></td>
        <tr>
             <td>Date of birth: </td> <td><input type="date" id="birthday" name="birthday"></td>
        <tr>
        <td>Select a gender: </td> 
        <td>
            <input type="radio" id="gender1" name="gender" value="male">Male
            <input type="radio" id="gender2" name="gender" value="female">Female
            <input type="radio" id="gender3" name="gender" value="Other">Other
            </td>
           
         <tr>
         <td> Phone Number: </td><td> <input type="tel" id="phone" name="phone" placeholder="+880-1* **** **** " > </td>

         <tr>
            <td>Address: </td> <td><input type="text" id="address" name="address"></td>
         <tr>  
        <td>Email Address: </td><td><input type="email" name="email"></td>
        
    <tr>
        <td> Upload Your Image: </td><td> <input type="file" name="images" >
    </td></tr>
    <tr> <td><h4> Education  </h4></td>

    <tr>
        <td>Degree: </td><td> <input type="text" name="degree "></td>
     <tr>
        <td>Institute: </td><td> <input type="text" name="institute "></td>
    <tr>
        <td>Passing year: </td><td> <input type="text" name="year "></td>  
    <tr>
        <td><h5>Skills</h5></td>
        <td><input type="checkbox" id="check1" name="check1" value="Inventory Management">Inventory
        <input type="checkbox" id="check2" name="check2" value="Customer Service">Customer Support
        <input type="checkbox" id="check3" name="check3" value="Regulatory Compliance">Compliance
        <input type="checkbox" id="check4" name="check4" value="E-Commerce.">E-Com </td>

    <tr>

     </tr>
        <td> <input type="reset" name="reset" value="Reset" >
     <input type="submit" name="submit" value="Submit" ></td>
     <tr>
     <td><a href="http://localhost/springwt/view/home.php">Go to home page </a></td>
    </tr>
   </table>
  </form>
 </body>
</html>
