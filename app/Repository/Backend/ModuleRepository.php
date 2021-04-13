<?php


namespace App\Repository\Backend;


use App\Models\Module;

class ModuleRepository
{
 public function getModuleIndex()
 {
     return $module=Module::all();
 }
}
