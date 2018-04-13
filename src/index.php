<?php
  require '../vendor/autoload.php';
  require 'lib/AutoLoader.php';

  Twig_Autoloader::register();

  // Propublica Data API
  $proAPI = ['X-API-KEY' => 'Mls3PnkzH3IKfCTXY6RBMIbDfZuqPod5amnm95TT'];
  // Open Secrets API: 73d381f211480e6ad9bd86d504731699
  // NOTE: Replace CID=N00036633 with the crp_id to get top contributors
  $osAPI = 'https://www.opensecrets.org/api/?method=candContrib&cid=N00036633&cycle=2018&apikey=73d381f211480e6ad9bd86d504731699&output=json';
  $house = 'https://api.propublica.org/congress/v1/115/house/members.json';

  $client = new GuzzleHttp\Client();
  $reqHouse = new GuzzleHttp\Psr7\Request('GET', $house, $proAPI);
  $resp = $client->send($reqHouse);

  //echo $resp->getBody();
  $obj = json_decode($resp->getBody());

  $cong = new CongressMember();

  foreach($obj->results[0]->members as $mem) {
    $cong->id = $mem->id;
    $cong->title = $mem->title;
    $cong->crp_id = $mem->crp_id;
    $cong->cspan_id = $mem->cspan_id;
    $cong->district = $mem->district;
    $cong->fec_candidate_id = $mem->fec_candidate_id;
    $cong->first_name = $mem->first_name;
    $cong->geoid = $mem->geoid;
    $cong->google_entity_id = $mem->google_entity_id;
    $cong->govtrack_id = $mem->govtrack_id;
    $cong->icpsr_id = $mem->icpsr_id;
    $cong->last_name = $mem->last_name;
    $cong->office = $mem->office;
    $cong->party = $mem->party;
    $cong->phone = $mem->phone;
    $cong->state = $mem->state;
    $cong->url = $mem->url;
    $cong->votes_with_party_pct = $mem->votes_with_party_pct;
    $cong->votesmart_id = $cong->votesmart_id;

    //echo '<p><em>'. $cong->crp_id .'<em></p>';
  }

  try {
    // specify where to look for templates
    $loader = new Twig_Loader_Filesystem('./templates');

    // initialize Twig environment
    $twig = new Twig_Environment($loader);

    // load template
    $template = $twig->loadTemplate('default.tpl');

    // set template variables
    // render template
    echo $template->render(array(
      'testit' => 'Clark Kent'
    ));

  }
  catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
  }

 ?>
