		</main><!-- FOOTER -->
    <footer role="contentinfo" class="footer">
    	<div class="footer__header">
    		<div class="container">
    		  <div class="brand brand--footer"><a href="/"><span class="logo">iMoney.my</span>Learning Centre</a></div>

    		</div>
    		<a href="#" id="to-top" class="footer__to-header">Back to top</a>
    	</div>

      <div class="footer__body">
        <div class="container">
          <div class="footer__description">
            <p>iMoney.my is a leading financial comparison website and a trusted personal finance authority to help people make the most of their money.</p>
          </div>
          <ul class="footer__social">
            <li><a href="https://www.facebook.com/IMoney.my" class="icon__footer-fb">Facebook</a></li><!--
            --><li><a href="https://twitter.com/iMoneyMY" class="icon__footer-tw">Twitter</a></li><!--
            --><li><a href="https://plus.google.com/+ImoneyMy-official/posts" class="icon__footer-gp">Google Plus</a></li><!--
            --><li><a href="http://instagram.com/imoney_malaysia" class="icon__footer-ig">Instagram</a></li><!--
            --><li><a href="http://www.youtube.com/channel/UCqVreFR5Sm2bznDk58WN3tw" class="icon__footer-yt">Youtube</a></li><!--
            --><li><a href="http://www.pinterest.com/imoneymy/" class="icon__footer-pt">Pinterest</a></li>
          </ul>
        </div>
      </div>
      <div class="footer__bottom">
        <div class="container">
        	<?php wp_nav_menu(
        		array(
        				'theme_location' => 'footer-menu',
        				'menu_class'      => 'footer__nav',
        				'items_wrap' => '<ul class="%2$s">%3$s</ul>'

        			)
        	); ?>
          <p class="footer__copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>

    <!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>
  </body>
</html>