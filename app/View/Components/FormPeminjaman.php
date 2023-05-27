<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormPeminjaman extends Component
{
    public $page;
    public $kelas;
    public $update;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($page = 'public', $kelas = [], $update = [])
    {
        $this->page = $page;
        $this->kelas = $kelas;
        $this->update = $update;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-peminjaman');
    }
}
