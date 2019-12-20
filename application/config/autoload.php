<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array('database');

$autoload['libraries'] = array('database', 'template', 'form_validation', 'session', 'koran', 'upload');

$autoload['drivers'] = array();

$autoload['helper'] = array('html', 'url', 'file', 'text', 'my');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('master_data', 'transaksi', 'laporan');