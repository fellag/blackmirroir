<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
		
		$client=$this->container->get('app.blackmirror');
		$response=$client->getLists('/blackmirror'); 
	

		
		
		    return $this->render('@App/Root/AdnIndex.html.twig', array(
            'films' => $response,
        ));
    }
	
	 /**
     * @Route("/detail/{uniqId}", name="detail_serie")
     */
    public function DetailAction($uniqId)
    {
		
		
		  $client=$this->container->get('csa_guzzle.client.tvmaze');
		  $response=$client->get('/episodes/'.$uniqId); 
		  
		  $data=  json_decode($response->getBody()->getContents());
		  
		
         return $this->render('@App/Root/detail.html.twig', array(
            'data' => $data,
        )); 
    }
}
