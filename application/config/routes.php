<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/validate-login'] = 'admin/validate_login_details';

//routes for admin menus
$route['admin/dashboard'] = 'admin/dashboard_view';
$route['admin/categories'] = 'categories/list_categories';
$route['admin/brands'] = 'brands/list_brands';

$route['admin/products'] = 'products/list_products';
$route['admin/products/add-product'] = 'products/add_product_layout';
$route['admin/products/edit-product/(:any)'] = 'products/edit_product_layout/$1';
$route['admin/products/submit-add-product'] = 'products/submit_add_product';
$route['admin/products/(:any)'] = 'products/list_products/$1';

$route['admin/orders'] = 'orders/list_orders';
$route['admin/orders/add-order'] = 'orders/add_order_layout';
$route['admin/orders/submit-create-order'] = 'orders/submit_create_order';
$route['admin/orders/invoice-detail/(:any)'] = 'orders/invoice_detail_page_layout/$1';
$route['admin/orders/(:any)'] = 'orders/list_orders/$1';

$route['admin/reports'] = 'reports/report_dashboard';

$route['admin/profile-settings'] = 'settings/profile_settings';
$route['admin/settings/profile-submit'] = 'settings/save_profile_data';
$route['admin/logout'] = 'admin/user_logout';

$route['admin/currency-settings'] = 'settings/currency_settings';
$route['admin/settings/currency-submit'] = 'settings/save_currency_settings';

$route['admin/product-image-settings'] = 'settings/product_image_settings';
$route['admin/settings/save-product-image-settings'] = 'settings/save_product_image_settings';

$route['admin/footer-settings'] = 'settings/footer_settings';
$route['admin/settings/footer-settings-submit'] = 'settings/save_footer_settings';

//handle ajax requests
$route['inventory-ajax'] = 'ajax/handle_ajax_requests';





