
<div class="moi-configurations" >
    <div class="moi-center">
            <h1> Command Center </h1><br/><br/>
    </div>
    <div class="moi-row">
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner1"></span>
        </div>
    </div>
   

        <div class="moi-config-block">

                

            <div class="moi-config-content moi-center">
                <div class="moi-center">
                    <h2 class=""><?php echo __( 'Dashboard Settings', 'membersone-integration' ); ?></h2>
                </div>
                <div class="container">

                    <form action="" method="post">
                        
                       
                            
                        
                      <br/><br/><br/>

                        <div class="row">
                            <div class="col-25"> 
                                
                            

                            <a href="<?php menu_page_url('command-center-reload') ?>" class="custom-btn ">Reload Configration</a>
                            </div>
                            <div class="col-50">
                            <a href="#" class="custom-btn ">Other Configration</a>
                            </div>
                            <div class="col-25">
                            <a href="#" class="custom-btn ">Sample Configration</a>
                            </div>
                        </div>

                        <br/><br/><br/>


                       


                          
                        
                    </form>
                </div>
            </div>
        </div>

          
       
    </div>
</div>

<script>
    jQuery(document).ready(function ($) {

        jQuery(function($){
           
        
        
            
      
        jQuery.ajax({
                type: "get",
                url: moi_core_ajax.ajax_url + "?action=get_register_product",
                dataType: "json",
                success: function(data){                               
                    $('.message').fadeIn('slow');                      
                    $('#msg').html(data.record).fadeIn('slow');                     
                    $('.message').delay(5000).fadeOut('slow');
                    
                    
                }
                 }).done(function() {
                setTimeout(function(){
                    $("#overlay").fadeOut(300);
                },500);
             });
        });

       
        function getStoreUrl() {
            moi_url = window.location.href;
            moi_url = moi_url.split('admin.php');
            return moi_url[0];
        }
    })
</script>


