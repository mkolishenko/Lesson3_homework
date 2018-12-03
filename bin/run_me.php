#!/usr/bin/env php
<?php

  require_once  __DIR__.'/../src/KeyValueStore_Yaml.php';
  $yaml = new KeyValueStore_Yaml();
  $yaml->set(2,'ksjdfhkjh');
  printf ("Value %s from file",$yaml->get(6));