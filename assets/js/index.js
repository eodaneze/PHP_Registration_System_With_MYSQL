function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  let main = document.querySelector('.alert')
  

  function init(){
    setTimeout(() => {
      main.style.opacity= 0;
    },5000)
  }
  init()

  
  