<?php namespace Militarymi\Kindergarten;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
      return [
        'Militarymi\Kindergarten\Components\DepartamentList' => 'departamentList',
        'Militarymi\Kindergarten\Components\ServiceList' => 'serviceList',
        'Militarymi\Kindergarten\Components\PersonalList' => 'personalList',

        'Militarymi\Kindergarten\Components\Departament' => 'departamentComponent',
      ];
    }

    public function registerPageSnippets() {
      return [
        'Militarymi\Kindergarten\Components\StaticPageMenu' => 'staticPageMenu',
      ];
    }

    public function registerSettings()
    {
    }
}
