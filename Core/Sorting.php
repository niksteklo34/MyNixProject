<?php

namespace Core;

class Sorting
{
    public function getParamsFromUrl(): string
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $uri = $url[0] . '?';
        if (isset($url[1]) && $url[1] != '') {
            $params = explode('&', $url[1]);
            foreach ($params as $param) {
                if (!preg_match("#sort=#", $param)) {
                    $uri .= "{$param}&amp;";
                }
            }
        }
        return $uri;
    }

    public function getHtml()
    {
        return "<ul aria-labelledby='dropdownSort' style='text-align: right'>
                   <li><a class='dropdown-item' href='{$this->getParamsFromUrl()}sort=title-ASC'>По алфавиту</a></li>
                   <li><a class='dropdown-item' href='{$this->getParamsFromUrl()}sort=price-ASC'>По возрастанию цены</a></li>
                   <li><a class='dropdown-item' href='{$this->getParamsFromUrl()}sort=price-DESC'>По убыванию цены</a></li>
                </ul>";
    }

}