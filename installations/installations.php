$idScenario = $scenario->getId();
$scenario->setLog('id scenario : ' . $idScenario);

$scenarioElement = $scenario->getElement()[0];
if (is_object($scenarioElement) && $scenarioElement->getType() == 'code') {
  $idScenarioElement = $scenarioElement->getId();
  $typeScenarioElement = $scenarioElement->getType();
  $scenario->setLog('id scenario Element: ' . $idScenarioElement . ' de type ' . $typeScenarioElement);
  
  $scenarioSubElement = $scenarioElement->getSubElement('code');
  if (is_object($scenarioSubElement) && $scenarioSubElement->getType() == 'code') {
    $idScenarioSubElement = $scenarioSubElement->getId();
  	$typeScenarioSubElement = $scenarioSubElement->getType();
  	$scenario->setLog('id scenario SubElement: ' . $idScenarioSubElement . ' de type ' . $typeScenarioSubElement);
    
    $scenarioExpression = $scenarioSubElement->getExpression()[0];
    $scenario->setLog('id scenarioExpression : ' . $scenarioExpression->getId());
    if (is_object($scenarioExpression) && $scenarioExpression->getType() == 'code') {
      $idScenarioExpression = $scenarioExpression->getId();
      $typeScenarioExpression = $scenarioExpression->getType();
      $expressionScenarioExpression = $scenarioExpression->getExpression();
      $scenario->setLog('id scenario SubElement: ' . $idScenarioExpression . ' de type ' . $typeScenarioExpression);
      //$scenario->setLog('id scenario Expression: ' . $idScenarioExpression . ' avec expression = ' . $expressionScenarioExpression);
    }
  }
}
  
// add bloc code
//$scenario->setLog('scenario element list : ' . $scenario->getScenarioElement()[1]);
$scenarioElementList = $scenario->getScenarioElement();
$newScenarioElementId = -1;
if (sizeOf($scenarioElementList) == 1) {
  // add a second bloc code
  $newScenarioElementId = $scenarioElement->copy();
  $scenario->setLog('add a second bloc code (id=' . $newScenarioElementId . ')');
  $scenarioElementList[] = $newScenarioElementId;
  $scenario->setScenarioElement($scenarioElementList);
  $scenario->save();
}
else {
  // get the second bloc code
  $newScenarioElementId = $scenario->getScenarioElement()[1];
  $scenario->setLog('get the second bloc code (id=' . $newScenarioElementId . ')');
}
if (sizeOf($scenarioElementList) > 1) {
  // fill second bloc code
  $scenario->setLog('fill second bloc code (id=' . $newScenarioElementId . ')');
  $scenarioSubElement = scenarioElement::byId($newScenarioElementId)->getSubElement('code');
  $scenarioExpression = $scenarioSubElement->getExpression()[0];
  $expressionContent = file_get_contents('https://raw.githubusercontent.com/noodom/jeedom_menus/master/installation/nooMenusAutomaticInstallation.php');
  $scenario->setLog('expressionContent = ' . $expressionContent);
  //eval($expressionContent);
  $scenarioExpression->setExpression($expressionContent);
  $scenarioExpression->save();
  // enable second code
  $scenario->setLog('enable second bloc code (id=' . $newScenarioElementId . ')');
  $scenarioSubElement->setOptions('enable', 1);  
  $scenarioSubElement->save();
  
  // disable first code
  $firstScenarioElementId = $scenario->getScenarioElement()[0];
  $scenario->setLog('disable first bloc code (id=' . $firstScenarioElementId . ')');
  $scenarioSubElement = scenarioElement::byId($firstScenarioElementId)->getSubElement('code');
  $scenarioSubElement->setOptions('enable', 0);
  $scenarioSubElement->save();
  // launch scenario
  //$scenario->launch();
}
$scenario->save();
