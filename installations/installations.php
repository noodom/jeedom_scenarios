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
