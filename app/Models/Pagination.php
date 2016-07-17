<?php

namespace App\Models;

use Illuminate\Pagination\BootstrapThreePresenter;

class Pagination extends BootstrapThreePresenter
{
    /**
     * Convert the URL window into Materialize HTML.
     *
     * @return string
     */
    public function render()
    {
        if( ! $this->hasPages())
            return '';

        return sprintf(
            '<ul class="btn-toolbar" role="toolbar" aria-label="...">%s %s %s</ul>',
            $this->getPreviousButton("<"),
            $this->getLinks(),
            $this->getNextButton(">")
        );
    }

    /**
     * Get HTML wrapper for disabled text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getDisabledTextWrapper($text)
    {
        return "";
    }

    /**
     * Get HTML wrapper for active text.
     *
     * @param  string  $text
     * @return string
     */
    protected function getActivePageWrapper($text)
    {
        return "<li class='btn-group ps-search' role='group' aria-label=''>
                    <button type='button' class='btn btn-default search-btn middle'>".$text."</button>
                </li>";
    }

    /**
     * Get a pagination "dot" element.
     *
     * @return string
     */
    protected function getDots()
    {
        return "";
    }

    /**
     * Get a usual page link HTML wrapper.
     *
     * @return string
     */
    public function getAvailablePageWrapper($url, $page, $rel = null)
    {
        return '<li class="btn-group ps-search" role="group" aria-label="">
                    <a href="'.$url.'"><button type="button" class="btn btn-default search-btn middle">'.$page.'</button></a>
                </li>';
    }
}