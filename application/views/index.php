<link rel="stylesheet" href="/public/stylesheets/portal.css">



<!-- START: FROM STYLISH-PROTFOLIO WEBSITE TEMPLATE -->

 <header id="top" class="header">
     <div class="text-vertical-center">
         <div class="container-fluid">
            <div class="col-xs-12 col-md-7 text-right" id="abstract">
               <h1>Natural Language Tools</h1>
               <h3>College of Computer and Information Sciences - DCS</h3>
               <h4>Polytechnic University of the Philippines NLP Group</h4>
               <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
               quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
               consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
               cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
               proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </h5>
            </div>
            <div class="col-xs-12 col-md-5 text-center">
               <h5>
                   <aside class="call-to-action">
                       <div class="container-fluid">
                           <div class="row">
                               <div class="col-md-12 text-center">
                                 <?php 
                                  if($this->session->userdata('id')){
                                    echo '<h3> Hello '.$this->session->userdata('username');
                                    if($this->session->validity == 1)
                                      echo '<br/><a href="'.base_url('home').'" class="btn btn-lg btn-light">Enter Here</a>';
                                    else{
                                      echo "<br/> Sorry but you're still not validated. ";  
                                    }
                                  }
                                  else{
                                    echo '<h3>Join Us / Already a Member?</h3>
                                   <a href="register" class="btn btn-lg btn-light">Register Here</a>
                                   <a href="login" class="btn btn-lg btn-dark">Login</a>';
                                  }
                                 ?>
                               </div>
                           </div>
                       </div>
                   </aside>
               </h5>
            </div>
         </div>
     </div>
 </header>

<!-- END: FROM STYLISH-PROTFOLIO WEBSITE TEMPLATE -->
