<?php
/**
 * Author:      Elizabeth Blyumska
 * DateTime:    21 July 2016 (Thursday) 18:42
 * Description: Class made for customising laravel bootstrap pagination.
 */

namespace App\Models;

use Illuminate\Pagination\BootstrapThreePresenter;

class Pagination extends BootstrapThreePresenter
{
    /**
     * Convert the URL to custom pagination style.
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
        return "<li class='btn-group ps-search' aria-label=''>
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
        return '<li class="btn-group ps-search" aria-label="">          
                    <a href="'.$url.'" type="button" class="btn btn-default search-btn middle">'.$page.'</a>                 
                </li>';
    }
}