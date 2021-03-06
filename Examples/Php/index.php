<?php
/**
 *  This file is part of amfPHP
 *
 * LICENSE
 *
 * This source file is subject to the license that is bundled
 * with this package in the file license.txt.
 * @package Amfphp_Examples
 */

/**
 * a gateway php script like the normal gateway except that it uses example services
 * @author Ariel Sommeria-klein
 */
require_once dirname(__FILE__) . '/../../Amfphp/ClassLoader.php';
$config = new Amfphp_Core_Config();
$config->serviceFolders = array(dirname(__FILE__) . '/ExampleServices/');
$config->serviceFolders[] = array(dirname(__FILE__) . '/ServicesWithNamespace/', 'NService');
$voFolders = array(dirname(__FILE__) . '/Vo/');
//add the folder with the namespace. 1st comes the pass, 2nd comes the namespace root.
$voFolders[] = array(dirname(__FILE__) . '/NamespaceVo/', 'NVo');
$config->pluginsConfig['AmfphpVoConverter'] = array('voFolders' => $voFolders);
//set this to enforce vo conversion. If you do that, only sending UserVo1 shall work, not UserVo2
//$config->pluginsConfig['AmfphpVoConverter']['enforceConversion'] => true;
$gateway = Amfphp_Core_HttpRequestGatewayFactory::createGateway($config);
$gateway->service();
$gateway->output();


?>
