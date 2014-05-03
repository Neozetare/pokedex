<?php

/*
 * This file is part of the GNKWLDF package.
 *
 * (c) Anthony Rey <anthony.rey@mailoo.org>
 *
 * For the full copyright and license information, please view the LICENSE-GNKWLDF
 * file that was distributed with this source code.
 */

namespace GNKWLDF\PokedexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Default Pokedex Controller
 * @author Anthony Rey <anthony.rey@mailoo.org>
 * @since 02/05/2014
 */
class DefaultController extends Controller
{
    /**
     * Standard action
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $request = $this->getRequest();
        $request->setLocale($request->getPreferredLanguage(array(
            'fr',
            'en'
        )));
        $listtext = file_get_contents(__DIR__ . '/../data/pokemon/list.json');
        $list = json_decode($listtext, true);
        return array('number' => 719, 'list' => $list);
    }
}
