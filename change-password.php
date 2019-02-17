<?php
require "header.php";
 if(!empty($_POST)){
    print_r($_POST);
    }
?>
    <div class="well" ><h1>Change password:</h1></div>
   <form  method='POST'>
    <input type='password' name='new-password' placeholder='New password:' class= 'form-group'> <br>
    <input type='password' name='new-password-repeat' placeholder='New password again:' class= 'form-group'> <br> 
    <button type='submit' name ='change-password-submit' value= 'submit' class='btn btn-primary'>Напред</button>
    </form>
    
<?php
require "footer.php";
?>