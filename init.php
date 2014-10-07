<?php

/**
 * $Id$
 *
 * @category  Init
 * @package   API_Verified_Mod
 * @author    Khi3l, boris_t <boris@talovikov.ru>
 * @copyright 2014 (c)
 * @license   http://opensource.org/licenses/MIT MIT
 */

$modInfo['api_verified_mod']['name'] = 'API Verified Mod';
$modInfo['api_verified_mod']['abstract'] = '';
$modInfo['api_verified_mod']['about'] = 'Api Verified Mod by <a href="http://babylonknights.com">Khi3l</a>, Sir Quentin.<br />Fork by <a href="https://github.com/6RUN0">boris_t</a>.<br /><a href="https://github.com/6RUN0/api_verified_mod">Get API Verified Mod</a>.';

event::register('killDetail_context_assembling', 'APIVerified::add');

/**
 * Provides callback for event::register.
 */
class APIVerified
{

    /**
     * Adds a element in the queue.
     *
     * @param pKillDetail $pKillDetail object of pKillDetail class
     *
     * @return none
     */
    public static function add($pKillDetail)
    {
        $pKillDetail->addBehind('points', 'APIVerified::show');
    }

    /**
     * Render api_verified.tpl
     *
     * @param pKillDetail $pKillDetail object of pKillDetail class
     *
     * @return none
     */
    public static function show($pKillDetail)
    {
        global $smarty;

        $kll_id = $pKillDetail->kll_id;
        $kll_external_id = $pKillDetail->kll_external_id;
        $verification = false;

        if ($kll_external_id == 0) {
            $kill = new Kill($kll_id);
            $kll_external_id = $kill->getExternalID();
        }

        if ($kll_external_id != 0) {
            $verification = true;
            $smarty->assign('api_verified_id', $kll_external_id);
        }

        $smarty->assign('api_verified_status', $verification);
        return $smarty->fetch(get_tpl('./mods/api_verified_mod/api_verified'));
    }
}
