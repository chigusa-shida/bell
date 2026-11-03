<?php

/**
 * ACFフィールドグループ（製品情報）
 */

add_action('acf/include_fields', function () {
	if (! function_exists('acf_add_local_field_group')) {
		return;
	}

	acf_add_local_field_group(array(
		'key' => 'group_69aa55aa479e1',
		'title' => '製品情報',
		'fields' => array(
			array(
				'key' => 'field_69b332fa5a7d3',
				'label' => '説明',
				'name' => 'product_description',
				'aria-label' => '',
				'type' => 'textarea',
				'instructions' => '1〜2行が適しています。',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '説明が入ります。',
				'maxlength' => '',
				'allow_in_bindings' => 0,
				'rows' => 2,
				'placeholder' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_69b333575a7d4',
				'label' => '適応部位',
				'name' => 'product_indication',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '適応部位をいれてください。',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '適応部位が入ります。',
				'maxlength' => '',
				'allow_in_bindings' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_69b333c75a7d5',
				'label' => '特徴',
				'name' => 'product_feature',
				'aria-label' => '',
				'type' => 'textarea',
				'instructions' => '特徴をいれてください',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'allow_in_bindings' => 0,
				'rows' => '',
				'placeholder' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_69b334085a7d6',
				'label' => '保証期間',
				'name' => 'product_feature',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '保証期間を入れてください。',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '保証期間が入ります。',
				'maxlength' => '',
				'allow_in_bindings' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_69b3342d5a7d7',
				'label' => 'シェード',
				'name' => 'product_shade',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => 'シェードを入れてください。',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '素材が入ります。',
				'maxlength' => '',
				'allow_in_bindings' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
		'display_title' => '',
	));
});
