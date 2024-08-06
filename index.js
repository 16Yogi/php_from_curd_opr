function validation(){
    userFname = document.getElementById("fname").value;
    userLname = document.getElementById("lname").value;
    userEmail = document.getElementById("email").value;
    usermobile = document.getElementById("mobile").value;
    userpassword = document.getElementById("password").value;
    userrepassword = document.getElementById("repassword").value;

    if(userFname === "" || userLname === "" || userEmail === "" || usermobile === "" || userpassword === "" || userrepassword === ""){
        alert("All fields are required");
        return false;
    }else if(!textValidation(userFname)){
        alert("First name is invalid");
        return false;
    }else if(!textValidation(userLname)){
        alert("Last name is invalid");
        return false;
    }else if(!mailValidation(userEmail)){
        alert("Email is invalid");
        return false;
    }else if(usermobile.length !==10 || isNaN(usermobile)){
        alert("Mobile number is Invalid");
        return false;
    }else if(userpassword !== userrepassword){
        alert("Password not matched");
        return false;
    }else{
        true;
    }

}

function textValidation(userFname,userLname){
    return /^[a-zA-Z]+$/.test(userFname,userLname);
}
function mailValidation(userEmail){
    return /^[a-zA-z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(userEmail);
}