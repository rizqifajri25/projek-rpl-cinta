<?php
return [
 'roles'=>['admin_dinas','pemilik_usaha','wisatawan'],
 'statuses'=>[
  'user'=>['active','suspended'], 'verification'=>['pending','approved','rejected'], 'halal'=>['unknown','pending','verified','rejected'],
  'reservation'=>['pending','confirmed','rejected','cancelled','completed'], 'review'=>['published','hidden','reported'],
 ],
];
