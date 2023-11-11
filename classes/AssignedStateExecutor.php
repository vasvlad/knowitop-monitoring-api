<?php
/**
 * @author Vladimir Kunin <we@knowitop.ru>
 */

namespace Knowitop\iTop\MonitoringAPI;

class AssignedStateExecutor extends ExistsStateExecutor
{
	public function Resolve(array $aFields, bool $bDoNotWrite = false): bool
	{
		$this->Update($aFields, true); // update ticket fields inside the context
		$oTicket = $this->GetContext()->GetTicket();
		$oTicket->ApplyStimulus('ev_resolve', $bDoNotWrite);
		$this->GetContext()->SetTicket($oTicket);

		return true;
	}
}