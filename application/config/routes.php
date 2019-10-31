<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'admin/admin/index';
$route['admin_dashboard'] = 'navy/navy/navy_products';
$route['admin'] = 'admin/admin/index';
$route['profile'] = 'admin/admin/update_user';


$route['forgotpass'] = 'admin/admin/forgotpass_email';
$route['create_pass'] = 'admin/admin/create_password';


$route['navy']      = 'navy/navy/index';
$route['add_navy']  = 'navy/navy/add_navy';
$route['navy_view'] = 'navy/navy/view_navy';
$route['navy_edit'] = 'navy/navy/navyEdit';
$route['navyCustomers']    = 'navy/navy/navy_products';

$route['submarinelist']    = 'navy/submarine/marineList';
$route['smrsEdits'] = 'navy/submarine/smrsEdit';

$route['PstateList'] = 'navy/submarine/PstateList';
$route['checklist1'] = 'navy/submarine/Checklist1';

$route['rmcReport'] = 'navy/submarine/rmcList';

$route['waterBoatReport'] = 'navy/submarine/waterBoatList';

$route['esvReport'] = 'navy/submarine/esvList';

$route['weatherStation'] = 'navy/submarine/weatherStationList';

$route['thersholdList'] = 'navy/submarine/getThreshold';
$route['add_threshold'] = 'navy/submarine/add_threshold';
$route['thresholdEdit'] = 'navy/submarine/thresholdEdit';

$route['agmsReportList'] = 'navy/submarine/getAgmsReportList';
$route['addAGMS']  = 'navy/SubMarine/addAGRMS';
$route['saveAGMS']  = 'navy/SubMarine/saveAGMS';

$route['agmsChannelList'] = 'navy/submarine/getAGMSChannel';
$route['agmsChannelEdit'] = 'navy/submarine/agmsChannelEdit';

$route['rgmsChannelList'] = 'navy/submarine/getRGMSChannel';
$route['rgmsChannelEdit'] = 'navy/submarine/rgmsChannelEdit';

$route['emergencyTeamList'] = 'navy/submarine/getEmergencyTeamList';
$route['emergencyTeamEdit'] = 'navy/submarine/emergencyTeamEdit';

$route['emergencyWorkList'] = 'navy/submarine/getEmergencyWorkList';


$route['emergencyTeamObj'] = 'navy/EmergencyTeam/getEmergencyObjList';
$route['addEmergencyTeam'] = 'navy/EmergencyTeam/addEmergencyTeam';
$route['saveEmergencyTeam'] = 'navy/EmergencyTeam/saveEmergencyTeam';
$route['editEmergencyTeam'] = 'navy/EmergencyTeam/editEmergencyTeam';
$route['updateEmergencyTeam'] = 'navy/EmergencyTeam/updateEmergencyTeam';

$route['doseHistoryObj'] = 'navy/DoseHistory/getDoseHistoryObjList';
$route['addDoseHistory'] = 'navy/DoseHistory/addDoseHistory';
$route['saveDoseHistory'] = 'navy/DoseHistory/saveDoseHistory';
$route['editDoseHistory'] = 'navy/DoseHistory/editDoseHistory';
$route['updateDoseHistory'] = 'navy/DoseHistory/updateDoseHistory';

$route['emergencyTaskObj'] = 'navy/EmergencyTask/getEmergencyTaskObjList';
$route['addEmergencyTask'] = 'navy/EmergencyTask/addEmergencyTask';
$route['saveEmergencyTask'] = 'navy/EmergencyTask/saveEmergencyTask';
$route['editEmergencyTask'] = 'navy/EmergencyTask/editEmergencyTask';
$route['updateEmergencyTask'] = 'navy/EmergencyTask/updateEmergencyTask';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
