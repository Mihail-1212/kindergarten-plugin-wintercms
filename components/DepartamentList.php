<?php namespace Militarymi\Kindergarten\Components;

// use peterhegman\slickslider\models\SlideShows;
// use Symfony\Component\HttpFoundation\Request;
// use Log;
use Militarymi\Kindergarten\Models\Departament as DepartamentModel;
use Cms\Classes\ComponentBase;

class DepartamentList extends ComponentBase
{
    public function componentDetails()
    {
        return [
          'name' => 'Departament list component',
          'description' => 'Displays a collection of departaments.'
        ];
        // $slideShows = SlideShows::all();
        // if (count($slideShows) > 0) {
        //     return [
        //         'name' => 'Slider',
        //         'description' => 'Displays a slider chosen from the dropdown'
        //     ];
        // } else {
        //     return [
        //         'name' => 'Slider',
        //         'description' => 'Please create a slideshow in the "Slideshow" menu'
        //     ];
        // }
    }

    public function defineProperties() {
      return [
        'outputCount' => [
            'title' => 'Count of output departaments',
            'description' => 'Set "0" to disable',
            'default' => 0,
            'type' => 'string',
        ],
      ];
    }

    public function onRun()
    {
      $this->page['output_count'] = $outputCount = $this->property('outputCount');

      $departaments = DepartamentModel::all();
      // Defaulkt sort
      $departaments = $departaments->sortBy('name')->sortByDesc('is_main');

      if ($outputCount != 0) {
        $departaments = $departaments->take($outputCount);
      }

      $this->page["departament_list"] = $departaments;
        // $slideShowId = $this->property('slide_show_id');
        // $slideShows = SlideShows::where('id', '=', $slideShowId)->first();
        // if ($slideShows !== null && $slideShows->attributes['include_jquery']) {
        //     $this->addJs('assets/jquery-3.1.1.min.js');
        // }
        // $this->addJs('assets/slick/slick.min.js');
        // $this->addCss('assets/slick/slick.css');
        // $this->addCss('assets/slick/slick-theme.css');
    }
}
