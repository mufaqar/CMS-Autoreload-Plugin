
<div class="moi-configurations" >
    <div class="moi-center">
            <h1>Command Center </h1><br/><br/>
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
                    <h2 class=""><?php echo __( 'Auto Reload Configuration', 'membersone-integration' ); ?></h2>
                </div>
                <div class="container">

                    <form action="" method="post">
                        <div class="row">
	                        <?php if ( $response['is_submited'] ) : ?>
		                        <?php if ( 'success' === $response['status'] ) : ?>
                                    <div class="notice notice-success is-dismissible">
                                        <p><?php echo esc_html( $response['message'] ); ?></p>
                                    </div>
		                        <?php endif; ?>
		                        <?php if ( 'error' === $response['status'] ) : ?>
                                    <div class="notice notice-error is-dismissible">
                                        <p><?php echo esc_html( $response['message'] ); ?></p>
                                    </div>
		                        <?php endif; ?>
	                        <?php endif; ?>
                            <br/>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="moi_enable"><?php echo __( 'Status', 'membersone-integration' ); ?></label>
                            </div>
                            <div class="col-75">
                                <select name="moi_enable" id="moi_enable" value="<?php echo $options['moi_enable']; ?>" >
                                    <option value="1" <?php echo ( 1 == $options['moi_enable'] ) ? "selected=''" : ''; ?> ><?php echo __( 'Enable', 'membersone-integration' ); ?></option>
                                    <option value="0" <?php echo ( 0 == $options['moi_enable'] ) ? "selected=''" : ''; ?> ><?php echo __( 'Disable', 'membersone-integration' ); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            
                        
                      

                        <div class="row">
                            <div class="col-25">
                                <label for="moi_vendor_api">Request URL 1</label>
                            </div>
                            <div class="col-50">
                                <input type="text" id="moi_req_url1" name="moi_req_url1" value="<?= $options['moi_req_url1'] ?>" placeholder="/plugin/wp-admin/admin.php?page=wc-reports">
                            </div>
                            <div class="col-25">
                            <input type="text" id="moi_req_time1" name="moi_req_time1" value="<?= $options['moi_req_time1'] ?>" placeholder="Refresh Time">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-25">
                                <label for="moi_vendor_api">Request URL 2</label>
                            </div>
                            <div class="col-50">
                                <input type="text" id="moi_req_url2" name="moi_req_url2" value="<?= $options['moi_req_url2'] ?>" placeholder="/plugin/wp-admin/admin.php?page=wc-reports">
                            </div>
                            <div class="col-25">
                            <input type="text" id="moi_req_time2" name="moi_req_time2" value="<?= $options['moi_req_time2'] ?>" placeholder="Refresh Time">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="moi_vendor_api">Request URL 3</label>
                            </div>
                            <div class="col-50">
                                <input type="text" id="moi_req_url3" name="moi_req_url3" value="<?= $options['moi_req_url3'] ?>" placeholder="/plugin/wp-admin/admin.php?page=wc-reports">
                            </div>
                            <div class="col-25">
                            <input type="text" id="moi_req_time3" name="moi_req_time3" value="<?= $options['moi_req_time3'] ?>" placeholder="Refresh Time">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-25">
                                <label for="moi_vendor_api">Request URL 4</label>
                            </div>
                            <div class="col-50">
                                <input type="text" id="moi_req_url4" name="moi_req_url4" value="<?= $options['moi_req_url4'] ?>" placeholder="Api URL">
                            </div>
                            <div class="col-25">
                            <input type="text" id="moi_req_time4" name="moi_req_time4" value="<?= $options['moi_req_time4'] ?>" placeholder="/plugin/wp-admin/admin.php?page=wc-reports">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-25">
                                <label for="moi_vendor_api">Request URL 5</label>
                            </div>
                            <div class="col-50">
                                <input type="text" id="moi_req_url5" name="moi_req_url5" value="<?= $options['moi_req_url5'] ?>" placeholder="/plugin/wp-admin/admin.php?page=wc-reports">
                            </div>
                            <div class="col-25">
                            <input type="text" id="moi_req_time5" name="moi_req_time5" value="<?= $options['moi_req_time5'] ?>" placeholder="Refresh Time">
                            </div>
                        </div>
                                       
                                   

                        <br>
                        <div class="row">
                            <div class="col-25">
	                            <?php wp_nonce_field( 'membersone-integration-nonce', 'moi_nonce_field' ); ?>
                            </div>
                            <div class="col-75">
                                <input type="submit" value="<?php echo __( 'Save Configurations', 'membersone-integration' ); ?>">

                            </div>
                        </div>
                        
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


