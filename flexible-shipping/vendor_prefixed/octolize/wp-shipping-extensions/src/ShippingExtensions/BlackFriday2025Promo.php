<?php

namespace FSVendor\Octolize\ShippingExtensions;

use FSVendor\WPDesk\PluginBuilder\Plugin\Hookable;
class BlackFriday2025Promo implements Hookable
{
    private const PROMO_CODE = 'bf2025';
    private const PROMO_CONTENT = '<span>BLACK FRIDAY MONTH DEAL: Save 20% on premium bundles!<br>Don\'t hesitate - offer ends November 30th. 🚀 <a href="https://octolize.com/black-friday-sale/?utm_source=plugin&utm_medium=referral&utm_campaign=shipping_extensions_tab_blackfriday">Learn more &#8594;</a></span>';
    private const PROMO_START_DATE = '2025-11-02';
    private const PROMO_END_DATE = '2025-11-30';
    public function hooks()
    {
        add_filter('octolize/shipping-extensions/header-promo', [$this, 'add_promo']);
    }
    /**
     * @param array $promo
     * @return array
     */
    public function add_promo($promo)
    {
        if ($this->is_active_promo()) {
            $promo[self::PROMO_CODE] = self::PROMO_CONTENT;
        }
        return $promo;
    }
    private function is_active_promo(): bool
    {
        return self::get_timed_update()->is_active();
    }
    public static function get_timed_update(): TimedUpdate
    {
        return new TimedUpdate(self::PROMO_CODE, new DateRange(self::PROMO_START_DATE, self::PROMO_END_DATE));
    }
}
