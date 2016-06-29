<?php

namespace ArsumCom\Dopamine;

use Log;
use Carbon\Carbon;
use Ixudra\Curl\CurlService;

class Dopamine
{
  const URL = 'https://api.usedopamine.com/v3/app/reinforce';

  private $config;

  /**
   * Create a new Skeleton Instance
   */
  public function __construct()
  {
    $this->config = config('services.dopamine');
  }

  /**
   * Friendly welcome
   *
   * @param string $phrase Phrase to return
   *
   * @return string Returns the phrase passed in
   */
  public function send($action_id, $id)
  {
    $timestamp = Carbon::now()->timestamp * 1000;

    $curl = new CurlService();

    $data = $curl->to(self::URL)
      ->withData([
        'appID' => $this->config['key'],
        'secret' => $this->config['secret'],
        'versionID' => $this->config['version_id'],
        'actionID' =>  $action_id,
        'primaryIdentity' => $id,
        'UTC' => $timestamp,
        'localTime' => $timestamp,
        'clientOS' => 'cURL',
        'clientOSVersion' => 2,
        'clientSDKVersion' => 1
      ])
      ->asJson()
      ->post();

    if (!empty($data->errors)) {
      foreach ($data->errors as $error) {
        Log::error($error->verbose);
      }
    }
  }
}
