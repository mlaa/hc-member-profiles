<?php

do_action( 'bp_before_profile_edit_content' );

?>

<form action="<?php bp_the_profile_group_edit_form_action(); ?>" method="post" id="profile-edit-form" class="standard-form <?php bp_the_profile_group_slug(); ?>">

	<div class="left">
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_NAME ) ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_TITLE ) ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_INSTITUTIONAL_OR_OTHER_AFFILIATION ) ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_TWITTER_USER_NAME ) ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_ORCID ) ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_SITE ) ?>
		<div class="academic-interests editable">
			<h4><?php echo hcmp_get_academic_interests_field_display_name(); ?></h4>
			<?php echo hcmp_get_academic_interests_edit(); ?>
		</div>
		<div class="commons-groups wordblock">
			<h4>Commons Groups</h4>
			<?php echo hcmp_get_groups(); ?>
		</div>
		<div class="recent-commons-activity">
			<h4>Recent Commons Activity</h4>
			<?php echo hcmp_get_activity(); ?>
		</div>
		<div class="commons-sites wordblock">
			<h4>Commons Sites</h4>
			<?php echo hcmp_get_sites(); ?>
		</div>
	</div>

	<div class="right">
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_ABOUT ) ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_EDUCATION ) ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_CORE_DEPOSITS ) ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_PUBLICATIONS ) ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_PROJECTS ) ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_UPCOMING_TALKS_AND_CONFERENCES ) ?>
		<?php echo hcmp_get_field( HC_Member_Profiles_Component::XPROFILE_FIELD_NAME_MEMBERSHIPS ) ?>
	</div>

	<div class="edit-action-bar">
		<?php do_action( 'template_notices' ); ?>

		<div class="generic-button">
			<input type="submit" value="Back to View Mode" id="cancel">
			<input type="submit" name="profile-group-edit-submit" id="profile-group-edit-submit" value="Save Changes" />
		</div>
	</div>

	<input type="hidden" name="field_ids" id="field_ids" value="<?php bp_the_profile_field_ids(); ?>" />

	<?php wp_nonce_field( 'bp_xprofile_edit' ); ?>

</form>

<?php do_action( 'bp_after_profile_edit_content' ); ?>
