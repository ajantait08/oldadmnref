<style>
img{
  height:150px;
  width:100%;
}

.item{
  padding-left:5px;
  padding-right:5px;
}
.item-card{
  transition:0.5s;
  cursor:pointer;
}
.item-card-title{  
  font-size:15px;
  transition:1s;
  cursor:pointer;
}
.item-card-title i{  
  font-size:15px;
  transition:1s;
  cursor:pointer;
  color:#ffa710
}
.card-title i:hover{
  transform: scale(1.25) rotate(100deg); 
  color:#18d4ca;
  
}
.card:hover{
  transform: scale(1.05);
  box-shadow: 10px 10px 15px rgba(0,0,0,0.3);
}
.card-text{
  height:80px;  
}

.card::before, .card::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  transform: scale3d(0, 0, 1);
  transition: transform .3s ease-out 0s;
  background: rgba(255, 255, 255, 0.1);
  content: '';
  pointer-events: none;
}
.card::before {
  transform-origin: left top;
}
.card::after {
  transform-origin: right bottom;
}
.card:hover::before, .card:hover::after, .card:focus::before, .card:focus::after {
  transform: scale3d(1, 1, 1);
}

</style>

<div>
  <div class="row">
        <div class="col-md-3 col-sm-3 item">
            <div class="card item-card card-block">
                <h4 class="card-title text-right"><i class="material-icons">settings</i></h4>
                    <img src="https://www.iitism.ac.in/assets/img/logo.png" alt="Photo of sunset">
                <h5 class="item-card-title mt-3 mb-3">Total Candidate</h5>
                <p class="card-text">Report of MBA admission</p> 
            </div>
        </div>
        <div class="col-md-3 col-sm-3 item">
            <div class="card item-card card-block">
                <h4 class="item-card-title text-right"><i class="material-icons">settings</i></h4>
                <img src="https://www.iitism.ac.in/assets/img/logo.png" alt="Photo of sunset">
                <h5 class="card-title  mt-3 mb-3">Total Candidate</h5>
                <p class="card-text">This is a company that builds websites, web .</p> 
            </div>
        </div>
        <div class="col-md-3 col-sm-3 item">
            <div class="card item-card card-block">
                <h4 class="item-card-title text-right"><i class="material-icons">settings</i></h4>
                <img src="https://www.iitism.ac.in/assets/img/logo.png" alt="Photo of sunset">
                <h5 class="card-title  mt-3 mb-3">Total Candidate</h5>
                <p class="card-text">Report of MBA admission</p> 
           </div>
        </div>
        <div class="col-md-3 col-sm-3 item">
            <div class="card item-card card-block">
                <h4 class="item-card-title text-right"><i class="material-icons">settings</i></h4>
                <img src="https://www.iitism.ac.in/assets/img/logo.png" alt="Photo of sunset">
                <h5 class="card-title  mt-3 mb-3">Total Candidate</h5>
                <p class="card-text">Report of MBA admission</p> 
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3 item">
            <div class="card item-card card-block">
                <h4 class="card-title text-right"><i class="material-icons">settings</i></h4>
                    <img src="https://www.iitism.ac.in/assets/img/logo.png" alt="Photo of sunset">
                <h5 class="item-card-title mt-3 mb-3">Total Candidate</h5>
                <p class="card-text">Report of MBA admission</p> 
            </div>
        </div>
        <div class="col-md-3 col-sm-3 item">
            <div class="card item-card card-block">
                <h4 class="item-card-title text-right"><i class="material-icons">settings</i></h4>
                <img src="https://www.iitism.ac.in/assets/img/logo.png" alt="Photo of sunset">
                <h5 class="card-title  mt-3 mb-3">Total Candidate</h5>
                <p class="card-text">This is a company that builds websites, web .</p> 
            </div>
        </div>
        <div class="col-md-3 col-sm-3 item">
            <div class="card item-card card-block">
                <h4 class="item-card-title text-right"><i class="material-icons">settings</i></h4>
                <img src="https://www.iitism.ac.in/assets/img/logo.png" alt="Photo of sunset">
                <h5 class="card-title  mt-3 mb-3">Total Candidate</h5>
                <p class="card-text">Report of MBA admission</p> 
           </div>
        </div>
        <div class="col-md-3 col-sm-3 item">
            <div class="card item-card card-block">
                <h4 class="item-card-title text-right"><i class="material-icons">settings</i></h4>
                <img src="https://www.iitism.ac.in/assets/img/logo.png" alt="Photo of sunset">
                <h5 class="card-title  mt-3 mb-3">Total Candidate</h5>
                <p class="card-text">Report of MBA admission</p> 
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3 item">
            <div class="card item-card card-block">
                <h4 class="card-title text-right"><i class="material-icons">settings</i></h4>
                    <img src="https://www.iitism.ac.in/assets/img/logo.png" alt="Photo of sunset">
                <h5 class="item-card-title mt-3 mb-3">Total Candidate</h5>
                <p class="card-text">Report of MBA admission</p> 
            </div>
        </div>
        <div class="col-md-3 col-sm-3 item">
            <div class="card item-card card-block">
                <h4 class="item-card-title text-right"><i class="material-icons">settings</i></h4>
                <img src="https://www.iitism.ac.in/assets/img/logo.png" alt="Photo of sunset">
                <h5 class="card-title  mt-3 mb-3">Total Candidate</h5>
                <p class="card-text">Report of MBA admission</p> 
            </div>
        </div>
        <div class="col-md-3 col-sm-3 item">
            <div class="card item-card card-block">
                <h4 class="item-card-title text-right"><i class="material-icons">settings</i></h4>
                <img src="https://www.iitism.ac.in/assets/img/logo.png" alt="Photo of sunset">
                <h5 class="card-title  mt-3 mb-3">Total Candidate</h5>
                <p class="card-text">Report of MBA admission</p> 
           </div>
        </div>
        <div class="col-md-3 col-sm-3 item">
            <div class="card item-card card-block">
                <h4 class="item-card-title text-right"><i class="material-icons">settings</i></h4>
                <img src="https://www.iitism.ac.in/assets/img/logo.png" alt="Photo of sunset">
                <h5 class="card-title  mt-3 mb-3">Total Candidate</h5>
                <p class="card-text">Report of MBA admission</p> 
            </div>
        </div>    
    </div>
</div>