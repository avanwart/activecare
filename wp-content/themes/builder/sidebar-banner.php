					<div id="sidebar-banner" class="sidebar well clearfix" role="complementary">

					<?php if ( is_active_sidebar( 'banner' ) ) : ?>

						<?php dynamic_sidebar( 'banner' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->

						<div class="alert alert-danger">
							<p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
						</div>

					<?php endif; ?>

				</div>