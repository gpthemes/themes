<?php
/**
 * Template Name: Contact Page
 *
 */
 function contact_scripts() {
	
	wp_enqueue_script( 'validate-scripts', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), '1.0.0', true );
	
	
}
add_action( 'wp_enqueue_scripts', 'contact_scripts' );


?>
<?php get_header(); ?>

<style type="text/css">

.contact-form .container {
  max-width:600px;
  margin:0 auto;
  text-align:center;
  -webkit-border-radius:6px;
  -moz-border-radius:6px;
  border-radius:6px;
  background-color:#FAFAFA;
  border:1px solid #2d2d2d;
  padding-top:15px;
}
.contact-form .head {
  -webkit-border-radius:6px 6px 0px 0px;
  -moz-border-radius:6px 6px 0px 0px;
  border-radius:6px 6px 0px 0px;
  background-color:#2d2d2d;
  color:#FAFAFA;
  float:left;
  width:100%;
}
.contact-form h2 {
  text-align:center;
  padding:18px 0 18px 0;
  font-size: 1.4em;
}
.contact-form input {
  margin-bottom:10px;
}
.contact-form textarea {
  height:100px;
  margin-bottom:10px;
}
.contact-form input:first-of-type
{
  margin-top:35px;
}
.contact-form input, 
.contact-form textarea {
  font-size: 1em;
  padding: 15px 10px 10px;
  font-family: 'Source Sans Pro',arial,sans-serif;
  border: 1px solid #eee;
  background: #fff;
  color:#000;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  -moz-background-clip: padding;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  width: 80%;
  max-width: 600px;
}
::-webkit-input-placeholder {
   color: #2d2d2d;
}
:-moz-placeholder {
   color: #2d2d2d;  
}
::-moz-placeholder {
   color: #2d2d2d; 
}
:-ms-input-placeholder {  
   color: #2d2d2d;  
}
.contact-form input[type="submit"] {
  margin-top:15px;
  margin-bottom:25px;
  background-color:#2d2d2d;
  padding: 12px 45px;
  -ms-border-radius: 5px;
  -o-border-radius: 5px;
  border-radius: 5px;
  border: 1px solid #eee;
  -webkit-transition: .5s;
  transition: .5s;
  display: inline-block;
  cursor: pointer;
  width:30%;
  color:#fff;
 
}
.contact-form input[type="submit"]:hover {
  background:#2d2d2d;
}
.contact-form label.error {
    font-family:'Source Sans Pro',arial,sans-serif;
    font-size:1em;
    display:block;
    padding-top:10px;
    padding-bottom:10px;
    background-color:#d89c9c;
    width: 80%;
    margin:auto;
    color: #FAFAFA;
    -webkit-border-radius:6px;
    -moz-border-radius:6px;
    border-radius:6px;
}
/* media queries */
@media (max-width: 700px) {
.contact-form label.error {
    width: 90%;
  }
.contact-form input, 
.contact-form textarea {
    width: 90%;
  }
.contact-form button {
    width:90%;
 }
}
.contact-form .message {
    font-family:'Source Sans Pro',arial,sans-serif;
    font-size:1.1em;
    display:none;
    padding-top:10px;
    padding-bottom:10px;
    background-color:#2ABCA7;
    width: 80%;
    margin:auto;
    color: #FAFAFA;
    -webkit-border-radius:6px;
    -moz-border-radius:6px;
    border-radius:6px;
}
.contact-form small.message{
	padding:2px 30px;
	display:block;
}
</style>
<script type="text/javascript" language="javascript">
jQuery(document).ready(function($){
  $(function() {
    // validate
    $("#contact").validate({
        // Set the validation rules
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            message: "required",
        },
        // Specify the validation error messages
        messages: {
            name: "Please enter your name",
            email: "Please enter a valid email address",
            message: "Please enter a message",
        },
        // submit handler
        submitHandler: function(form) {
           
           $(".message").show();
           $(".message").fadeOut(4500);
		   form.submit();
		   
        }
    });
  });
});  
</script>
<div class="container-fluid">
  <div class="row content">
      <div class="col-sm-2">
     <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
        <ul class="sidebar left-side">
            <?php dynamic_sidebar( 'sidebar-3' ); ?>
        </ul>
    <?php endif; ?>
 
    </div>
    <div class="col-sm-10 contact-form">
        <form id="contact" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>">	
        		
			<?php wp_nonce_field( 'vcontact_a', 'vcontact_f' ); ?>
            <input name="action" value="vcontact_submit" type="hidden" />
            <div class="container">
            
            	
                <div class="head">
                  <h2><?php the_title(); ?></h2>
                </div>
                <input type="text" name="name" placeholder="Name" /><br />
                <input  type="email" name="email" placeholder="Email" /><br />
                <textarea type="text" name="message" placeholder="Message"></textarea><br />
                <div class="message">Please wait...</div>
                <?php 
				if(isset($_SESSION['vcontact_sent']) && $_SESSION['vcontact_sent']){ echo '<small class="message">Your message has been sent successfully.</small>'; $_SESSION['vcontact_sent'] = false; } ?>
                <input type="submit" id="submit" value="Send!" />
            </div>
        </form>
	</div>
</div>    

<?php get_footer(); ?>