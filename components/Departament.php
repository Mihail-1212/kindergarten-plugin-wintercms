<?php namespace Militarymi\Kindergarten\Components;

// use peterhegman\slickslider\models\SlideShows;
// use Symfony\Component\HttpFoundation\Request;
// use Log;
use Militarymi\Kindergarten\Models\Departament as DepartamentModel;
use Cms\Classes\ComponentBase;

class Departament extends ComponentBase
{
    public function componentDetails()
    {
        return [
          'name' => 'Departament item component',
          'description' => 'Displays the departament element.'
        ];
    }

    public function defineProperties() {
      return [
        'departamentElement' => [
            'title' => 'Departament element to show',
            'description' => 'Choose departament item',
            'default' => '',
            'type' => 'dropdown'
        ],
      ];
    }

    public function onRun()
    {
      $departamentElementId = $this->property('departamentElement');

      $this->page['departament_element'] = $departamentElement = DepartamentModel::findOrFail($departamentElementId);
    }

    function getDepartamentElementOptions() {
      $result = [];

      $departamentList = DepartamentModel::all();

      foreach ($departamentList as $departamentItem) {
          $result[$departamentItem->id] = $departamentItem->name . ($departamentItem->is_main ? ' (Главный)' : '');
      }

      return $result;
  }
}
