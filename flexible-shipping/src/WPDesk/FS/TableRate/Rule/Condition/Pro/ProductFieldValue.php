<?php

namespace WPDesk\FS\TableRate\Rule\Condition\Pro;

use WPDesk\FS\TableRate\Rule\Condition\AbstractCondition;

class ProductFieldValue extends AbstractCondition {

	private const CONDITION_ID = 'product_field_value';

	public function __construct( int $priority = 10 ) {
		$this->condition_id = self::CONDITION_ID;
		$this->name         = __( 'Field value', 'flexible-shipping' );
		$this->description  = __( 'Shipping cost based on the product\'s field value', 'flexible-shipping' );
		$this->group        = __( 'Product', 'flexible-shipping' );
		$this->priority     = $priority;
		$this->is_disabled  = true;

		$this->name .= ' ' . __( '(PRO feature)', 'flexible-shipping' );

	}
}