<?php 



  require 'guestHouse.php';
  $gHouse = new GuestHouse();
  $gHouse->setEmail($_COOKIE['email']);
  $guestdata = $gHouse->getUserByEmail();
  //$guestImage = $gHouse->getImageFromGuestHouse();

 // print_r($guestdata);

  $output['gname'] = $guestdata['name'];
  $output['address'] = $guestdata['address'];
  $output['area'] = $guestdata['area'];
  $output['pincode'] = $guestdata['pincode'];
  $output['city'] = $guestdata['city'];
  $output['url'] = $guestdata['url'];
  $output['info'] = $guestdata['info'];

  echo json_encode($output);







 ?>