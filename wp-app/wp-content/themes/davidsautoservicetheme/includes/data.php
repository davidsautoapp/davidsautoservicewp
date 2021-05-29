<?php
$services_summary_qy = new WP_Query([
  'post_type' =>  'services-summary',
  'order'     =>  'asc',
  'orderby'   => 'menu_order'
]);

$services = array_map(function($service) {
  return [
    'ID'                  =>  $service->ID,
    'group_title'         =>  $service->post_title,
    'short_description'   =>  $service->post_content,
    'icon'                =>  get_field_object('icon', $service->ID)['value'],
    'details'             =>  get_field_object('service', $service->ID)['value']
  ];
}, $services_summary_qy->posts);