<?php

/*
 * Site constants
 * 
 * @package		Template Framework
 * @author		Ajeesh Azhakesan <ajeesh.a@yukoglobal.com>
 * @copyright           Copyright (c) 2013, Yuko Global Technologies, Inc.
 * @license		www.yukoglobal.com/user_guide/license.html
 * @since		Version 1.0, 21st June 2013
 * @filesource
 */
 
define('SITE_NAME','Template Framework'); // Site title
define('PATH_SEPERATOR',''); // Site title
define('SITE_PATH',$_SERVER['DOCUMENT_ROOT'].PATH_SEPERATOR.'framework'); // Diractory path to the site root

//USER ROLE
define("ADMIN", "1");
define("USER", "2");

//FOLDER PATH
//FROND END
define('STYLE_DIR', "assets/css/");
define('JS_DIR', "assets/js/");
define('IMAGE_DIR', "assets/images/");

//ADMIN
define('STYLE_ADMIN_DIR', "assets/admin/css/");
define('JS_ADMIN_DIR', "assets/admin/js/");
define('LIB_ADMIN_DIR', "assets/admin/lib/");
define('IMAGE_ADMIN_DIR', "assets/admin/images/");

// FILE UPLOAD INFO
define('ALBUM_ALLOWED_TYPES', 'gif|jpg|png');
define('DOCUMENT_ALLOWED_TYPES', 'pdf|doc|docx');
define('MAX_PROFILE_IMAGE_SIZE', '6000');
define('MAX_UPLOAD_PDF_SIZE', '20000');

define('FILE_UPLOAD_FLDR', 'uploads/');
define('FLDR_PROFILE', FILE_UPLOAD_FLDR . 'profile/');
define('FLDR_GALLERY', FILE_UPLOAD_FLDR . 'gallery/');
define('FLDR_DOCS', FILE_UPLOAD_FLDR . 'docs/');
define('FLDR_PRODUCTS', FILE_UPLOAD_FLDR . 'products/');
define('FLDR_GALLERY_THUMBS', FLDR_GALLERY.'thumbs/');
define('FLDR_SETTINGS', FILE_UPLOAD_FLDR . 'settings/');
define('FLDR_DOWNLOADS', FILE_UPLOAD_FLDR . 'downloads/');

define('FLDR_SETTINGS_THUMB', FILE_UPLOAD_FLDR . 'settings/thumbs/');
define('SETTINGS_THUMB_WIDTH', '201');
define('SETTINGS_THUMB_HEIGHT', '133');


//IMAGE SIZE INFO (px)
define('GAL_THUMB_WIDTH', '201');
define('GAL_THUMB_HEIGHT', '133');

//STATUS INFO
define('ACTIVE', '1');
define('DEACTIVE', '2');

//EMAIL CONFIG INFO
define('SEND_EMAIL_PENDING', 'pending');
define('SEND_EMAIL_COMPLETED', 'completed');
define('EMAIL_FROM_EMAIL', 'testfrom@yopmail.com');
define('EMAIL_FROM_NAME', 'testfrom');
define('EMAIL_ALTERNATE_TO', 'testto@yopmail.com');
define('NOREPLY_EMAIL_FROM_NAME', 'noreply');
define('NOREPLY_EMAIL_ALTERNATE_FROM', 'noreplytest@yopmail.com');

//PAGE LIST COUNT [ FOR PAGINATION ]
define('ITEM_PER_PAGE', 1);

//MESSAGES 
define('DELETE_WARNING', 'Are you sure you wish to delete the selected item(s)?');
define('COPY_RIGHT', '&copy; ' . date("Y") . ' All rights reserved. Yuko Global Technologies');

//MULTI LANGUAGE
define('MULTI_LANG', true);

// MODULES
define('NEWS', true);
define('SPECIAL_OFFER', true);  //Special Offers / Packages
define('CAREERS', true);
define('NEWSLETTER', true);
define('DOWNLOADS', true);
define('TESTIMONIALS', true);
define('SERVICES', true);  //Services / Departments
define('PRODUCTS', true);  //Products / Projects
define('IMAGE_GALLERY', true);
define('VIDEO_GALLERY', true);
define('DYNAMIC_PAGES', true);
define('CONTACT_US', true);
define('FEEDBACK', true);
define('BRANCHES', true);  //Branches/Sections/Depts.
define('TEAM_MEMBERS', true); //Team/Board Members
define('CASE_STUDIES', true);
define('FB_LOGIN', true);  // FACEBOOK LOGIN
define('TWTR_LOGIN', true); //TWETTER LOGIN

/* End of file site.constants.php */
/* Location: ./application/config/site.constants.php */
