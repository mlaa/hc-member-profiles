<?php

do_action( 'bp_before_profile_loop_content' );

?>

<form> <?php // <form> is only here for styling consistency between edit & view modes ?>

	<div class="left">
		<div class="academic-interests wordblock">
			<h4><?php echo hcmp_get_academic_interests_field_display_name(); ?></h4>
			<?php echo hcmp_get_academic_interests(); ?>
		</div>
		<div class="commons-groups wordblock show-more">
			<h4>Commons Groups</h4>
			<?php echo hcmp_get_groups(); ?>
		</div>
		<div class="recent-commons-activity">
			<h4>Recent Commons Activity</h4>
			<?php echo hcmp_get_activity(); ?>
		</div>
		<div class="commons-sites wordblock show-more">
			<h4>Commons Sites</h4>
			<?php echo hcmp_get_sites(); ?>
		</div>
	</div>

	<div class="right">
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_ABOUT ); ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_EDUCATION ); ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_CV ); ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_CORE_DEPOSITS ); ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_PUBLICATIONS ); ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_PROJECTS ); ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_UPCOMING_TALKS_AND_CONFERENCES ); ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_MEMBERSHIPS ); ?>
	</div>

</form>

<?php do_action( 'bp_after_profile_loop_content' ); ?>
