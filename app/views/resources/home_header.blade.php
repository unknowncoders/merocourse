<div class = "navbar navbar-default navbar-fixed-top" role ="navigation">
            
            <div class ="container">
              <div class = "navbar-header">
                   <button type = "button" class ="navbar-toggle" data-toggle ="collapse"
                   data-target =".navbar-collapse">
                        
                        <span class ="sr-only"> Toggle navigation </span>
                        <span class ="icon-bar"></span>
                        <span class ="icon-bar"></span>
                        <span class ="icon-bar"></span>

                   </button>

              <h4>     <a class ="navbar-brand sans" href ="#">MERO COURSE</a></h4>
              </div>
         
              <div class ="navbar-collapse collapse">
                     <ul class ="nav navbar-nav navbar-right">
                        
                            <li><a href = "{{URL::to('/')}}"><h5>{{ $auth_user->name}}</h5></a></li>
                            
                               <li class ="dropdown">
                               <a href="#" class ="dropdown-toggle" data-toggle ="dropdown">
                                  <h5><b class ="caret"></b></h5></a>
                               </a>
                          
                           
                            <ul class ="dropdown-menu">
                             
                                 <li>   <a href ="#" data-toggle="modal"class ="sans"><h5>Setting</h5></a>  </li>
                                 <li><a href = "{{URL::to('logout')}}"data-toggle="modal"class ="sans"><h5>Log Out</h5></a></li>
                             
                              </ul>

                          </li>

                     </ul>   
              </div>

            </div>
    </div>


