#!/usr/bin/env php
<?php

  require_once  __DIR__.'/../src/KeyValueStore_Yaml.php';

  $key = 2;
  $value = 'New';
  $yaml = new KeyValueStore_Yaml();
  $yaml->set($key,$value);
  if ($yaml->has($key)){
      printf ("Value %s from file \n",$yaml->get($key));
  } else{
      printf ("Value %s does not exists \n",$key);
  }
  //$yaml->remove($key);
  //$yaml->clear();
