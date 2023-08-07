<?php

namespace App\View\Components;

use Illuminate\View\Component;

class eventCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $eventDaysTo;
    public $eventTitle;
    public $eventDate;
    public $eventPageURL;
    
    public function __construct($eventDaysTo, $eventTitle, $eventDate, $eventPageURL)
    {
        $this->eventDaysTo = $eventDaysTo;
        $this->eventTitle = $eventTitle;
        $this->eventDate = $eventDate;
        $this->eventPageURL = $eventPageURL;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.event-card');
    }
}
