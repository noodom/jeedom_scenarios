$tags = $scenario->getTags();

// tags to get
$tags['#tagsList#'] = '{"widgetName":"nooNeonButton"}';

// bloc code to get
$tags['#githubLink#'] = 'https://raw.githubusercontent.com/noodom/jeedom_menus/master/installation/nooWidgetsAutomaticInstallation.php';

$scenario->setTags($tags);
  
// add bloc code to execute to the scenario
eval(file_get_contents('https://raw.githubusercontent.com/noodom/jeedom_scenarios/main/installations/installations.php'));
