<?php 
	namespace Services;

	class OrderService {

		const DISCOUNT_PWD = 'DISCOUNT_PWD';
		const DISCOUNT_VETERAN = 'DISCOUNT_VETERAN';
		const DISCOUNT_SENIOR = 'DISCOUNT_SENIOR';
		const DISCOUNT_STUDENT = 'DISCOUNT_STUDENT';
		const DISCOUNT_CUSTOM = 'DISCOUNT_CUSTOM';

		public function getDiscounts() {
			$discounts = [
				self::DISCOUNT_PWD,
				self::DISCOUNT_VETERAN,
				self::DISCOUNT_SENIOR,
				self::DISCOUNT_STUDENT,
				self::DISCOUNT_CUSTOM,
			];
			sort($discounts);
			return $discounts;
		}
	}