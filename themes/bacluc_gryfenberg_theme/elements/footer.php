<?php
defined('C5_EXECUTE') or die (_('Access Denied.'));

use Concrete\Core\View\View;
?>
			<!-- footer -->
			<footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<p class="footer-copyright"><?php
                                $a = new \Concrete\Core\Area\GlobalArea('Footer');

                                $a->display();
                                ?></p>
						</div>
					</div>
				</div>
			</footer>
			<!-- end footer -->
		

		</div> <!-- end pageWrapperClass -->
		
		
		<script src="<?php echo $view->getThemePath(); ?>/js/vendor/bootstrap.min.js"></script>
		<script src="<?php echo $view->getThemePath(); ?>/js/main.js"></script>
        <script src="<?php echo $view->getThemePath(); ?>/js/sameheight.js"></script>

		<?php View::element('footer_required'); ?>
	</body>
</html>