
<ol class="breadcrumb w3-card-2">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Profile Edit</li>
            </ol>
<!--grid-->
<div class="w3-panel w3-green w3-round <?php echo $sstatus; ?>">
<h3>Success!</h3>
<p><?php echo $smsg; ?></p>
</div>
 	<div class="validation-system w3-card-2">
 		
 		<div class="validation-form">
 	<!---->
  	    
        <form method="POST">
         	<div class="vali-form">
            <div class="col-md-6 form-group1">
              <label class="control-label">Profile Picture</label>
              <input type="file" name="picture" id="picture">
            </div>
           
            
             <div class="clearfix"> </div>
          
            <div class="col-md-12 form-group">
              <button type="submit" class="w3-input w3-border" name="submit" class="btn btn-primary">Submit</button>
            </div>
          <div class="clearfix"> </div>
        </form>
 	<!---->
 </div>

</div>
</div>
<div class="w3-card-2">