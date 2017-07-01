
<footer class="container-fluid text-center">
        <?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
        
            <ul class="sidebar footer">
                <?php dynamic_sidebar( 'sidebar-7' ); ?>
            </ul>
          
        <?php endif; ?>  
</footer>
    
<?php if(!is_home()){ ?>    
</div><?php } ?>

<?php wp_footer(); ?>
</body>
</html>