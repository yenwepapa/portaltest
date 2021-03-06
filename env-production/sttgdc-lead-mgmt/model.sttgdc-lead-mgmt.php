<?php
//
// File generated by ... on the 2016-04-27T03:51:54+0200
// Please do not edit manually
//

/**
 * Classes and menus for sttgdc-lead-mgmt (version 1.0.0)
 *
 * @author      iTop compiler
 * @license     http://opensource.org/licenses/AGPL-3.0
 */


/**
 * Persistent classes for a CMDB
 *
 * @copyright   Copyright (C) 2010-2012 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */
class Lead extends cmdbAbstractObject
{
	public static function Init()
	{
		$aParams = array
		(
			'category' => 'bizmodel,searchable,structure',
			'key_type' => 'autoincrement',
			'name_attcode' => 'name',
			'state_attcode' => '',
			'reconc_keys' => array('name'),
			'db_table' => 'sttgdc_lead',
			'db_key_field' => 'id',
			'db_finalclass_field' => '',
			'icon' => utils::GetAbsoluteUrlModulesRoot().'sttgdc-lead-mgmt/images/slt.png',
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeString("name", array("allowed_values"=>null, "sql"=>'name', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeLinkedSetIndirect("contacts_list", array("linked_class"=>'sttgdc_lnkLeadToContact', "ext_key_to_me"=>'lead_id', "ext_key_to_remote"=>'contact_id', "allowed_values"=>null, "count_min"=>0, "count_max"=>0, "duplicates"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalKey("org_id", array("targetclass"=>'Organization', "allowed_values"=>null, "sql"=>'org_id', "is_null_allowed"=>false, "on_target_delete"=>DEL_MANUAL, "depends_on"=>array(), "display_style"=>'select', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeString("sector_type", array("allowed_values"=>null, "sql"=>'sector_type', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalKey("partner_id", array("targetclass"=>'Organization', "allowed_values"=>null, "sql"=>'partner_id', "is_null_allowed"=>false, "on_target_delete"=>DEL_MANUAL, "depends_on"=>array(), "display_style"=>'select', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeEnum("site", array("allowed_values"=>new ValueSetEnum("defu,media_hub"), "display_style"=>'list', "sql"=>'site', "default_value"=>'defu', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeDateTime("comission_date", array("allowed_values"=>null, "sql"=>'comission_date', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>true)));
		MetaModel::Init_AddAttribute(new AttributeString("unit_no", array("allowed_values"=>null, "sql"=>'unit_no', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeEnum("colo_type", array("allowed_values"=>new ValueSetEnum("Suite,Cage,Open-Colo,Rack,Others"), "display_style"=>'list', "sql"=>'colo_type', "default_value"=>'Suite', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeInteger("m2", array("allowed_values"=>null, "sql"=>'m2', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeString("one_time_charge", array("allowed_values"=>null, "sql"=>'one_time_charge', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeInteger("annual_revenue", array("allowed_values"=>null, "sql"=>'annual_revenue', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeInteger("mrr", array("allowed_values"=>null, "sql"=>'mrr', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeInteger("kwpa", array("allowed_values"=>null, "sql"=>'kwpa', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeInteger("contract_duration", array("allowed_values"=>null, "sql"=>'contract_duration', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeInteger("total_contract_value", array("allowed_values"=>null, "sql"=>'total_contract_value', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeEnum("probability", array("allowed_values"=>new ValueSetEnum("5,25,50,75,100"), "display_style"=>'list', "sql"=>'probability', "default_value"=>'5', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeText("comments", array("allowed_values"=>null, "sql"=>'comments', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));



		MetaModel::Init_SetZListItems('details', array (
  'col:col2' => 
  array (
    0 => 'annual_revenue',
    1 => 'mrr',
    2 => 'kwpa',
    3 => 'contract_duration',
    4 => 'total_contract_value',
    5 => 'probability',
    6 => 'comments',
  ),
  'col:col1' => 
  array (
    0 => 'contacts_list',
    1 => 'name',
    2 => 'org_id',
    3 => 'sector_type',
    4 => 'site',
    5 => 'partner_id',
    6 => 'comission_date',
    7 => 'unit_no',
    8 => 'colo_type',
    9 => 'm2',
    10 => 'one_time_charge',
  ),
));
		MetaModel::Init_SetZListItems('standard_search', array (
  0 => 'name',
  1 => 'org_id',
  2 => 'partner_id',
  3 => 'site',
  4 => 'sector_type',
  5 => 'probability',
  6 => 'colo_type',
));
		MetaModel::Init_SetZListItems('list', array (
  0 => 'name',
  1 => 'colo_type',
  2 => 'sector_type',
  3 => 'probability',
  4 => 'site',
  5 => 'total_contract_value',
));

	}


}


class sttgdc_lnkLeadToContact extends cmdbAbstractObject
{
	public static function Init()
	{
		$aParams = array
		(
			'category' => 'bizmodel',
			'key_type' => 'autoincrement',
			'is_link' => true,
			'name_attcode' => array('lead_id', 'contact_id'),
			'state_attcode' => '',
			'reconc_keys' => array('lead_id', 'contact_id'),
			'db_table' => 'sttgdc_lnkLeadToContact',
			'db_key_field' => 'id',
			'db_finalclass_field' => '',
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeExternalKey("lead_id", array("targetclass"=>'Lead', "allowed_values"=>null, "sql"=>'lead_id', "is_null_allowed"=>false, "on_target_delete"=>DEL_AUTO, "depends_on"=>array(), "display_style"=>'select', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("lead_name", array("allowed_values"=>null, "extkey_attcode"=>'lead_id', "target_attcode"=>'name', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalKey("contact_id", array("targetclass"=>'Contact', "allowed_values"=>null, "sql"=>'contact_id', "is_null_allowed"=>false, "on_target_delete"=>DEL_AUTO, "depends_on"=>array(), "display_style"=>'select', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("contact_name", array("allowed_values"=>null, "extkey_attcode"=>'contact_id', "target_attcode"=>'name', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalKey("role_id", array("targetclass"=>'ContactType', "allowed_values"=>null, "sql"=>'role_id', "is_null_allowed"=>true, "on_target_delete"=>DEL_MANUAL, "depends_on"=>array(), "display_style"=>'select', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("role_name", array("allowed_values"=>null, "extkey_attcode"=>'role_id', "target_attcode"=>'name', "always_load_in_tables"=>false)));



		MetaModel::Init_SetZListItems('details', array (
  0 => 'lead_id',
  1 => 'contact_id',
  2 => 'role_id',
));
		MetaModel::Init_SetZListItems('standard_search', array (
  0 => 'lead_id',
  1 => 'contact_id',
  2 => 'role_id',
));
		MetaModel::Init_SetZListItems('list', array (
  0 => 'lead_id',
  1 => 'contact_id',
  2 => 'role_id',
));

	}


}
//
// Menus
//
class MenuCreation_sttgdc_lead_mgmt extends ModuleHandlerAPI
{
	public static function OnMenuCreation()
	{
		global $__comp_menus__; // ensure that the global variable is indeed global !
		$__comp_menus__['ServiceManagement'] = new MenuGroup('ServiceManagement', 60);
		$__comp_menus__['Lead'] = new OQLMenuNode('Lead', "SELECT Lead", $__comp_menus__['ServiceManagement']->GetIndex(), 90, true);
	}
} // class MenuCreation_sttgdc_lead_mgmt
