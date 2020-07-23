
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/signin.css">
        <title>Crispies</title>
    </head>
    <body>
    <div class=header>
    <div class="header-left"><a href="#default" ><img src="images/logoo.png"class="logo"></a></div>
    <div class="header-right">
        <a href="#bottom" class=hed>About</a>
        <a href="#sp" class=hed>Specials</a>
        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="button"  >Login</button>
        <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;"  class="button">Signup</button> 
        </div>
        <div class=crisptext>
            <h1 style="font-size:90px"><b>Hungry?!<b></h1>
            <h3 style="font-size:70px">Good, we are here</h3>
            <h3 style="font-size:70px">to <b>serve </b>you!!!</h3>
        </div>
    </div>

    <div id=sp class="spcl">
        <h1>Specials</h1>

        <div class="row">
        <div class="column">
        <img src="images/po2.jpg" alt="Snow" style="width:100%;border-radius:20px;">
        <p>Hyderabadi Chicken Biryani with Raita</p> 
        <p>One cannot think well, love well, sleep well, if one has not dined well</p>
        </div>
        <div class="column">
        <img src="images/po4.jpg" alt="Forest" style="width:100%;border-radius:20px;">
        <p>Shahi Paneer with Tandoori Roti</p>
		<p>I am a better person when I have less on my plate</p>
         </div>
         <div class="column">
         <img src="images/po3.jpg" alt="Mountains" style="width:100%;border-radius:20px;">
         <p>Chicken Biryani with Chicken tikka</p>
      	<p>Pull up a chair. Take a taste. Come join us. Life is so endlessly delicious</p>
        </div>
        </div>

    </div>

    <div id= "bottom" class="about">
        <h1>About Us</h1>
        <div >
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Maecenas volutpat blandit aliquam
         etiam erat velit scelerisque. Pellentesque habitant morbi tristique senectus et netus. Sociis natoque penatibus et magnis. Elementum pulvinar etiam non quam 
         lacus suspendisse faucibus interdum posuere. Nunc consequat interdum varius sit amet mattis vulputate enim. Nisi lacus sed viverra tellus in hac habitasse 
         platea.</p>
         <p>Magna fermentum iaculis eu non diam phasellus vestibulum. Neque egestas congue quisque egestas diam. Venenatis lectus magna fringilla urna porttitor.
              A diam sollicitudin tempor id eu nisl. Mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et. At urna condimentum mattis pellentesque id 
              nibh. Varius morbi enim nunc faucibus a pellentesque.Placerat orci nulla pellentesque dignissim enim sit amet venenatis urna. Odio morbi quis commodo odio aenean.</p>
        </div>
    </div>

    <div class=footer>
        <div ><h1 style="font-size:20px;float:left;margin-left:100px;margin-top:40px;font-family: Muli-VariableFont_wght">DESIGNED BY AKSHAT SHUKLA</h1></div>
        <div ><h1 style="font-size:20px;float:right;margin-right:100px;margin-top:40px;font-family: Muli-VariableFont_wght">PRIVACY POLICY</h1></div>
        <div ><h1 style="font-size:20px;float:right;margin-right:100px;margin-top:40px;font-family: Muli-VariableFont_wght">TERMS OF USE</h1></div>
    </div>

    <div id="id01" class="modal">
        <form class="modal-content animate" action="dbconfig/validation.php" method="post">
        <div class="container">
        <h1>Login</h1>
        <input type="text" placeholder="Email" name="email" required/>
        <input type="password" placeholder="Password" name="psw" required/>  
        <button type="submit" class="lbutton" name="login">Login</button>
        </div>
 
        <div class="container" style="background-color:#f1f1f1">
        <button onclick="funct()" style="width:auto;"  class="Sbutton">Signup</button>
        <span class="psw"><a href="#">Forgot Password?</a></span>
        </div>
        </form>
    </div>

    <div id="id02" class="modal2">
        <form class="modal-content animate" action="dbconfig\registration.php" method="post">
        <div class="container">
        <h1>Signup</h1>
        <input type="text" placeholder="Username" name="uname" required/>
        <input type="text" placeholder="Email" name="email" required/>
        <input type="password" placeholder="Password" name="psw" required/> 
        <input type="password" placeholder="Confirm Password" name="cpsw" required/>
        <button type="submit" class="lbutton" name="ssubmit">Signup</button>
        </div>
    </form>
    </div>
    <script>
          // Get the modal
          var modal = document.getElementById('id01');
          var modal2= document.getElementById('id02');
          function funct(){
            modal.style.display = "none";
            document.getElementById('id02').style.display='block';
          }
          
          // When the user clicks anywhere outside of the modal, close it
          

          window.onclick = function(event) {
          
              if (event.target == modal) {
                  modal.style.display = "none";
      
              }
              if (event.target == modal2) {
                  modal2.style.display = "none";
              }
          }
    </script>
    
    </body>
</html>