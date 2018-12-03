#!/usr/bin/env php
<?php

  require_once  __DIR__.'/../src/KeyValueStore_Yaml.php';
  require_once  __DIR__.'/../src/KeyValueStore_Json.php';

  $key = 4;
  $value = 'New_Old';

  $yaml = new KeyValueStore_Yaml();
  $yaml->set($key,$value);
  if ($yaml->has($key)){
      printf ("YML Value %s from file \n",$yaml->get($key));
  } else{
      printf ("YML Value %s does not exists \n",$key);
  }
//  $yaml->remove($key);
//  $yaml->clear();

  $json = new  KeyValueStore_Json();
  $json -> set($key, $value);
  if ($json->has($key)){
      printf ("JSON Value %s from file \n",$json->get($key));
  } else{
      printf ("JSON Value %s does not exists \n",$key);
  }
//  $json->remove($key);
//  $json->clear();






