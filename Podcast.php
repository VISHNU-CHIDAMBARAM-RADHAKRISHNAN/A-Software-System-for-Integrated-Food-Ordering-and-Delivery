<?php include('Back-end/config/constants.php'); ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodies</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="Front-end/css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar" style="background-color:white;">
        <div class="container2">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="Front-end/images/foodies.gif" alt="Restaurant Logo" class="img-responsive" >
                </a>
                
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>" >Home</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo SITEURL; ?>Recipies.php" >Recipies</a>
                    </li>
                    <li>
                    <a href="<?php echo SITEURL; ?>Podcast.php" style="color: orange;" >Podcast</a>
                        </li>
                        <li>
                        <a href="<?php echo SITEURL; ?>Books.php" >Books</a>
                    </li>
                  
                   
                    
                
                    <a href="<?php echo SITEURL; ?>Back-end/Restaurant-food/admin/login-rest.php"><button class="button" 
                        style=" background-color: #182C61; 
                            color: rgb(255, 255, 255); 
                            padding: 12px 24px;
                            border-radius: 5px; margin-left: 20px;">Login</button></a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
    

     <!-- fOOD sEARCH Section Starts Here -->
     <section class="food-search6 text-center">
        <div class="container">
        <form action="<?php echo SITEURL; ?>Recipies-search.php" method="POST">

               
            <a href="#" style="font-size:20px; font-weight:bold; border:5px; padding:8px 16px; background-color: #182C61; color: white; "> Hear Podcast Recipies in Many Languages</a><br><br>
            <span style="font-size:20px; font-weight:bold; color:navy;">Want to add your Podcast  <a href="<?php echo SITEURL; ?>Blog/add-podcast.php" style="font-size:20px; font-weight:bold; color:green;">Click here</a><span><br><br>



            <br>
            <?php

if(isset($_SESSION['update']))
{
echo $_SESSION['update'];//display msg
unset($_SESSION['update']);//remove msg
}
if(isset($_SESSION['audio']))
{
 echo $_SESSION['audio'];//display msg
 unset($_SESSION['audio']);//remove msg
}
if(isset($_SESSION['upload']))
{
echo $_SESSION['upload'];//display msg
unset($_SESSION['upload']);//remove msg
}


?> <br>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <section class="food-type">
        <div class="container">

        <h2 class="text-center" style="color: white;">Popular Podcast Recipies</h2>
        <div class="main" style='font-family: "Oxygen", sans-serif;   color: #050505;'>
  <ul class="cards">


        <?php

           //getting foods from database that are active and featured
           //sql query


           $sql2 ="SELECT * FROM podcast";

           //execute the query
           $res2 = mysqli_query($conn, $sql2);

           //count rows
           $count2 = mysqli_num_rows($res2);

           //check whether the food available or not
           if($count2>0)
           {
                       //Food available
             while($row2=mysqli_fetch_assoc($res2))
             {

                //get all the values
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $posted_by = $row2['posted_by'];
                    $posted_on = $row2['posted_on'];
                    $new_file_name = $row2['new_file_name'];


                     ?>


<li class="cards_item">
      <div class="card">

  

 
        <div class="card_content">
          <h2 class="card_title"><?php echo $title;?></h2>
          <?php

//check whether the image is available or not

if($new_file_name=="")                   
{
 echo "<div class='error'>audio not available   <strong>X</strong></div>";

}else{

 ?>
 <audio controls preload="metadata">
 <source src="<?php echo SITEURL; ?>Front-end/audio/Podcast-<?php echo $new_file_name;?>" type="audio/wav">
</audio><br><br><br>

 <?php


}

?>

          <p style="margin-left:50px; "> <?php echo "<strong>Posted By</strong>:"." "."    ".$posted_by;?></p>
          <p style="margin-left:50px;"><?php echo "<strong>Posted On</strong>:"." "."     ".$posted_on;?></p>

         

          </div>

        </div>
    </li>
      <?php

                }


                }
              else
                 {

         // food not available 
              echo "<div class='error'>Recipie not found   <strong>X</strong></div>";  

             }

            ?>


</ul>
</div>
          
          
        </div>
    </section>

<style>


*,
*::before,
*::after {
  box-sizing: border-box;
}

.main {
  max-width: 1200px;
  margin: 0 auto;
}

.cards {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  padding: 0;
}

.cards_item {
  display: flex;
  padding: 1rem;
}

.card_image {
  position: relative;
  max-height: 250px;
}

.card_image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.card_price {
  position: absolute;
  bottom: 8px;
  right: 8px;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 60px;
  height: 35px;
  border-radius: 0.25rem;
  background-color: #c89b3f;
  font-size: 18px;
  font-weight: 700;
}

.card_price span {
  font-size: 12px;
  margin-top: -2px;
}

.note {
  position: absolute;
  top: 8px;
  left: 8px;
  padding: 4px 8px;
  border-radius: 0.25rem;
  background-color: #c89b3f;
  font-size: 14px;
  font-weight: 700;
}

@media (min-width: 40rem) {
  .cards_item {
    width: 50%;
  }
}

@media (min-width: 56rem) {
  .cards_item {
    width: 33.3333%;
  }
}

.card {
  background-color:#badc58;
  border-radius: 2.5rem;
  box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.card_content {
  position: relative;
  padding: 16px 12px 32px 24px;
  margin: 16px 8px 8px 0;
  max-height: 290px;
  overflow-y: scroll;
}

.card_content::-webkit-scrollbar {
  width: 8px;
}

.card_content::-webkit-scrollbar-track {
  box-shadow: 0;
  border-radius: 0;
}

.card_content::-webkit-scrollbar-thumb {
  background: #c89b3f;
  border-radius: 15px;
}

.card_title {
  position: relative;
  margin: 0 0 24px;
  padding-bottom: 10px;
  text-align: center;
  font-size: 20px;
  font-weight: 700;
}

.card_title::after {
  position: absolute;
  display: block;
  width: 50px;
  height: 2px;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  background-color: #c89b3f;
  content: "";
}

hr {
  margin: 24px auto;
  width: 50px;
  border-top: 2px solid #c89b3f;
}

.card_text p {
  margin: 0 0 24px;
  font-size: 14px;
  line-height: 1.5;
}

.card_text p:last-child {
  margin: 0;
}

audio:hover, audio:focus, audio:active
{
-webkit-box-shadow: 15px 15px 20px rgba(0,0, 0, 0.4);
-moz-box-shadow: 15px 15px 20px rgba(0,0, 0, 0.4);
box-shadow: 15px 15px 20px rgba(0,0, 0, 0.4);
-webkit-transform: scale(1.05);
-moz-transform: scale(1.05);
transform: scale(1.05);
}


audio
{
-webkit-transition:all 0.5s linear;
-moz-transition:all 0.5s linear;
-o-transition:all 0.5s linear;
transition:all 0.5s linear;
-moz-box-shadow: 2px 2px 4px 0px #006773;
-webkit-box-shadow:  2px 2px 4px 0px #006773;
box-shadow: 2px 2px 4px 0px #006773;
-moz-border-radius:7px 7px 7px 7px ;
-webkit-border-radius:7px 7px 7px 7px ;
border-radius:7px 7px 7px 7px ;
}
  </style>