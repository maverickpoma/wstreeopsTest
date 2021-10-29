<?php


namespace App\Repositories\Gampe;

use App\Contracts\Gampe\NotifyTicketRepository;
use App\Traits\GenerateHeader;
use DateTime;
use DateTimeZone;
use mysql_xdevapi\Exception;


/**
 * @author Roger Rojas <rrojas@indracompany.com>
 */
final class NotifyTicketChangeEventRepository extends NotifyTicketRepositoryRest implements NotifyTicketRepository
{

    use GenerateHeader;


    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function notifyTicketAttributeValueChangeEvent(array $body)
    {
        #return 'hola';
        try {
            # throw new Exception('error generado');
#echo 'iniciado proceso'
            $eventId = $this->UnicaServiceId();

            $unicaPID = $this->UnicaPID();

            $now = new DateTime(null, new DateTimeZone('America/Lima'));
            $eventTime = $now->format("Y-m-d\TH:i:s.vP");
            $eventType = "TicketAttributeValueChangeEvent";
            /* $tempArray = json_decode($body,true);*/

            $body['eventId'] = $eventId;
            $body['eventTime'] = $eventTime;
            $body['eventType'] = $eventType;
            #$tempArray = json_encode($body);

            $headers = [
                'Content-type' => 'application/json; charset=UTF-8',
                'UNICA-ServiceId' => $eventId,
                'UNICA-Application' => $this->UnicaApplication(),
                'UNICA-PID' => $unicaPID,
                'UNICA-User' => $this->UnicaUser(),
            ];


            $resp = $this->makeRequest(
                'POST',
                '/ri/ticket/v2/ticketAttributeValueChangeEvent',
                $headers,
                $body
            );
            #return $resp->getStatusCode();

          /*  $response = [
                'ticketID' => $body['event']['ticket']['id'],
                'tipoDocumento' => $body['event']['ticket']['relatedParty']['legalId']['nationalIdType'],
                'numeroDocumento' => $body['event']['ticket']['relatedParty']['legalId']['nationalId'],
            ];*/

            return $resp;


        } catch (Exception $e) {

            return  'Excepción capturada: '.  $e->getMessage(). "\n";
        }

    }


}
