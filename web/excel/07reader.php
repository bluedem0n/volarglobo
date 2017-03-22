<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Include PHPExcel_IOFactory */
require_once dirname(__FILE__) . '/Classes/PHPExcel/IOFactory.php';



$objReader = PHPExcel_IOFactory::createReader('Excel2007');

$objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load("lida.xlsx");
$objWorksheet = $objPHPExcel->setActiveSheetIndex(1);
//objWorksheet = $objPHPExcel->getActiveSheet();

echo '<table border=1>' . "\n";

foreach ($objWorksheet->getRowIterator() as $row)
{
  echo '<tr>' . "\n";
  $cellIterator = $row->getCellIterator();
  $cellIterator->setIterateOnlyExistingCells(false);

  foreach ($cellIterator as $cell)
  {
    echo '<td>' . $cell->getValue() . '</td>' . "\n";
  }

  echo '</tr>' . "\n";
}

echo '</table>' . "\n";
