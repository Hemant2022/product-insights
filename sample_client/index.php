<?php
  if( isset($_POST['ProductID']) && isset($_POST['UserID']) && isset($_POST['Rating']) && isset($_POST['Review']) ) {
	 $content = $_POST['UserID'] . "|" . $_POST['Rating'] . "|" . $_POST['Review'] ."\n";
     file_put_contents( $_POST['ProductID'] . ".txt", $content, FILE_APPEND | LOCK_EX);	
	 die("Review Posted");
  }
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Product Page</title>
		<script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <div class="bodyWrap">    
    <div class="productStage">
        <div class="folderTab clearFix">
    <div class="breadCrumbs">
      <a href="#">Home</a> > 
      <a href="#">Category</a> > 
      <a href="#">Manufacturer</a> > 
      <a href="#">Product Group</a>
    </div></div>
  <div class="botBorder clearFix">
      <div class="productImage">
        <img src="http://placehold.it/300x300">
          <ul class="imageList">
            <li><a href="#"><img src="http://placehold.it/92x92"></a></li>
            <li><a href="#"><img src="http://placehold.it/92x92"></a></li>
            <li><a href="#"><img src="http://placehold.it/92x92"></a></li>
          </ul>
              <span><a href="#"><b>View More</b></a></span>
      </div>
      <div class="overview">
        <h1>ProductID: <?php echo $_GET['productID'] ?></h1>
        <h2>2401 - Maroon</h2>
        <span class="rating">
          <img src="http://www.jimmybeanswool.com/secure-html/onlineec/images/stars/4_5StarBlue09.gif">
        </span>
        <h3>$10.00</h4>
        <span>50+ available</span>
        <span class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquam elementum est, at vestibulum augue consequat at. Donec euismod convallis felis. Nam sed molestie dolor. Proin in tortor sed augue consequat viverra.</span>

          <select class="prodSelect">
            <option selected>Current Product</option>
            <option>Product Option 2</option>
            <option>Product Option 3</option>
            <option>Product Option 4</option>
            <option>Product Option 5</option>
          </select>

        <div class="button add">Add to Cart</div>
        <div class="button wish">Add to Wishlist</div>
                   
      </div>
        
     <div class="info">
          <h3>Product Information</h3>
          <ul class="specs">
            <li><h5>Weight:</h5> Worsted</li>
            <li><h5>Gauge (sts. / inch):</h5> 4.5</li>
            <li><h5>US Needle:</h5> 8</li>
            <li><h5>Yardage:</h5> 220</li>
            <li><h5>Primary Fiber:</h5> 100% Wool</li>
            <li><h5>Specific Fiber:</h5> 100% Pure New Wool</li>
            <li><h5>Physical Weight:</h5> 100g</li>
            <li><h5>Washing Instructions:</h5> Hand Wash</li>
          </ul>
        
        <div class="description">
          The classic Cascade 220 Wool is the perfect combination of affordability, quality and versatility that can be used for a wide range of projects. Each hank of this worsted weight 100% pure wool comes with a generous 220 yards. With a nearly unlimited color palette to chose from, you are sure to find the perfect color(s) for your next project! Note: this yarn is great for felting projects too!
        </div> 
       </div> 
        
     
	 
     <div class="info">
        <h3>Post Review</h3>  
		<form>
		  <fieldset class="sign">
			<legend>Sign</legend>
			<label for="name">UserID:</label>
			<input type="text" id="UserID" placeholder="Type your Id"> <br/>
			<br/>
			<label for="mail">Rating: </label>
			<input type="text" id="Rating" placeholder="Type your Rating">
		  </fieldset>
		  <br/>
		  <fieldset class="comment">
			<legend>Review</legend>
			<textarea name="comment" id="Review" placeholder="Type your comment here..." rows="5" cols="90"></textarea>
		  </fieldset>  
		  <input type="submit" id="butSubmit" class="button" value="Submit">
		  </form>
	 </div>

	<div class="info">
        <h3>Product Reviews</h3> 
		<?php
		 $file = fopen( $_GET['productID'] . ".txt", "r");
		    $count = 1;
			while($file && !feof($file)){
				$line = fgets($file);
				if( strlen($line) < 2 ) continue;	
				list($userID,$rating,$review) = explode( "|", $line, 3 );
				echo '
				<div class="review">
				<span class="title">ReviewID: '.$count.'</span>      
				  <span class="comments">'.$review.'</span>
				<span class="author">By UserID: '.$userID.'</span>
				 <div class="vote">
				   Was this review helpful?
				   <input type="submit" onclick="Upvote('.$count.')" value="Yes">
				   <input type="submit" onclick="Downvote('.$count.')"  value="No">
				  </div>
				</div>';
				$count++;
		 }
		 
          ?>     
		</div>
        <div class="button bd submit right">Read More Reviews</div>
        <div class="button submit blueSubmit left">Write a Review</div> 
           </div>                       
        </div>  
     </div>
    </div> 
      
    <div class="sidebar slim">
      <div class="folderTab sub clearFix">
        <h3>Similar Items</h3>
      </div>
      <div class="botBorder">
        <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
          <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
        <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
        <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
      </div>
          
      <div class="folderTab sub clearFix">
        <h3>Related Kits</h3>
      </div>
      <div class="botBorder">
        <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
          <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
        <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
        <div class="product vtop slim">
            <a href="#">
               <div class="smallBox"><img src="http://placehold.it/92x92"></div>
               <span class="manuName">Product Group</span>
               <span class="prodName">Product Name</span>
            </a>
        </div>
      </div>    
          
    </div>
  </div>

  <script>
    var authT = "32574A405023B09FFF6EE98D65727AFC";
    $("#butSubmit").on('click', function(e) {
      e.preventDefault();
      $.post("http://localhost:29611/Reviews/ReviewPost", {
        userID: $("#UserID").val(),
        reviewID: <?php echo $count ?>,
        productID: <?php echo $_GET['productID'] ?>,
        upvotes: 1,
        downvotes: 0,
        reviewerText: $("#Review").val(),
        rating: $("#Rating").val(),
        AuthToken: authT
      },
            function(data) {
        alert(data);
        $.post("index.php", {
          ProductID: <?php echo $_GET['productID'] ?>,
          UserID: $("#UserID").val(),
          Rating: $("#Rating").val(),
          Review: $("#Review").val()
        }, function(data) {
          alert(data);
          window.location.reload();
        });
      });
    });

    function Upvote(id) {
      $.post("http://localhost:29611/Reviews/UpvotesDownvotes", {
        reviewID: id,
        productID: <?php echo $_GET['productID'] ?>,
        upvotes: 1,
        downvotes: 0,
        AuthToken: authT
      }, function(data) {
        alert(data);
      });
    }

    function Downvote(id) {
      $.post("http://localhost:29611/Reviews/UpvotesDownvotes", {
        reviewID: id,
        productID: <?php echo $_GET['productID'] ?>,
        upvotes: 0,
        downvotes: 1,
        AuthToken: authT
      }, function(data) {
        alert(data);
      });
    }
  </script>
  </body>
</html>
