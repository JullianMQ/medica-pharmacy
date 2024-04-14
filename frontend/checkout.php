<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title> Medica Pharmacy | Contact Us </title>
  <link rel="stylesheet" href="css/contact.css">
	<link rel="stylesheet" href="css/header_footer.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>

  <?php
    include_once('../includes/navbar_inc.php');
  ?>
    
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const menuBtn = document.querySelector(".menu-btn");
      const menu = document.querySelector("#menu");
      const contactSection = document.querySelector(".container");

      menuBtn.addEventListener("click", function () {
        menu.classList.toggle("active");
        menuBtn.classList.toggle("active");
        contactSection.classList.toggle("active");
      });
    });
  </script>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

  

  <script> const inputs = document.querySelectorAll(".input");

    function focusFunc() {
      let parent = this.parentNode;
      parent.classList.add("focus");
    }

    function blurFunc() {
      let parent = this.parentNode;
      if (this.value == "") {
        parent.classList.remove("focus");
      }
    }

    inputs.forEach((input) => {
      input.addEventListener("focus", focusFunc);
      input.addEventListener("blur", blurFunc);
    }); </script>

	<?php 
		include_once('../includes/footer_inc.php')
	?>	

</body>

</html>