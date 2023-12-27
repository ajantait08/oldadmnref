<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
 
    .user_card {
        height: 250px;
        width: 250px;
        margin-top: 12px;
        margin-bottom: auto;
        background: #007497;
        position: relative;
        display: flex;
        justify-content: center;
        flex-direction: column;
        padding: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 5px;

    }

    .brand_logo_container {
        position: absolute;
        height: 123px;
        width: 118px;
        top: -26px;
        border-radius: 50%;
        background: #ffffff;
        padding: 10px;
        text-align: center;
    }

    .brand_logo {
        height: 106px;
        width: 93px;
        border-radius: 50%;
        border: 2px solid #ffffff;
    }

    .form_container {
        margin-top: 100px;
    }

    .login_btn {
        width: 100%;
        background: #c0392b !important;
        color: white !important;
    }

    .login_btn:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .login_container {
        padding: 0 2rem;
    }

    .input-group-text {
        background: #c0392b !important;
        color: white !important;
        border: 0 !important;
        border-radius: 0.25rem 0 0 0.25rem !important;
    }

    .input_user,
    .input_pass:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
        background-color: #c0392b !important;
    }

    /* notice css  start*/
    .palel-primary {
        border-color: #007497;
    }

    .panel-primary>.panel-heading {

        text-align: center;
        background: #007497;
        font-size: 18px;

    }

    .panel-primary>.panel-body {
        
        background-color: #EDEDED;
        /* flex-wrap: wrap; */
    }

    /* notice css end*/
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
    /* new card css */
._body{
    margin-top: 0px;
    display:flex;
    margin-left: 30px;
    justify-content:center;
    align-items: center;
     min-height: 60vh; 
    background: #EDEDED;
    flex-wrap: wrap;
}
._card{
   
    position: relative;
    width: 350px;
    height: 180px;
    margin: 30px;
    background: #EDEDED;
    
    transition: 0.5s;
    
}
._card:hover{
   
height: 350px;
}
._card .lines{
    position:absolute;
    inset:6px;
    background: #000;
    overflow: hidden;
}
._card .lines::before{
    content:'';
    position:absolute;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
    width:600px;
    height: 120px;
    background: linear-gradient(transparent,#43F7CE,#43F7CE,#43F7CE,transparent);
    animation: animate 4s linear infinite;

}
@keyframes animate{
    0%{
        transform: translate(-50%,-50%) rotate(0deg);
    }
    100%{
        transform: translate(-50%,-50%) rotate(360deg);
    }
}

._card .lines::after{
    content:'';
    position:absolute;
    inset:3px;  
  background:#292929;
}
._card .imgBx
{display:flex;
    position: absolute;
    top: -50px;
    left:50%;
    transform: translateX(-50%);
    width: 100px;
    height: 100px;
    background: #000;
    transition: 0.5s;
    z-index: 10px;
    overflow: hidden;
}
._card :hover .imgBx{
    width:250px;
    height: 250px;

}
._card .imgBx::before{
    content: '';
    position: absolute;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
    width:500px;
    height: 150px;
    background: linear-gradient(transparent,#C875F5,#C875F5,#C875F5,transparent);
    animation: animate2 6s linear infinite;

}
@keyframes animate2
{
    0%{
        transform: translate(-50%,-50%) rotate(360deg);
    }
    100%{
        transform: translate(-50%,-50%) rotate(0deg);
    }
}

._card .imgBx::after{
    content:'';
    position: absolute;
    inset: 3px;
    background: #292929;

}
._card .imgBx img{
    position: absolute;
    top: 4px;
    left: 4px;
    right:4px ;
    bottom:4px ;
    
    z-index: 1;
    width:calc(100%-10px);
    height:calc(100%-10px);
    filter: grayscale(1);
}
._card .content
{
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

._card .content .details
{
    position: relative;
    padding: 30px;
    text-align: center;
    width: 100%;
    transition: 0.5s;
    transform: translateY(47px);

}
._card:hover .content .details{
    transform: translateY(20px);
}
._card .content .details h3
{
    font-size: 1.35em;
    font-weight: 700;
    color:antiquewhite;
    line-height: 1.2em;
}

._card .content .details h3 span
{
    /* font-size: 1em; */
    font-weight: 450;
    color:antiquewhite;
    /* line-height: 1.2em; */
}
._head{
    
    flex-wrap: wrap;
    font-size: 30px;
    text-align: center;
    font-family: "Times New Roman", Times, serif;


 }

/* #h1{
    display: flex;
    text-align: center;
} */
/* 
#h2{
    margin-top: 0px;
} */



    
</style>
<div class="row">
    <!--row start  -->
    <div class="col-sm-2">
        <!--row col-md-4 start  -->
        <div class="notice">
            <!--notice start  -->
            <div class="row">
                <div class="col-md-12">
                    <!--start  -->

                    <!--end  -->
                </div>
            </div>
        </div>
        <!--notice end -->
    </div>
    <!--row col-md-4 end  -->
    <div class="col-sm-8">
        <!--row col-md-8 start  -->
        <div class="home">
            <!--home start  -->
            <div class="row">
                <!--home row start  -->
                <div class="col-md-12">
                    <!--home col-md-12 start  -->
                    <!--start  -->
                    <div class="panel panel-primary news_back">
                        <div class="panel-heading">Jee Advance Admission
                        </div>
                        <div class="panel-body">
                            <div class="page_content">
                                <div id='h1'>
                                    <div class="_head" > Contact Details</div>
                                    <hr>
                                </div>
                                <div id='h2'>
                                    <div class="_body">
                                        <div class="_card">
                                            <div class="lines"></div>
                                            <div class="imgBx">
                                                <img src="https://people.iitism.ac.in/~download/images/employee/976/emp_976_20151118063536.jpg" width="92" height="92">
                                            </div>
                                            <div class="content">
                                                <div class="details">
                                                    <h3>Prof. Pramod Kumar Kewat<br>
                                                    Chairman<br>
                                                    <span>
                                                        JEE (Advanced)<br>
                                                        chair.jeea@iitism.ac.in<br>
                                                        Phone: +91-326-223-5292
                                                    </span>
                                                    </h3>

                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="_card">
                                            <div class="lines"></div>
                                            <div class="imgBx">
                                                <img src="https://people.iitism.ac.in/~download/images/employee/1066/photo1066_2022-04-16_10:42:21.jpg" width="92" height="92">
                                            </div>
                                            <div class="content">
                                                <div class="details">
                                                    <h3>Prof. Umakanta Tripathy<br>
                                                    Vice Chairman<br>
                                                    <span>
                                                        JEE (Advanced)<br>
                                                        vc_jeea@iitism.ac.in<br>
                                                        Phone: +91-326-223-5298
                                                    </span>
                                                </h3>

                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div>

                                
                            </div>
                
                       
                        
     

                        </div> <!-- panel body end  -->
                    </div> <!-- panel end  -->
                    <!--end  -->
                </div>
                <!--home col-md-12 end  -->
            </div>
            <!--home row end  -->
        </div>
        <!--home end  -->
    </div>
    <!--row col-md-8 end  -->
    <div class="col-sm-2">
        <!--row col-md-4 start  -->
        <div class="notice">
            <!--notice start  -->
            <div class="row">
                <div class="col-md-12">
                    <!--start  -->

                    <!--end  -->
                </div>
            </div>
        </div>
        <!--notice end -->
    </div>
    <!--row col-md-4 end  -->
</div>
<!--row start  
<script type="text/javascript" src="<?php echo base_url(); ?>themes/dist/js/phd/adm_phd_education.js"></script> -->