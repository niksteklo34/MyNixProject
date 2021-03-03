<?php


namespace Core;


class Pagination
{

    public int $currentPage;
    public int $perpage;
    public int $total;
    public $countPages;
    public string $uri;

    public function __construct($page, $perpage, $total)
    {
        $this->perpage = $perpage;
        $this->total = $total;
        $this->countPages = $this->getCountPage();
        $this->currentPage = $this->getCurrentPage($page);
        $this->uri = $this->getParams();
    }


    // преобраз. объект к строке
    public function __toString()
    {
        return $this->getHtml();
    }

    public function getCountPage()
    {
        return ceil($this->total / $this->perpage) ?: 1;
    }

    public function getCurrentPage($page)
    {
        if (!$page || $page < 1) $page = 1;
        if ($page > $this->countPages) $page = $this->countPages;
        return $page;
    }

    // начинаем выборку с какой записи
    public function getStart()
    {
        return ($this->currentPage - 1) * $this->perpage;
    }

    public function getParams()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $uri = $url[0] . '?';
        if (isset($url[1]) && $url[1] != '') {
            $params = explode('&', $url['1']);
            foreach ($params as $param) {
                if (!preg_match("#page=#", $param)) $uri .= "{$param}&amp;";
            }
        }
        return $uri;
    }

    public function getHtml()
    {
        $back = null;
        $next = null;
        $page1right = null;
        $page1left = null;

        if ($this->currentPage > 1) {
            $back = "<li style='background-color: lightcoral; border-radius: 45px; margin: 5px'><a style='color: white' class='nav-link' href='{$this->uri}page=" . ($this->currentPage - 1) . "'>&lt</a></li>";
        }

        if ($this->currentPage < $this->countPages) {
            $next = "<li style='background-color: lightcoral; border-radius: 45px; margin: 5px'><a style='color: white' class='nav-link' href='{$this->uri}page=" . ($this->currentPage + 1) . "'>&gt</a></li>";
        }

        if ($this->currentPage - 1 > 0) {
            $page1left = "<li style='background-color: lightcoral; border-radius: 45px; margin: 5px'><a style='color: white' class='nav-link' href='{$this->uri}page=" . ($this->currentPage - 1) . "'>" . ($this->currentPage -1) . "</a></li>";
        }

        if ($this->currentPage + 1 <= $this->countPages) {
            $page1right = "<li style='background-color: lightcoral; border-radius: 45px; margin: 5px'><a style='color: white' class='nav-link' href='{$this->uri}page=" . ($this->currentPage + 1) . "'>" . ($this->currentPage + 1) . "</a></li>";
        }

        return "<ul class='pagination'>" . $back.$page1left . '<li class="active"><a>'.$this->currentPage.'</a></li>'.$page1right.$next . '</ul>';
    }
}