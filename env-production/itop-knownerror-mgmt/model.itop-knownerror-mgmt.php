<?php
//
// File generated by ... on the 2016-04-27T03:51:54+0200
// Please do not edit manually
//

/**
 * Classes and menus for itop-knownerror-mgmt (version 2.2.0)
 *
 * @author      iTop compiler
 * @license     http://opensource.org/licenses/AGPL-3.0
 */


/**
* Description of known error
*/
class KnownError extends cmdbAbstractObject
{
	public static function Init()
	{
		$aParams = array
		(
			'category' => 'bizmodel,searchable,knownerrormgmt',
			'key_type' => 'autoincrement',
			'name_attcode' => 'name',
			'state_attcode' => '',
			'reconc_keys' => array('org_id', 'name'),
			'db_table' => 'knownerror',
			'db_key_field' => 'id',
			'db_finalclass_field' => '',
			'icon' => utils::GetAbsoluteUrlModulesRoot().'itop-knownerror-mgmt/images/known-error.png',
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeString("name", array("allowed_values"=>null, "sql"=>'name', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalKey("org_id", array("targetclass"=>'Organization', "allowed_values"=>null, "sql"=>'cust_id', "is_null_allowed"=>false, "on_target_delete"=>DEL_MANUAL, "depends_on"=>array(), "display_style"=>'select', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("cust_name", array("allowed_values"=>null, "extkey_attcode"=>'org_id', "target_attcode"=>'name', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalKey("problem_id", array("targetclass"=>'Problem', "allowed_values"=>null, "sql"=>'problem_id', "is_null_allowed"=>true, "on_target_delete"=>DEL_MANUAL, "depends_on"=>array(), "display_style"=>'select', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("problem_ref", array("allowed_values"=>null, "extkey_attcode"=>'problem_id', "target_attcode"=>'ref', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeText("symptom", array("allowed_values"=>null, "sql"=>'symptom', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeText("root_cause", array("allowed_values"=>null, "sql"=>'rootcause', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeText("workaround", array("allowed_values"=>null, "sql"=>'workaround', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeText("solution", array("allowed_values"=>null, "sql"=>'solution', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeString("error_code", array("allowed_values"=>null, "sql"=>'error_code', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeEnum("domain", array("allowed_values"=>new ValueSetEnum("Network,Server,Application,Desktop"), "display_style"=>'list', "sql"=>'domain', "default_value"=>'Application', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeString("vendor", array("allowed_values"=>null, "sql"=>'vendor', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeString("model", array("allowed_values"=>null, "sql"=>'model', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeString("version", array("allowed_values"=>null, "sql"=>'version', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeLinkedSetIndirect("ci_list", array("linked_class"=>'lnkErrorToFunctionalCI', "ext_key_to_me"=>'error_id', "ext_key_to_remote"=>'functionalci_id', "allowed_values"=>null, "count_min"=>0, "count_max"=>0, "duplicates"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeLinkedSetIndirect("document_list", array("linked_class"=>'lnkDocumentToError', "ext_key_to_me"=>'error_id', "ext_key_to_remote"=>'document_id', "allowed_values"=>null, "count_min"=>0, "count_max"=>0, "duplicates"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));



		MetaModel::Init_SetZListItems('details', array (
  0 => 'name',
  1 => 'org_id',
  2 => 'problem_id',
  3 => 'error_code',
  4 => 'domain',
  5 => 'vendor',
  6 => 'model',
  7 => 'version',
  8 => 'symptom',
  9 => 'root_cause',
  10 => 'workaround',
  11 => 'solution',
  12 => 'ci_list',
  13 => 'document_list',
));
		MetaModel::Init_SetZListItems('standard_search', array (
  0 => 'name',
  1 => 'org_id',
  2 => 'problem_id',
  3 => 'error_code',
  4 => 'domain',
  5 => 'symptom',
));
		MetaModel::Init_SetZListItems('list', array (
  0 => 'org_id',
  1 => 'problem_id',
  2 => 'error_code',
  3 => 'symptom',
));

	}


}

/**
* n-n link between any Infra and a Known Error
*/
class lnkErrorToFunctionalCI extends cmdbAbstractObject
{
	public static function Init()
	{
		$aParams = array
		(
			'category' => 'bizmodel,searchable,knownerrormgmt,lnkknownerror',
			'key_type' => 'autoincrement',
			'is_link' => true,
			'name_attcode' => '',
			'state_attcode' => '',
			'reconc_keys' => array('functionalci_id', 'error_id'),
			'db_table' => 'lnkerrortofunctionalci',
			'db_key_field' => 'link_id',
			'db_finalclass_field' => '',
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeExternalKey("functionalci_id", array("targetclass"=>'FunctionalCI', "allowed_values"=>null, "sql"=>'functionalci_id', "is_null_allowed"=>false, "on_target_delete"=>DEL_AUTO, "depends_on"=>array(), "display_style"=>'select', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("functionalci_name", array("allowed_values"=>null, "extkey_attcode"=>'functionalci_id', "target_attcode"=>'name', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalKey("error_id", array("targetclass"=>'KnownError', "allowed_values"=>null, "sql"=>'error_id', "is_null_allowed"=>false, "on_target_delete"=>DEL_AUTO, "depends_on"=>array(), "display_style"=>'select', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("error_name", array("allowed_values"=>null, "extkey_attcode"=>'error_id', "target_attcode"=>'name', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeString("reason", array("allowed_values"=>null, "sql"=>'dummy', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>false)));



		MetaModel::Init_SetZListItems('details', array (
  0 => 'functionalci_id',
  1 => 'error_id',
  2 => 'reason',
));
		MetaModel::Init_SetZListItems('standard_search', array (
  0 => 'functionalci_id',
  1 => 'error_id',
));
		MetaModel::Init_SetZListItems('list', array (
  0 => 'functionalci_id',
  1 => 'error_id',
  2 => 'reason',
));

	}


}

/**
* n-n link between any Contract and a Document
*/
class lnkDocumentToError extends cmdbAbstractObject
{
	public static function Init()
	{
		$aParams = array
		(
			'category' => 'bizmodel,searchable,knownerrormgmt,lnkknownerror',
			'key_type' => 'autoincrement',
			'is_link' => true,
			'name_attcode' => 'link_type',
			'state_attcode' => '',
			'reconc_keys' => array('document_id', 'error_id'),
			'db_table' => 'lnkdocumenttoerror',
			'db_key_field' => 'link_id',
			'db_finalclass_field' => '',
			'display_template' => utils::GetAbsoluteUrlModulesRoot().'itop-knownerror-mgmt/../business/templates/default.html',
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeExternalKey("document_id", array("targetclass"=>'Document', "allowed_values"=>null, "sql"=>'document_id', "is_null_allowed"=>false, "on_target_delete"=>DEL_AUTO, "depends_on"=>array(), "display_style"=>'select', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("document_name", array("allowed_values"=>null, "extkey_attcode"=>'document_id', "target_attcode"=>'name', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalKey("error_id", array("targetclass"=>'KnownError', "allowed_values"=>null, "sql"=>'error_id', "is_null_allowed"=>false, "on_target_delete"=>DEL_AUTO, "depends_on"=>array(), "display_style"=>'select', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("error_name", array("allowed_values"=>null, "extkey_attcode"=>'error_id', "target_attcode"=>'name', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeString("link_type", array("allowed_values"=>null, "sql"=>'link_type', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>false)));



		MetaModel::Init_SetZListItems('details', array (
  0 => 'document_id',
  1 => 'error_name',
  2 => 'link_type',
));
		MetaModel::Init_SetZListItems('list', array (
  0 => 'document_id',
  1 => 'error_name',
  2 => 'link_type',
));

	}


}


class FAQ extends cmdbAbstractObject
{
	public static function Init()
	{
		$aParams = array
		(
			'category' => 'bizmodel,searchable,knownerrormgmt',
			'key_type' => 'autoincrement',
			'name_attcode' => 'title',
			'state_attcode' => '',
			'reconc_keys' => array('title'),
			'db_table' => 'faq',
			'db_key_field' => 'id',
			'db_finalclass_field' => '',
			'icon' => utils::GetAbsoluteUrlModulesRoot().'itop-knownerror-mgmt/images/faq.png',
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeString("title", array("allowed_values"=>null, "sql"=>'title', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeText("summary", array("allowed_values"=>null, "sql"=>'summary', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeHTML("description", array("allowed_values"=>null, "sql"=>'description', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalKey("category_id", array("targetclass"=>'FAQCategory', "allowed_values"=>null, "sql"=>'category_id', "is_null_allowed"=>false, "on_target_delete"=>DEL_MANUAL, "depends_on"=>array(), "display_style"=>'select', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeExternalField("category_name", array("allowed_values"=>null, "extkey_attcode"=>'category_id', "target_attcode"=>'name', "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeString("error_code", array("allowed_values"=>null, "sql"=>'error_code', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeString("key_words", array("allowed_values"=>null, "sql"=>'key_words', "default_value"=>'', "is_null_allowed"=>true, "depends_on"=>array(), "always_load_in_tables"=>false)));



		MetaModel::Init_SetZListItems('details', array (
  0 => 'category_id',
  1 => 'title',
  2 => 'error_code',
  3 => 'key_words',
  4 => 'summary',
  5 => 'description',
));
		MetaModel::Init_SetZListItems('standard_search', array (
  0 => 'category_id',
  1 => 'title',
  2 => 'summary',
  3 => 'error_code',
  4 => 'key_words',
));
		MetaModel::Init_SetZListItems('list', array (
  0 => 'category_id',
  1 => 'error_code',
  2 => 'key_words',
));

	}


}


class FAQCategory extends cmdbAbstractObject
{
	public static function Init()
	{
		$aParams = array
		(
			'category' => 'bizmodel,searchable,knownerrormgmt',
			'key_type' => 'autoincrement',
			'name_attcode' => 'name',
			'state_attcode' => '',
			'reconc_keys' => array('name'),
			'db_table' => 'faqcategory',
			'db_key_field' => 'id',
			'db_finalclass_field' => '',
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeString("name", array("allowed_values"=>null, "sql"=>'nam', "default_value"=>'', "is_null_allowed"=>false, "depends_on"=>array(), "always_load_in_tables"=>false)));
		MetaModel::Init_AddAttribute(new AttributeLinkedSet("faq_list", array("linked_class"=>'FAQ', "ext_key_to_me"=>'category_id', "count_min"=>0, "count_max"=>0, "edit_mode"=>LINKSET_EDITMODE_ADDONLY, "allowed_values"=>null, "depends_on"=>array(), "always_load_in_tables"=>false)));



		MetaModel::Init_SetZListItems('details', array (
  0 => 'name',
  1 => 'faq_list',
));
		MetaModel::Init_SetZListItems('standard_search', array (
  0 => 'name',
));

	}


}
//
// Menus
//
class MenuCreation_itop_knownerror_mgmt extends ModuleHandlerAPI
{
	public static function OnMenuCreation()
	{
		global $__comp_menus__; // ensure that the global variable is indeed global !
		$__comp_menus__['ProblemManagement'] = new MenuGroup('ProblemManagement', 42);
		$__comp_menus__['Problem:Shortcuts'] = new TemplateMenuNode('Problem:Shortcuts', '', $__comp_menus__['ProblemManagement']->GetIndex(), 5);
		$__comp_menus__['NewError'] = new NewObjectMenuNode('NewError', 'KnownError', $__comp_menus__['ProblemManagement']->GetIndex(), 3);
		$__comp_menus__['SearchError'] = new SearchMenuNode('SearchError', 'KnownError', $__comp_menus__['ProblemManagement']->GetIndex(), 4);
		$__comp_menus__['Problem:KnownErrors'] = new OQLMenuNode('Problem:KnownErrors', "SELECT KnownError", $__comp_menus__['Problem:Shortcuts']->GetIndex(), 3, true);
		$__comp_menus__['FAQCategory'] = new OQLMenuNode('FAQCategory', "SELECT FAQCategory", $__comp_menus__['Problem:Shortcuts']->GetIndex(), 4.5, true);
		$__comp_menus__['FAQ'] = new OQLMenuNode('FAQ', "SELECT FAQ", $__comp_menus__['Problem:Shortcuts']->GetIndex(), 6, true);
	}
} // class MenuCreation_itop_knownerror_mgmt
