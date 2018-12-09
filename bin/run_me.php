#!/usr/bin/env php
<?php

  require_once  __DIR__.'/../src/KeyValueStore_Yaml.php';
  require_once  __DIR__.'/../src/KeyValueStore_Json.php';
  require_once  __DIR__.'/../src/KeyValueStore_Array.php';

  $key = 3;
  $value = 'New_ONE';
// ------------ Yml section --------------------------------------------------
  $yaml = new KeyValueStore_Yaml();
  $yaml->set($key, $value);
  if ($yaml->has($key)) {
      printf("YML Value %s from file \n", $yaml->get($key));
  } else {
      printf("YML Value %s does not exists \n", $key);
  }
//  $yaml->remove($key);
//  $yaml->clear();



// ------------ Json section --------------------------------------------------
  $json = new  KeyValueStore_Json();
  $json -> set($key, $value);
  if ($json->has($key)) {
      printf("JSON Value %s from file \n", $json->get($key));
  } else {
      printf("JSON Value %s does not exists \n", $key);
  }
//  $json->remove($key);
//  $json->clear();


// ------------ Array section --------------------------------------------------
  $varray = new  KeyValueStore_Array();
  $varray -> set($key, $value);
//  $varray ->remove($key);
  if ($varray->has($key)) {
      printf("Array Value %s \n", $varray->get($key));
  } else {
      printf("Array Value %s does not exists \n", $key);
  }
  //$varray ->clear();
