        function validateForm(){
            let nameMail = document.getElementById("name");
            let pwd = document.getElementById("pass");
            if(nameMail.value === "" || pwd.value === ""){
                alert("The field cannot be blank");
                return false;
            }
            else{
                return true;
            }
        }