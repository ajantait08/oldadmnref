 </div> <!-- Content Of page end col-9 -->
  </div><!-- Content Of row end -->

<footer class="conatiner-fluid">
  <div class="row">
    <div class="col-md-12">
      <center> <span class="bottom_link" style=""><b>Copyright © IIT(ISM) Dhanbad</b></span></center>
     
    </div>  
  </div>
</footer>
</div><!-- end conatiner -->
<script type="text/javascript" src="<?php echo base_url();?>assets/nfr/js/jasny-bootstrap.min.js"></script>
<script type="text/javascript">
  function preview_pic2()
  {
    
    var file=document.getElementById('file_dob').files[0];
    if(!file)
    // document.getElementById('q').src = base_url()+"assets/images/png.jpg";
    // alert("hello");
    else
    {
      oFReader = new FileReader();
          oFReader.onload = function(oFREvent)
      {
        var dataURI = oFREvent.target.result;
        document.getElementById('qqq').innerHTML = dataURI;
      };
      oFReader.readAsDataURL(file);
    }
  }

  function clearFileInput(b){

    
    var oldInput = document.getElementById(b);
    var newInput = document.createElement("input");
    newInput.type = "file";
    newInput.id = oldInput.id;
    newInput.name = oldInput.name;
    newInput.className = oldInput.className;
    newInput.style.cssText = oldInput.style.cssText;
    // copy any other relevant attributes
    oldInput.parentNode.replaceChild(newInput, oldInput);
  }

  function tab_show(id)
  {
    var sec=id.split('_');       
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");                        
  }

  <?php 
  if($this->session->flashdata('msg')) 
  {
      $message = $this->session->flashdata('msg');
  ?>
      var x='<?= $message["success"] ?>';
      tab_show(x);
  <?php 
  }   
  ?>
  // $('#tab1').click(function(){
    
  // })
  $('#statuslink').click(function(){
    alert("hello");
    
  })
  // $('#tab2').click(function(){
  //   alert("first complete your basic details");
    
  // })
  // $('#tab3').click(function(){
  //   alert("first complete your educational and qualifaction details");
    
  // })
  // $('#tab4').click(function(){
  //   alert("complete your basic information educational and qualifaction details first");
    
  // })
  // $('#tab1').find('a').removeAttr('data-toggle');
  // $('#tab2').find('a').removeAttr('data-toggle');
  // $('#tab3').find('a').removeAttr('data-toggle');
  // $('#tab4').find('a').removeAttr('data-toggle');
 
</script>

</body>
</html>