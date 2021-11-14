<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']                   = 'welcome';
$route['404_override']                         = '';
$route['translate_uri_dashes']                 = FALSE;

//--- auth
//logout 
$route['logout']                               = 'auth/logout';
//login
$route['proses-login']                         = 'auth/login/proses';
//forgot password
$route['forgot-password']                      = 'auth/forgotPassword';
$route['proses-forgot-password']               = 'auth/forgotPassword/proses';
//reset password 
$route['reset-password']                       = 'auth/resetPassword';
$route['proses-reset-password']                = 'auth/resetPassword/proses';
//register
$route['register']                             = 'auth/register';
$route['proses-register']                      = 'auth/register/proses';
//-------------------

//profile 
$route['profile']                              = "admin/profile/profile";
$route['ubah-photo-profile']                   = "admin/profile/profile/ubahPhotoProfile";
$route['change-username']                      = "admin/profile/profile/changeUsername";

// dashboard
$route['dashboard']                            = "admin/dashboard/dashboard";

//administrator
$route['administrator/data-admin']             = 'admin/administrator/DataAdmin';
$route['administrator/save-data-admin']        = 'admin/administrator/DataAdmin/saveDataAdmin';
$route['administrator/view-data-admin']        = 'admin/administrator/DataAdmin/viewDataAdmin';
$route['administrator/delete-data-admin']      = 'admin/administrator/DataAdmin/deleteDataAdmin';
$route['administrator/get-data-admin']         = 'admin/administrator/DataAdmin/getDataAdmin';

//files
$route['file']                                 = 'admin/file/file';
$route['file/save-file']                       = 'admin/file/file/saveFile';
$route['file/view-file']                       = 'admin/file/file/viewFile';
$route['file/delete-file']                     = 'admin/file/file/deleteFile';
$route['file/get-file']                        = 'admin/file/file/getFile';
$route['file/download-file']                   = 'admin/file/file/downloadFile';

//riwayat download
$route['riwayat/download']                     = 'admin/riwayat/download/download';
$route['riwayat/download/view-riwayat-download']= 'admin/riwayat/download/download/viewRiwayatDownload';

//riwayat upload
$route['riwayat/upload']                       = 'admin/riwayat/upload/upload';
$route['riwayat/upload/view-riwayat-upload']   = 'admin/riwayat/upload/upload/viewRiwayatUpload';