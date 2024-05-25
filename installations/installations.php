$idScenario = $scenario->getId();
$scenario->setLog('id scenario : ' . $idScenario);

$scenarioElementList = $scenario->getScenarioElement();

// remove all scenario elements except this one (for an update, remove last creation)
$scenario->setLog('remove all scenario elements except first one');
if (sizeOf($scenarioElementList) > 1) {
  foreach (($scenario->getElement()) as $element) {
    if ($element->getId() != $scenario->getElement()[0]->getId()) {
      scenarioElement::byId($element->getId())->remove();
    }
  }
}
$scenario->save();

// add action code
$scenario->setLog('add action code');
$newScenarioElement = new scenarioElement();
$newScenarioElement->setType ('action');
$newScenarioElement->save();
$scenarioElementList[] = $newScenarioElement->getId();
$scenario->setScenarioElement($scenarioElementList);
$scenario->save();

// add scenarioSubElement
$scenario->setLog('add scenarioSubElement');
$newScenarioSubElement = new scenarioSubElement();
$newScenarioSubElement->setScenarioElement_id($newScenarioElement->getId());
$newScenarioSubElement->setType('action');
$newScenarioSubElement->setSubType('action');
$newScenarioSubElement->save();

// add scenarioExpressions (tags list)
(!isset($tags['#tagsList#'])) ? $tags['#tagsList#'] = '{"menuName":"menuNavButton","menuDesignWidth":"1280","menuDesignHeight":"1000","designSuffixName":"V1","htmldisplayParent":"Design"}' : null;
$scenario->setLog('get tags ' . $tags['#tagsList#']);
$tagsList = json_decode ($tags['#tagsList#']);
foreach($tagsList as $key=>$value){
  $scenario->setLog('add scenarioExpression ( tag[' . $key . ']=' . $value. ')');
  $newScenarioExpression = new scenarioExpression();
  $newScenarioExpression->setScenarioSubElement_id($newScenarioSubElement->getId());
  $newScenarioExpression->setType('action');
  $newScenarioExpression->setOptions('name', $key);
  $newScenarioExpression->setOptions('value', $value);
  $newScenarioExpression->setExpression('tag');
  $newScenarioExpression->setOrder(0);
  $newScenarioExpression->save();
}

// add scenarioElement
$scenario->setLog('add scenarioElement2');
$newScenarioElement2 = new scenarioElement();
$newScenarioElement2->setType ('code');
$newScenarioElement2->save();

// add scenarioSubElement
$scenario->setLog('add scenarioSubElement2');
$newScenarioSubElement2 = new scenarioSubElement();
$newScenarioSubElement2->setScenarioElement_id($newScenarioElement2->getId());
$newScenarioSubElement2->setType('code');
$newScenarioSubElement2->setSubType('action');
$newScenarioSubElement2->save();

// add scenarioExpression
$scenario->setLog('add scenarioExpression2');
$newScenarioExpression2 = new scenarioExpression();
$newScenarioExpression2->setScenarioSubElement_id($newScenarioSubElement2->getId());
$newScenarioExpression2->setType('code');
// get script
$tags = $scenario->getTags();
(!isset($tags['#githubLink#'])) ? $tags['#githubLink#'] = 'https://raw.githubusercontent.com/noodom/jeedom_menus/master/installation/nooMenusAutomaticInstallation.php' : null;
$scenario->setLog('get script ' . $tags['#githubLink#']);
$expressionContent2 = file_get_contents($tags['#githubLink#']);
$newScenarioExpression2->setExpression($expressionContent2);
$newScenarioExpression2->save();

$scenario->setLog('add scenarioExpression');
$newScenarioExpression = new scenarioExpression();
$newScenarioExpression->setScenarioSubElement_id($newScenarioSubElement->getId());
$newScenarioExpression->setType('element');
$newScenarioExpression->setExpression($newScenarioElement2->getId());
$newScenarioExpression->setOrder(5);
$newScenarioExpression->save();

// disable first code
$firstScenarioElementId = $scenario->getScenarioElement()[0];
$scenario->setLog('disable first bloc code (id=' . $firstScenarioElementId . ')');
$scenarioSubElement = scenarioElement::byId($firstScenarioElementId)->getSubElement('code');
$scenarioSubElement->setOptions('enable', 0);
$scenarioSubElement->save();
