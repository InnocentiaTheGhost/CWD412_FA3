const login_form=document.getElementById("login_form");
const user=document.getElementById("user");
const pass=document.getElementById("pass");
 
login_form.addEventListener('submit', (e) =>{ e.preventDefault();
 
    const username= user.value.trim();
    const password = pass.value.trim();
   
 
   if ( username ==='' || password==='' ){
    alert("please fill all the fields")
   }
   else{
    alert(" Login success")
     window.location.href="main page.html";
   }
 
 
});