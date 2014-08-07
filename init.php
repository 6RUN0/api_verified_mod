<?php

$modInfo['api_verified_mod']['name'] = 'API Verified Mod';
$modInfo['api_verified_mod']['abstract'] = '';
$modInfo['api_verified_mod']['about'] = 'Api Verified Mod by <a href="http://babylonknights.com">Khi3l</a>, Sir Quentin.<br />Fork by <a href="https://github.com/6RUN0">boris_t</a>.<br /><a href="https://github.com/6RUN0/api_verified_mod">Get API Verified Mod</a>.';

event::register('killDetail_context_assembling', 'api_verified::add');

class api_verified {

  function add($pKillDetail) {
    $pKillDetail->addBehind('points', 'api_verified::show');
  }

  function show($pKillDetail) {

    global $smarty;

    $kll_id = $pKillDetail->kll_id;
    $kll_external_id = $pKillDetail->kll_external_id;
    $verification = FALSE;

    if($kll_external_id == 0) {
      $kill = new Kill($kll_id);
      $kll_external_id = $kill->getExternalID();
    }

    if($kll_external_id != 0) {
      $verification = TRUE;
      $smarty->assign('api_verified_id', $kll_external_id);
    }

    $smarty->assign('api_verified_status', $verification);
    return $smarty->fetch(get_tpl('./mods/api_verified_mod/api_verified'));

  }

}
