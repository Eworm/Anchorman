<?php

namespace Statamic\Addons\RonBurgundy;

use Statamic\Extend\Controller;

class RonBurgundyController extends Controller
{
    /**
     * Maps to the index
     *
     * @return mixed
     */
    public function index()
    {
        return $this->view('index');
    }

    /**
     * Maps to the edit screen
     *
     * @return mixed
     */
    public function edit()
    {
        return $this->view('edit');
    }

    /**
     * Maps to the new feed screen
     *
     * @return mixed
     */
    public function new()
    {
        return $this->view('new');
    }
}
