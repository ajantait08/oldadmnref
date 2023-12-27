<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto');
    body {
        margin: 0;
        padding: 0;
    }

    .palel-primary {
        border-color: #5161ce;
    }

    .panel-primary>.panel-heading {
        text-align: center;
        background: #5161ce;

    }

    .panel-primary>.panel-body {
        background-color: #EDEDED;
    }

    marquee {
        font-size: 15px;
        font-weight: 300;
        color: #ff5200;
        font-family: sans-serif;
    }

    .news_back {
        border-radius: 5px;
        border: solid 1px #ccc;
        box-shadow: 1px 2px 5px rgba(0, 0, 0, .31);
        background: #ebebeb;
    }

    ol {
        margin-left:1rem;
        width:90%;
    }

    li {
        margin:1rem;
        text-align:left;
    }

    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
        margin: 50px auto;
    }
    table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
    }

    table td {
        background: #EDEDED;
    }

    table th, td {
        padding: .625rem;
        font-size: 1.15rem;
        letter-spacing: .0625rem;
        border: 1px solid #ccc;
        text-align: center;
    }

    table th {
        text-transform: uppercase;
        background: #5161ce;
        color: white;
        font-weight: bold;
        text-align: center;
    }

    .panel-primary{
        background-color: #337ab7 !important;
    }

    @media screen and (max-width: 1370px) {
        table {
            border: 0;
        }

        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        table tr {
            display: block;
            margin-bottom: .625em;
        }

        table td {
            display: block;
            font-size: .8em;
            text-align: right;
        }

        table td::before {
            content: attr(data-label) ;
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }
    }

    .blink {
        animation: blinker 0.6s linear infinite;
        color: #1c87c9;
        font-size: 14px;
        font-weight: bold;
        font-family: sans-serif;
      }
      @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
      .blink-one {
        animation: blinker-one 1s linear infinite;
        color: #1c87c9;
        font-size: 14px;
        font-weight: bold;
        font-family: sans-serif;
      }
      @keyframes blinker-one {
        0% {
          opacity: 0;
        }
      }
      .blink-two {
        animation: blinker-two 1.4s linear infinite;
      }
      @keyframes blinker-two {
        100% {
          opacity: 0;
        }
      }
</style>
<?php
if(!($this->session->has_userdata('login_type'))) {
redirect('admission/phd/Adm_phd_registration/logout');
} ?>
<div class="row">
    <div class="col-sm-2 col-md-2 col-lg-2">
        <div class="notice">
            <div class="row">
               <div class="col-md-12">
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <button type="button" class="btn btn-info" id="backbutton">Back To Home</button>
                        </div>
                    </div>
                </div>
             </div>
        </div>
        <!--<div class="info">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Activity
                        </div>
                        <div class="panel-body">
                        <?php /* if($count_ml > 0) { */ ?>
                        <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <!-- <button class="btn btn-info" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/Adm_mtech_application_preview/"><b style="text-decoration: none; color: white;">My Application Status</b></a> </button> -->
                                    <!-- <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/Adm_mtech_application_preview/admission_offer_letter'" value="Offer Letter"/>
                                </div>
                            </div> -->
                            <?php /* } */?>

                            <!-- <div class="row" style="margin-top:5px;">
                                <div class="col-md-12 col-sm-12 col-lg-12"> -->
                                    <!-- <button class="btn btn-info" style="width:100%;"><a href="<?php echo base_url() ?>index.php/admission/Adm_mtech_application_preview/"><b style="text-decoration: none; color: white;">My Application Status</b></a> </button> -->
                                    <!--<input class="btn btn-danger" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/Adm_registration/logout'" value="Logout"/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>

    <div class="col-sm-8 col-md-8 col-lg-8">
        <div class="home">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">INTERVIEW CALL LETTER
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                <span style="font-weight:bold;"> Registration No. : <?php echo $application[0]->registration_no; ?></span><br><br>
                                <?php $candidate_name = '';
                        if(!empty($application[0]->first_name)){
                         $candidate_name .= $application[0]->first_name.' ';
                        } else { $candidate_name .= '';  }
                        if(!empty($application[0]->middle_name)){
                         $candidate_name .= $application[0]->middle_name.' ';
                         } else { $candidate_name .= '';  }
                         if(!empty($application[0]->last_name)){
                         $candidate_name .= $application[0]->last_name.' ';
                         } else { $candidate_name .= '';  }

                          ?>
                                <span style="font-weight:bold;"> Name : <?php if(!empty($candidate_name)){ echo $candidate_name;} ?></span><br><br>
                                <span style="font-weight:bold;"> Email : <?php echo $application[0]->email; ?></span><br>
                                </div>

                                <div class="col-md-12">
                                <p style="font-weight:bold;color:red;">Note : You can download the interview call letter for each program as per notified.</p>
                        </div>
                            </div>

                            <section>
                                <div class="row">
                                <input type="hidden" name="reg_no" id="reg_no" value="<?php echo $application[0]->registration_no; ?>">
                                <?php

                                    foreach($program as $program){

                                    if ($program->admin_decision == 'CI') {

                                    ?>

                                    <div class="col-md-4">
                                <div class="radio">
                                <label><span style="font-weight:bold;"><?php echo $program->program_id; ?>&nbsp;(<?php echo $program->program_desc; ?>)</span></label>
                                <input type="hidden" name="program_desc" value="<?php echo $program->program_desc; ?>">
                            </div>
                                <br>
                                  <?php $url = base_url().'assets/admission/phd/InterviewcallLetter/' . $application[0]->registration_no . '/InterviewcallLetter' . $application[0]->registration_no .$program->program_id. '.pdf'; ?>

                                  <?php if(strlen($program->program_desc) > 25){?>
                                <iframe src="<?php echo $url; ?>" name="iframe_a" height="300px" style="margin-top:10px;" width="100%" title="Iframe mtech" checked=checked></iframe>
                                <?php }else { ?>
                                    <iframe src="<?php echo $url; ?>" name="iframe_a" height="300px" style="margin-top:30px;" width="100%" title="Iframe mtech" checked=checked></iframe>
                                    <?php } ?>
                                <br>
                                <a href="<?php echo base_url() ?>index.php/admission/phd/Adm_phd_application_preview/application_download_phd_ci/<?php echo $program->program_id;?>/<?php echo $program->program_desc; ?>" class="btn btn-primary" style="margin-top:5px;border-radius:4px;">
                                Download Interview Call Letter for <?php echo $program->program_id; ?></a>
                                </div>

                            <?php }} ?>

                                </div>
                            </section>



                            <!-- payment ends from here -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-sm-2">
        <div class="notice">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Applicant home
                        </div>
                        <div class="panel-body">
                          <input class="btn btn-info" style="width:100%;" type="button" onclick="location.href='<?php echo base_url() ?>'+'index.php/admission/Adm_mtech_applicant_home'" value="Back applicant home" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>

<script>

</script>

<script>
    $("#backbutton").click(function(){
    window.location.href="<?php echo base_url().'index.php/admission/phd/Adm_phd_application_preview'; ?>";
});
</script>
<script>
$("#optradio_mtech").click(function(){
var offervalue = $(this).val();
var reg_no = $('#reg_no').val();
$.ajax({
  type: "POST",
  url: "<?php echo base_url().'index.php/admission/Adm_mtech_application_preview/get_selected_data'; ?>",
  data: {offervalue:offervalue,reg_no:reg_no},
  cache: false,
  dataType: "json",
  success: function(data){
     //alert(data);
     if (parseInt(data) === 2) {

        $("#payment_closed").css("display","block");
        $("#proceed_for_payment").css("display","none");

     }
     else{
        $("#proceed_for_payment").css("display","block");
        $("#payment_closed").css("display","none");
     }

    //  var stringfydata = JSON.stringify(data);
    //  var parsedata = JSON.parse(stringfydata);
    //  console.log(parsedata.pay_open);

  }
});

});
</script>
<script>
$("#optradio_ba").click(function(){

var offervalue = $(this).val();
var reg_no = $('#reg_no').val();
$.ajax({
  type: "POST",
  url: "<?php echo base_url().'index.php/admission/Adm_mtech_application_preview/get_selected_data'; ?>",
  data: {offervalue:offervalue,reg_no:reg_no},
  cache: false,
  dataType: "json",
  success: function(data){
     //alert(data);
     if (parseInt(data) === 2) {

        $("#payment_closed").css("display","block");
        $("#proceed_for_payment").css("display","none");

     }
     else{
        $("#proceed_for_payment").css("display","block");
        $("#payment_closed").css("display","none");
     }

    //  var stringfydata = JSON.stringify(data);
    //  var parsedata = JSON.parse(stringfydata);
    //  console.log(parsedata.pay_open);

  }
});

});
</script>
