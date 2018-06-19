<?php


namespace AppBundle\Blackmirror;

use GuzzleHttp\Client;
use JMS\Serializer\Serializer;

class Blackmirror
{
    private $blackmirrorClient;
    private $serializer; 

    public function __construct(Client $blackmirrorClient, Serializer $serializer)
    {
        $this->blackmirrorClient = $blackmirrorClient;
        $this->serializer = $serializer;
    }

    public function getLists($uri)
    {
		 try {
		$response=$this->blackmirrorClient->get('/blackmirror'); 
          } catch (\Exception $e) {
            // Penser à logger l'erreur.
            
            return ['error' => 'Les informations ne sont pas disponibles pour le moment.'];
        }
		
		$data = $this->serializer->deserialize($response->getBody()->getContents(), 'array', 'json');
	 
		if($data["code"]==200)
		{
			$info_general['name'] =$data["resources"]['name'];
			$info_general['type'] =$data["resources"]['type'];
			$info_general['language'] =$data["resources"]['language'];
			$info_general['officialSite'] =$data["resources"]['officialSite'];
			$info_general['image'] =$data["resources"]['image'];
			$info_general['summary'] =$data["resources"]['summary'];
			$info_general['episodes'] =$data["resources"]['_embedded']["episodes"];
		} 
		
		
		 
	  return($info_general);
 
    } 
}