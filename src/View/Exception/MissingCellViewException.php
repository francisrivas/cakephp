<?php
declare(strict_types=1);
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @since         3.0.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\View\Exception;

use Cake\Core\Exception\Exception;

/**
 * Used when a view file for a cell cannot be found.
 */
class MissingCellViewException extends Exception
{
    /**
     * @inheritDoc
     */
    protected $_messageTemplate = 'Cell view file "%s" is missing.';
}