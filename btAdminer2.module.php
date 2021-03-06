<?php

#-------------------------------------------------------------------------------
#
# A fork of Module : btAdminer (c) 2011 - 2016 by blattertech informatik (info@blattertech.ch)
#          a Adminer extension for CMS Made Simple
#          The projects homepage is dev.cmsmadesimple.org/projects/btadminer/
#          CMS Made Simple is (c) 2004-2016 by Ted Kulp
#          The projects homepage is: cmsmadesimple.org
# Version: 4.2.5
# File   : btAdminer.module.php
# Purpose: initial module class. this is the interface to the Module API
# License: GPL
#
#-------------------------------------------------------------------------------

class btAdminer2 extends CMSModule
{
	private $config;

	public final function GetName() 					{	return 'btAdminer2';	}

	public final function GetFriendlyName()				{ 	return "btAdminer";	}

	public final function GetVersion()					{	return '4.8.0';	}

	public final function GetHelp() 					{	return $this->Lang('help');	}

	public final function GetAuthor()					{	return 'blattertech informatik'; }

	public final function GetAuthorEmail()				{	return 'info@blattertech.ch';	}

	public final function IsPluginModule()				{	return false;	}

	public final function HasAdmin()						{	return true;	}

	public final function GetAdminSection()				{	return $this->GetPreference('admin_section'); }

	public final function GetAdminDescription()			{	return $this->Lang('moddescription');	}

	public final function VisibleToAdminUser()			{	return $this->CheckPermission('Use btAdminer');	}

	public final function MinimumCMSVersion()			{	return "2.0";	}

	//public final function MaximumCMSVersion()			{	return "1.11.99";	}

	public final function InstallPostMessage()			{	return $this->Lang('postinstall');	}

	public final function UninstallPostMessage()		{	return $this->Lang('postuninstall'); }

	public final function UninstallPreMessage()			{	return $this->Lang('really_uninstall');	}

	/**
	 * Method: GetHeaderHTML
	 *
	 *
	 * @see ScriptDeploy::GetHeaderHTML()
	 * @access public
	 * @return Header JS and CSS
	 */
	public final function GetHeaderHTML(){
		$this->config = cmsms()->GetConfig();
		$style = $this->GetPreference('lightboxstyle') ? $this->GetPreference('lightboxstyle') : 'white'; 
		$script = "";
		$script .= '<link rel="stylesheet" type="text/css" href="'.$this->config['root_url'].'/modules/btAdminer2/style/colorbox/'.$style.'/colorbox.css" />'."\n";
		$script .= '<script language="JavaScript" type="text/javascript" src="'.$this->config['root_url'].'/modules/btAdminer2/style/colorbox/jquery.colorbox-min.js" ></script>'."\n";
		$script .= '<script>
						$(document).ready(function(){
							$(".adminerframe").colorbox({iframe:true, width:"98%", height:"98%"});
						});
					</script>
		';
		return $script;
	}
}