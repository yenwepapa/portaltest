<?php
// Copyright (C) 2010-2012 Combodo SARL
//
//   This file is part of iTop.
//
//   iTop is free software; you can redistribute it and/or modify	
//   it under the terms of the GNU Affero General Public License as published by
//   the Free Software Foundation, either version 3 of the License, or
//   (at your option) any later version.
//
//   iTop is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU Affero General Public License for more details.
//
//   You should have received a copy of the GNU Affero General Public License
//   along with iTop. If not, see <http://www.gnu.org/licenses/>

class ModifyObjectMenuNode extends MenuNode
{
	protected $sClass;
	
	/**
	 * Create a menu item that points to the URL for creating a new object, the menu will be added only if the current user has enough
	 * rights to create such an object (or an object of a child class)
	 * @param string $sMenuId Unique identifier of the menu (used to identify the menu for bookmarking, and for getting the labels from the dictionary)
	 * @param string $sClass URL to the page to load. Use relative URL if you want to keep the application portable !
	 * @param integer $iParentIndex ID of the parent menu
	 * @param float $fRank Number used to order the list, any number will do, but for a given level (i.e same parent) all menus are sorted based on this value
	 * @return MenuNode
	 */
	public function __construct()
	{
		$sMenuId='Variable';
		$sClass='Variable';
		$fRank=0;
		parent::__construct($sMenuId,$fRank);
		$this->sClass = $sClass;
		$this->aReflectionProperties['class'] = $sClass;
	}

	public function GetHyperlink($aExtraParams)
	{
		$sHyperlink = utils::GetAbsoluteUrlAppRoot().'pages/UI.php?operation=modify&class='.$this->sClass.'&id=1&c[menu]='.$this->sClass;
		$aExtraParams['c[menu]'] = $this->GetMenuId();
		return MenuNode::AddParams($sHyperlink, $aExtraParams);
	}

	/**
	 * Overload the check of the "enable" state of this menu to take into account
	 * derived classes of objects
	 */
	public function IsEnabled()
	{
		// Enable this menu, only if the current user has enough rights to create such an object, or an object of
		// any child class
	
		$aSubClasses = MetaModel::EnumChildClasses($this->sClass, ENUM_CHILD_CLASSES_ALL); // Including the specified class itself
		$bActionIsAllowed = false;
	
		foreach($aSubClasses as $sCandidateClass)
		{
			if (!MetaModel::IsAbstract($sCandidateClass) && (UserRights::IsActionAllowed($sCandidateClass, UR_ACTION_MODIFY) == UR_ALLOWED_YES))
			{
				$bActionIsAllowed = true;
				break; // Enough for now
			}
		}
		return $bActionIsAllowed;		
	}	
	public function RenderContent(WebPage $oPage, $aExtraParams = array())
	{
		assert(false); // Shall never be called, the external web page will handle the display by itself
	}
}


?>
