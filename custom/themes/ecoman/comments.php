<?php if ( post_password_required() ) {
	return;
} ?>
	<div id="comments" class="comments-area">
		<?php 

			$fields =  array(

			  'author' =>
			    '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
			    ( $req ? '<span class="required">*</span>' : '' ) .
			    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			    '" size="30"' . ' /></p>',

			  'email' =>
			    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
			    ( $req ? '<span class="required">*</span>' : '' ) .
			    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			    '" size="30"' . ' /></p>',

			  'url' =>
			    '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
			    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			    '" size="30" /></p>',
			);

			$args = array(
			  'id_form'           => 'commentform',
			  'class_form'      => 'comment-form',
			  'id_submit'         => 'submit',
			  'class_submit'      => 'submit',
			  'name_submit'       => 'submit',
			  'title_reply'       => __( 'Leave a Reply' ),
			  'title_reply_to'    => __( 'Leave a Reply to %s' ),
			  'cancel_reply_link' => __( 'Cancel Reply' ),
			  'label_submit'      => __( 'Post Comment' ),
			  'format'            => 'xhtml',

			  'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
			    '</label><br/><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
			    '</textarea></p>',

			  'must_log_in' => '<p class="must-log-in">' .
			    sprintf(
			      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
			      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
			    ) . '</p>',

			  'logged_in_as' => '<p class="logged-in-as">' .
			    sprintf(
			    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
			      admin_url( 'profile.php' ),
			      $user_identity,
			      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
			    ) . '</p>',


			  'comment_notes_after' => '<p class="form-allowed-tags">' .
			    sprintf(
			      __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
			      ' <code>' . allowed_tags() . '</code>'
			    ) . '</p>',

			  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
			);

		comment_form($args); ?>
		<?php if ( have_comments() ) : ?>
			<h3 class="comments-title">
				<?php
				printf( _nx( 'One comment on “%2$s”', '%1$s comments on “%2$s”', get_comments_number(), 'comments title'),
					number_format_i18n( get_comments_number() ), get_the_title() );
				?>
			</h3>
			<ul class="comment-list">
				<?php 
				wp_list_comments( array(
					'short_ping'  => true,
					'avatar_size' => 50,
				) );
				?>
			</ul>
		<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="no-comments">
				<?php _e( 'Comments are closed.' ); ?>
			</p>
		<?php endif; ?>
	</div>