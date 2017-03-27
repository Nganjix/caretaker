   
        </div>
      </div>
      
    </div>
   <div class="footer" class="row container-fluid">
       <div class="col-md-3 ">
    	<p class="text-muted"><br/>Caretaker</p>
        </div>
        <div class="col-md-3"><p class="text-muted"><br/><?php $date = getdate(); echo 'Date: '.$date['mday'].' '.$date['month'].' '.$date['year'];?></p></div>
        <div class="col-md-3"><p class="text-muted"><br/>Notifications</p></div>
        <div class="col-md-3"><p class="text-muted"><br/><?php echo 'Server Address: '.$_SERVER['SERVER_ADDR']; ?></p></div>
    </div> 

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script>window.jQuery || document.write('<script src="bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap/assets/js/vendor/holder.min.js"></script>
    <script src="myjs/purl.js"></script>
    <script type="text/javascript" src="main.js"></script>
    <script src="js/tooltip.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>