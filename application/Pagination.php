<?php
/**
 * Created by PhpStorm.
 * User: amirouche
 * Date: 09/01/2019
 * Time: 9:45
 */

namespace App;


class Pagination
{
    private $_currentPage;
    private $_totalRecords;
    private  $_recordsPerPage;

    /**
     * Pagination constructor.
     * @param int $currentPage la pagina actual
     * @param int $totalRecords total de registros en la base de datos
     * @param int $recordsPerPage total de registros a mostrar en cada pagina
     */
    public function __construct($currentPage = 1, $totalRecords = 0, $recordsPerPage = 10)
    {
        $this->_currentPage = (int) $currentPage;
        $this->_totalRecords = (int) $totalRecords;
        $this->_recordsPerPage = (int) $recordsPerPage;
    }

    /**
     * @return float|int
     * Example: for 10 recores per page
     * page 1 has offset 0
     * page 2 has offset 10
     */
    public function offset()
    {
        return ($this->_currentPage - 1) * $this->_recordsPerPage;
    }

    /**
     * devolver numer de registros por pàgina
     * @return int
     */
    public function getRecordsPerPage()
    {
        return $this->_recordsPerPage;
    }

    /**
     * ir atras
     * @return int
     */
    private function _previousPage()
    {
        return $this->_currentPage - 1;
    }

    /**
     * ir a la pagina seguiente
     * @return int
     */
    private function _nextPage()
    {
        return $this->_currentPage + 1;
    }

    /**
     * Check if there is a previous page
     * @return boolean
     */
    private function _hasPreviousPage()
    {
        return ($this->_previousPage() >= 1) ? true : false;
    }

    /**
     * numero total de paginas
     * @return float
     */
    private function _totalPages()
    {
        return ceil($this->_totalRecords / $this->_recordsPerPage);
    }
    /**
     * Check if there is a next page
     * @return boolean
     */
    private function _hasNextPage()
    {
        return ($this->_nextPage() <= $this->_totalPages()) ? true : false;
    }

    public function nav($url,$maxLinks = 4)
    {
        if ($this->_totalPages() > 1) {
             $links = "<nav aria-label='Page navigation'>";

            $links.= '<ul class="pagination">';
            if ($this->_hasPreviousPage()) {
                $links.= '<li class="page-item"><a href="'.$url.'&page=1" title="">&laquo;</a></li>';
                } else {
                $links.= '<li class=" page-item disabled"><a  title="">&laquo;</a></li>';

            }
            // Create links in the middle
            // Total links
            $totalLinks = ($this->_totalPages() <= $maxLinks) ? $this->_totalPages() : $maxLinks;
            // Middle link
            $middleLink = floor($totalLinks / 2);
            // Find first link and last link
            if ($this->_currentPage <= $middleLink) {
                $lastLink = $totalLinks;
                $firstLink = 1;
            } else {
                if (($this->_currentPage + $middleLink) <= $this->_totalPages()) {
                    $lastLink = $this->_currentPage + $middleLink;
                } else {
                  $lastLink = $this->_totalPages();

                }
                $firstLink = $lastLink - $totalLinks + 1;
            }
            for ($i = $firstLink; $i <= $lastLink; $i++) {
                if ($this->_currentPage == $i) {
                    $links .= '<li class="page-item active"><a >' . $i . '</a></li>';
                } else {
                    $links .= '<li class="page-item"><a href="' .$url. '&page=' . $i . '">' . $i . '</a></li>';
                }
            }
            if ($this->_hasNextPage()) {

                $links.= '<li class="page-item"><a href="'.$url.'&page=' . $this->_totalPages() . '" title="">&raquo;</a></li>';
            } else {

                $links.= '<li class=" page-item disabled"><a  title="">&raquo;</a></li>';
            }
            $links.='</ul>';
            $links.='</nav>';
            // Return all links of Pagination
            return $links;
        } else {
            return false;
        }
    }

}